<x-app-layout>
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-1 2">
        <div class="mb-4 mt-4">
            @foreach ($post->tags as $tag )

            <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs
            font-medium text-blue-600 ring-1 ring-inset ring-gray-500/10">
                {{ $tag->name }}
            </span>

            @endforeach

        </div>

            <h1 class="text-xl font-semibold">
                {{ $post->title }}
            </h1>

            <hr class="mt-1 mb-2">

            <p class="text-sm mb-6">
                {{ $post->published_at->format('d M Y') }}
                -   {{ $post->user->name }}
            </p>


        <figure>
            <img src="{{$post->image}}" alt="{{$post->title}}" class="
             aspect-[16/9] object-cover object-center w-full rounded-lg">
        </figure>

        <div class="mb-4">
            {{ $post->excerpt }}
        </div>
        <div>
            {{ $post->body }}
        </div>

       <div class="mt-16">

        @livewire('question', ['model' => $post])

       </div>

    </section>


</x-app-layout>


