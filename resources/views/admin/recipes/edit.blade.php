<x-layout>

  <x-setting heading="Edit Recipe"> 
    <form method="POST" action="{{ route('admin.recipes.update', $recipe) }}" class="mt-10  mx-auto" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
       <x-form.input name="title" :value="old('title', $recipe->title)" required/>
       <x-form.input name="slug" :value="old('slug', $recipe->slug)" required/>
       <x-form.textarea name="excerpt" required>{{old('excerpt',$recipe->excerpt )}}</x-form.textarea>
       <x-form.textarea name="body" required>{{old('body',$recipe->body )}}</x-form.textarea>
       <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $recipe->thumbnail)"/>
      <img src="{{$recipe->getThumbnail()}}" width="100" alt="" class="rounded-xl mt-2 mb-2">
       <x-form.input name="prep_time" type="number" :value="old('prep_time', $recipe->prep_time)" required/>
       <x-form.input name="cook_time" type="number" :value="old('cook_time', $recipe->cook_time)" required/>
       
        <x-form.label name="Serves"/>
        <select name="serves" id="serves" class="border border-gray-300 p-2 w-full rounded" required>
             @foreach (range(1,5) as $serve)
                 <option 
                 {{old('serves', $recipe->serves) == $serve ? 'selected' : ''}} 
                 value="{{$serve}}">{{$serve}}</option>
             @endforeach
         </select>

         
   

        <label class="block mb-2 mt-2 uppercase font-bold text-xs text-gray-700" for="category_id" >
            Category
        </label>
        <select name="category_id" id="category_id" class="border border-gray-300 p-2 w-full rounded" required>
            <option value="">Select a Category</option>
            @foreach (\App\Models\Category::latest()->get() as $category)
                <option 
                {{old('category_id', $recipe->category_id) == $category->id ? 'selected' : ''}} 
                value="{{$category->id}}">{{ucwords($category->name)}}</option>
            @endforeach
        </select>
        <x-form.error name="category_id"/>

        <label class="block mb-2 mt-2 uppercase font-bold text-xs text-gray-700" for="difficulty_id">
            Difficulty
        </label>
        <select name="difficulty_id" id="difficulty_id" class="border border-gray-300 p-2 w-full rounded" required>
            <option value="">Select Difficulty</option>
            @foreach (\App\Models\Difficulty::latest()->get() as $difficulty)
                <option {{old('difficulty_id', $recipe->difficulty_id) == $difficulty->id ? 'selected' : ''}}  value="{{$difficulty->id}}">{{ucwords($difficulty->name)}}</option>
            @endforeach
        </select>
        <x-form.error name="difficulty_id"/>

        <x-form.button>Update</x-form.button>
    </form>
  </x-setting>
</x-layout>
