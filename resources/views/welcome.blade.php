<x-app-layout>

    <figure class="mb-12">

        <img src="{{ asset('img/home/9.jpg') }}"
        class="w-full  aspect-[3/1] object-cover object-center"
         >

    </figure>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <h1 class="text-3xl text-center font-semibold mb-4">
            Publicaciones
        </h1>

   
        

        <div class="grid ml-4">

            <div class="">

                <form action="{{route('home')}}" class="max-w-lg mx-auto flex">
           
                    <div class="flex">
                        <select name="order" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="all">Todas las categorias</option>
                           
                            @foreach($categories as $category)
                
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        
                        </div>
                        <div class="relative w-full">
                            <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 
                             rounded-e-lg border-s-gray-50 border-s-2 b
                            order border-gray-300 focus:ring-blue-500 focus:border-blue-500 
                        dark:border-s-gray-700  dark:border-gray-600 
                            dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" 
                            placeholder=" ¿Que le gustaria buscar?..."/>
                            <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                                <span class="sr-only">Buscar</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            

            {{-- <div class="col-span-1">
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
            </div> --}}

            <div class="col-span-3">
                <div class="space-y-8 mt-8">

                    @foreach ($posts as $post)
                    <article class="grid grid-cols-2 gap-6 ">
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

                            <div class="flex justify-start  mt-2">
                                <a href=" {{route('posts.show', $post)}}" class="">
                                   <i class="fa-solid fa-comment mr-2"></i><span>{{$post->questions->count()}} Comentarios</span>
                               </a>

                            </div>



                            <div class="flex justify-end -mt-7">
                                <a href=" {{route('posts.show', $post)}}" class=" text-white bg-blue-700
                                hover:bg-blue-800 focus:outline-none focus:ring-4
                                 focus:ring-blue-300 font-medium rounded-full text-sm px-5
                                  py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700
                                   dark:focus:ring-blue-800">
                                Ver más
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
