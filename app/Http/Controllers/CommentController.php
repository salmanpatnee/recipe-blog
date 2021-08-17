<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Recipe $recipe)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $recipe->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }
}
