<x-layout>

    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-300 p-6 rounded-xl">
        <h1 class="text-center font-bold text-xl">Post a Recipe!</h1>

        <form method="POST" action="{{ route('admin.posts.store') }}" class="mt-10" enctype="multipart/form-data">
            @csrf
           <x-form.input name="title"/>
           <x-form.input name="slug"/>
           <x-form.textarea name="excerpt"/>
           <x-form.textarea name="body"/>
           <x-form.input name="thumbnail" type="file"/>
           <x-form.input name="prep_time" type="number"/>
           <x-form.input name="cook_time" type="number"/>
           <x-form.input name="serves" type="number"/>

            <label class="block mb-2 mt-2 uppercase font-bold text-xs text-gray-700" for="category_id">
                Category
            </label>
            <select name="category_id" id="category_id" class="border border-gray-300 p-2 w-full rounded">
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
            <select name="difficulty_id" id="difficulty_id" class="border border-gray-300 p-2 w-full rounded">
                <option value="">Select Difficulty</option>
                @foreach (\App\Models\Difficulty::latest()->get() as $difficulty)
                    <option {{old('difficulty_id') == $difficulty->id ? 'selected' : ''}}  value="{{$difficulty->id}}">{{ucwords($difficulty->name)}}</option>
                @endforeach
            </select>
            <x-form.error name="category_id"/>

            <button type="submit"
                class="mt-3 bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                Publish
            </button>
        </form>
    </main>
</x-layout>
