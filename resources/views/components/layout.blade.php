<!doctype html>

<title>Recipes Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.png" alt="Logo">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @guest
                    <a href="{{ route('register.create') }}" class="text-xs font-bold uppercase">Register</a>
                    |
                    <a href="{{ route('login') }}" class="text-xs font-bold uppercase">Login</a>
                @else

                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-34 flex lg:inline-flex" }>
                                <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</span>
                                <x-dropdown-icon class="absolute pointer-events-none" style="right: 12px;" />
                            </button>
                            </x-slot-trigger>
                            <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-1 rounded-xl z-50"
                                style="display: none">

                                @can('admin')
                                    <x-dropdown-link href="{{ route('admin.recipes.index') }}">Dashboard</x-dropdown-link>
                                    <x-dropdown-link :active='request()->routeIs("admin.recipes.create")'
                                        href="{{ route('admin.recipes.create') }}">Create new recipe</x-dropdown-link>
                                @endcan

                                <x-dropdown-link @click.prevent="document.querySelector('#logout-form').submit()" href="">
                                    Log Out</x-dropdown-link>
                            </div>
                    </x-dropdown>



                    <form id="logout-form" method="POST" action="{{ route('login.destroy') }}" class="hidden">
                        @csrf
                        <button type="submit">Log Out</button>
                    </form>
                @endguest
                <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>
        {{ $slot }}


        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest recipes</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>
                            <div>
                                <input id="email" name="email" type="email  " placeholder="Your email address"
                                    class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none" required>

                            </div>

                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                        <x-form.error name="email" />
                    </form>
                </div>
            </div>
        </footer>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.2.3/cdn.min.js"></script>
    <x-flash />
</body>
