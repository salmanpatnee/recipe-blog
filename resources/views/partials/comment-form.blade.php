<div class="border border-gray-200 p-6 rounded-xl">
    @auth
        <form method="POST" action="{{ route('comments.store', $recipe->id) }}">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40"
                    class="rounded-full">

                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6">
                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5"
                    placeholder="Quick, thing of something to say!" required></textarea>

                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <button type="submit"
                    class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Post</button>
            </div>
        </form>
    @else
        <p><a class="font-bold" href="{{ route('login.create') }}">Login</a> to participate.</p>
    @endauth
</div>
