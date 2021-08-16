<x-layout>

    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-300 p-6 rounded-xl">
        <h1 class="text-center font-bold text-xl">Register!</h1>

        <form method="POST" action="{{ route('register.store') }}" class="mt-10">
            @csrf
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                Name
            </label>
            <input class="border border-gray-300 p-2 w-full rounded" name="name" id="name" value="{{ old('name') }}"
                required>
            @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            <label class="mt-2 block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                Username
            </label>
            <input class="border border-gray-300 p-2 w-full rounded" name="username" id="username"
                value="{{ old('username') }}" required>
            @error('username')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            <label class="block mt-2 mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                Email
            </label>
            <input type="email" class="border border-gray-300 p-2 w-full rounded" name="email" id="email"
                value="{{ old('email') }}" required>
            @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            <label class="block mb-2 mt-2 uppercase font-bold text-xs text-gray-700" for="password">
                Password
            </label>
            <input type="password" class="border border-gray-300 p-2 w-full rounded" name="password" id="password"
                required>
            @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            <button type="submit"
                class="mt-3 bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                Sign Up
            </button>
        </form>
    </main>
</x-layout>
