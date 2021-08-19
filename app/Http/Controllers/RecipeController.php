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


    private function getFilters()
    {
        return ['search', 'category', 'difficulty', 'author'];
    }
}
