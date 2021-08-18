<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $with = ['category', 'difficulty', 'author'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function difficulty()
    {
        return $this->belongsTo(Difficulty::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search'])) {

            $search = $filters['search'];

            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });
        }

        if (isset($filters['category'])) {

            // Raw SQL

            // SELECT * FROM recipes
            // WHERE EXISTS(
            //     SELECT * FROM categories
            //     WHERE recipes.category_id = categories.id
            //     AND categories.slug = 'meal'
            // );

            $category = $filters['category'];
            $query->whereHas('category', function (Builder $query) use ($category) {
                $query->where('slug', '=', $category);
            });
        }

        if (isset($filters['difficulty'])) {

            $difficulty = $filters['difficulty'];
            $query->whereHas('difficulty', function (Builder $query) use ($difficulty) {
                $query->where('slug', '=', $difficulty);
            });
        }

        if (isset($filters['author'])) {

            $author = $filters['author'];
            $query->whereHas('author', function (Builder $query) use ($author) {
                $query->where('username', '=', $author);
            });
        }
    }

    public function getThumbnial(){
        return isset( $this->thumbnail) ? asset('storage/'. $this->thumbnail) : '/images/default.png';
    }
}
