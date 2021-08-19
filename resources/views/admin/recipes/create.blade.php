<x-layout>

  <x-setting heading="Publish New Recipe"> 
    <form method="POST" action="{{ route('admin.recipes.store') }}" class="mt-10" enctype="multipart/form-data">
        @csrf
       <x-form.input name="title" required/>
       <x-form.input name="slug" required/>
       <x-form.textarea name="excerpt" required>{{old('excerpt')}}</x-form.textarea>
       <x-form.textarea name="body" required>{{old('body')}}</x-form.textarea>
       <x-form.input name="thumbnail" type="file"/>
       <x-form.input name="prep_time" type="number" required/>
       <x-form.input name="cook_time" type="number" required/>
       <x-form.label name="Serves"/>
       <select name="serves" id="serves" class="border border-gray-300 p-2 w-full rounded" required>
            @foreach (range(1,5) as $serve)
                <option 
                {{old('serves') == $serve ? 'selected' : ''}} 
                value="{{$serve}}">{{$serve}}</option>
            @endforeach
        </select>

        <label class="block mb-2 mt-2 uppercase font-bold text-xs text-gray-700" for="category_id">
            Category
        </label>
        <select name="category_id" id="category_id" class="border border-gray-300 p-2 w-full rounded" required>
            <option value="">Select a Category</option>
            @foreach (\App\Models\Category::latest()->get() as $category)
                <option 
                {{old('category_id') == $category->id ? 'selected' : ''}} 
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
                <option {{old('difficulty_id') == $difficulty->id ? 'selected' : ''}}  value="{{$difficulty->id}}">{{ucwords($difficulty->name)}}</option>
            @endforeach
        </select>
        <x-form.error name="category_id"/>
        <x-form.button>Publish</x-form.button>
    </form>
  </x-setting>
</x-layout>
