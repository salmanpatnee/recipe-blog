<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recipes.index', [
            'recipes' => Recipe::latest()
                ->filter(request($this->getFilters()))
                ->paginate(6)
                ->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'title'         => 'required|min:3|max:255',
            'excerpt'       => 'required|min:3|max:255',
            'body'          => 'required',
            'slug'          => 'required|unique:recipes,slug',
            'prep_time'     => 'required|numeric|min:5|max:120',
            'cook_time'     => 'required|numeric|min:5|max:120',
            'thumbnail'     => 'required|image',
            'serves'        => 'required|numeric|min:1|max:5',
            'category_id'   => 'required|exists:categories,id',
            'difficulty_id' => 'required|exists:difficulties,id',
        ]);

        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails'); 

        auth()->user()->recipes()->create($attributes);

        return redirect(route('recipes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.show', [
            'recipe'    => $recipe,
            'comments'  => $recipe->comments()->latest()->paginate(30)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }

    private function getFilters()
    {
        return ['search', 'category', 'difficulty', 'author'];
    }
}
