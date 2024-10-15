<div>
 <div class="flex">

    <figure class="mr-4">
        <img src="{{auth()->user()->profile_photo_url}}" alt="{{auth()->user()->name}}" class="rounded-full h-12 w-12 object-cover object-center">
    </figure>

 <div class="flex-1">

    <form wire:submit.prevent="store">

        <textarea wire:model.defer="message" rows="1
        " class="mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
  focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
  dark:focus:ring-indigo-600 rounded-md shadow-sm w-full" placeholder="Escribe tu comentario"></textarea>

  <x-input-error for="message" class="mt-2"/>

  <div class="flex justify-end mb-4">
    <x-button>Comentar</x-button>

  </div>



</form>

 </div>
</div>

<p class="text-lg font-semibold mt-6 mb-4">
    Comentarios:
</p>

<ul class="space-y-6">
    @foreach ($questions as $question )
    <li wire:key="question-{{$question->id}}">
        <div class="flex">
            <figure>
                <img  class="w-12 h-12 object-cover object-center rounded-full" alt="" src="{{$question->user->profile_photo_url}}">
            </figure>
        </div>

        <div class="flex-1">
            <p class="font-semibold">
                {{$question->user->name}}
                <span class="text-sm font-normal ">
                    {{$question->created_at->diffForHumans()}}
                </span>
            </p>

            @if($question->id == $question_edit['id'])
            <form wire:submit.prevent="update">
                <x-input-error for="question_edit.body" class="mt-2"/>
                <textarea wire:model="question_edit.body" rows="1
        " class="mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
  focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
  dark:focus:ring-indigo-600 rounded-md shadow-sm w-full" placeholder="Editar comentario"></textarea>
<div class="flex justify-end">

    <x-danger-button class="mr-2" wire:click="cancel">Cancelar</x-danger-button>
    <x-button>Actualizar</x-button>
</div>
            </form>

            @else

            <p>
                {{$question->body}}
            </p>
            @endif

        </div>
        <div  class="flex justify-end -mt-8">
            <x-dropdown>

               <div>
                <x-slot name="trigger">


          <button type="button" class="text-gray-900 bg-gray
            focus:outline-none hover:bg-white focus:ring-4
           focus:ring-gray-100 font-medium  text-sm
            px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white
              dark:hover:bg-gray-700
               dark:focus:ring-gray-700">
              <i class="fas fa-ellipsis-v"></i>

            </button>

                </x-slot>
               </div>

                <div>
                    <x-slot name="content">

                        <x-dropdown-link class="cursor-pointer" wire:click="edit({{$question->id}})">
                            Editar
                        </x-dropdown-link>
                        <x-dropdown-link class="cursor-pointer" wire:click="destroy({{$question->id}})">
                            Eliminar
                        </x-dropdown-link>

                    </x-slot>
                </div>

               </x-dropdown>
          </div>




    </li>

    @endforeach
</ul>
</div>

