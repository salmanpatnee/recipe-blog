<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;


class AdminRecipeController extends Controller
{
    public function index(){
        return view('admin.recipes.index', [
            'recipes' => Recipe::latest()->paginate(30)
        ]);
        
    }

       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validateAttributes();

        if(request()->has('thumbnail')){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails'); 
        }
       

        auth()->user()->recipes()->create($attributes);

        return redirect(route('recipes.index'));
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        return view('admin.recipes.edit', compact('recipe'));
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
        $attributes = $this->validateAttributes($recipe);

        if(request()->has('thumbnail')){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails'); 
        }
       
        $recipe->update($attributes);

        return back()->with('success', 'Recipe updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return back()->with('success', 'Recipe deleted');
    }

    protected function validateAttributes(Recipe $recipe = null){

        return request()->validate([
            'title'         => 'required|min:3|max:255',
            'excerpt'       => 'required|min:3|max:255',
            'body'          => 'required',
            'slug'          => ['required', Rule::unique('recipes', 'slug')->ignore($recipe)],
            'prep_time'     => 'required|numeric|min:5|max:120',
            'cook_time'     => 'required|numeric|min:5|max:120',
            'thumbnail'     => 'image',
            'serves'        => 'required|numeric|min:1|max:5',
            'category_id'   => 'required|exists:categories,id',
            'difficulty_id' => 'required|exists:difficulties,id',
        ]);
    }
}
