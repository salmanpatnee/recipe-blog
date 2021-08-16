<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 flex lg:inline-flex" }>
            {{ isset($currentCategory) ? $currentCategory->name : 'Categories' }}
            <x-dropdown-icon class="absolute pointer-events-none" style="right: 12px;" />
        </button>
        </x-slot-trigger>
        <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-1 rounded-xl z-50" style="display: none">
            <x-dropdown-link :active='request()->routeIs("recipes.index")' href="/">All</x-dropdown-link>

            {{-- Check for active link --}}
            {{-- isset($currentCategory) && $currentCategory->is($category) --}}

            @foreach ($categories as $category)
                <x-dropdown-link :active='request()->is("categories/{$category->slug}")'
                    href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}">
                    {{ ucfirst($category->name) }}
                </x-dropdown-link>
            @endforeach
        </div>
</x-dropdown>
