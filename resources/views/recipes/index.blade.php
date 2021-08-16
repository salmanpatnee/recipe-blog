<x-layout>
    @include('partials.header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($recipes->count())
            <x-recipes-grid :recipes="$recipes" />

            {{ $recipes->links() }}
        @else
            <p class="text-center">No recipes yet.</p>
        @endif
    </main>
</x-layout>
