<x-admin-layout>

    <form action="{{route('admin.categories.update', $category)}}" method="POST"
     class="bg-white rounded-lg p-6 shadow-lg">


        @csrf

       @method('PUT')

  <x-validation-errors class="mb-4"/>


  <div class="mb-4">

    <x-label class="mb-2">Actualizar Nombre</x-label>

    <x-input class="w-full" placeholder="Escriba el nombre de la categoria"
    name="name" value="{{$category->name}}"/>

  </div>

  <div class="flex justify-end mb-2">

    <x-button>
        Actualizar Categorìa
    </x-button>
</div>

    </form>

</x-admin-layout>
