<x-layout>

    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="/images/burger.jpg" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published <time>{{ $recipe->created_at->diffForHumans() }}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">{{ $recipe->author->name }}</h5>
                        {{-- <h6>Mascot at Laracasts</h6> --}}
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="{{ route('recipes.index') }}"
                        class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Recipes
                    </a>

                    <div class="space-x-2">
                        <x-category-button :category="$recipe->category" />
                        <x-difficulty-button :difficulty="$recipe->difficulty" />
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $recipe->title }}
                </h1>

                <div>
                    <ul class="mb-3">
                        <li class="inline-block mr-2">
                            <span class="font-bold">Prep: </span>
                            <span class="">{{ $recipe->prep_time }} @choice('min|mins', $recipe->prep_time)</span>
                        </li>
                        <li class="inline-block mr-2">
                            <span class="font-bold">Cook: </span>
                            <span class="">{{ $recipe->cook_time }} @choice('min|mins', $recipe->cook_time)</span>
                        </li>
                        <li class="inline-block">
                            <span class="font-bold">Serves: </span>
                            <span class="">{{ $recipe->serves }}</span>
                        </li>
                    </ul>
                </div>

                <div class="space-y-4 lg:text-lg leading-loose">
                    <p>{{ $recipe->body }}</p>
                </div>
            </div>
            <section class="col-span-8 col-start-5 mt-10 space-y-6">
                @include('partials.comment-form')
                @foreach ($comments as $comment)
                    <x-comment :comment="$comment" />
                @endforeach
                {{ $comments->links() }}
            </section>
        </article>
    </main>
</x-layout>
