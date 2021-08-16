@props(['recipes'])
<x-recipe-featured-card :recipe="$recipes[0]" />

@if ($recipes->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($recipes->skip(1) as $recipe)
            <x-recipe-card :recipe="$recipe" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
        @endforeach
    </div>
@endif
