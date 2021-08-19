@props(['heading'])

<main class="max-w-4xl mx-auto  mx-auto mt-10 bg-gray-100 border border-gray-300 p-6 rounded-xl">
    <h1 class="text-center font-bold text-xl">{{$heading}}</h1>
    {{$slot}}
</main>