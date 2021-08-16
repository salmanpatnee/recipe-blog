<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 flex lg:inline-flex" }>
            {{ isset($currentDifficulty) ? $currentDifficulty->name : 'Difficulties' }}
            <x-dropdown-icon class="absolute pointer-events-none" style="right: 12px;" />
        </button>
        </x-slot-trigger>
        <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-1 rounded-xl z-50" style="display: none">
            <x-dropdown-link :active='request()->routeIs("recipes.index")' href="/">All</x-dropdown-link>

            @foreach ($difficulties as $difficulty)
                <x-dropdown-link :active='request()->is("difficulties/{$difficulty->slug}")'
                    href="/?difficulty={{ $difficulty->slug }}">
                    {{ ucfirst($difficulty->name) }}
                </x-dropdown-link>
            @endforeach
        </div>
</x-dropdown>
