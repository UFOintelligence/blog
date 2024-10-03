<x-app-layout>

    <figure class="mb-12">

        <img src="{{ asset('img/home/banner.jpg') }}"
        class="w-full  aspect-[3/1] object-cover object-center"
         >

    </figure>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <h1 class="text-3xl text-center font-semibold mb-4">
            Lista de articulos
        </h1>
        <div class="grid grid-cols-4">

            <div class="col-span-1">
                <form action="{{route('home')}}" >

                    <div class="mb-4">
                        <p class="text-lg font-semibold">Ordenar:</p>
                    <select name="order" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="new">Más nuevos</option>
                        <option value="old" @selected(request('order') ) == 'old'>Más antiguos</option>
                    </select>
                    </div>

                      <div class="mb-4">

                        <p class="text-lg font-semibold">Categorias:</p>

                        <ul>
                            @foreach ($categories as $category )
                       <li>
                        <label>
                            <x-checkbox name="category[]" value="{{$category->id}}"
                                 :checked="is_array(request('category'))
                                 && in_array($category->id, request('category'))"
                            />
                            <span class="ml-2 text-gray-700">{{$category->name}}</span>
                        </label>
                       </li>

                        @endforeach
                        </ul>

                      </div>

                      <x-button>Aplicar filtros</x-button>
                </form>
            </div>

            <div class="col-span-3">
                <div class="space-y-8 mt-8">

                    @foreach ($posts as $post)
                    <article class="grid grid-cols-2 gap-6">
                      <div>
                        <figure>
                            <img class="aspect-[16/9] object-cover object-center w-full rounded-lg" alt="{{$post->title}}" src="{{ $post->image}}">
                        </figure>
                      </div>

                        <div class="">
                            <h1 class="text-xl text-center font-semibold">
                                {{$post->title}}

                            </h1>
                            <hr class="mt-1 mb-2">
                            <div class="mb-2">
                                @foreach ($post->tags as $tag )

                                <a href="{{route('home') . '?tag=' . $tag->name}}">

                                <span class="bg-blue-100 text-blue-800 text-sm font-semibold mr-2 px-2">
                                    {{ $tag->name }}
                                </span>

                                </a>

                                @endforeach

                            </div>

                            <p class="text-sm mb-2">
                                {{ $post->published_at->format('d M Y') }}
                            </p>

                            <div class="mb-8">

                                {{  Str::limit($post->excerpt, 100)}}
                            </div>

                            <div>
                                <a href=" {{route('posts.show', $post)}}" class="text-white bg-blue-700
                         hover:bg-blue-800 focus:outline-none focus:ring-4
                          focus:ring-blue-300 font-medium rounded-full text-sm px-5
                           py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700
                            dark:focus:ring-blue-800">
                         Leer más
                        </a>
                            </div>

                        </div>


                    </article>
                @endforeach
                   </div>

            </div>

        </div>



       <div class="mt-4">

        {{$posts->links()}}

    </div>

    </section>


</x-app-layout>
