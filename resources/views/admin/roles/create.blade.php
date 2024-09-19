<x-admin-layout>

    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{route('admin.roles.store')}}" method="POST">

            @csrf
            <x-validation-errors class="mb-4"/>
            <div class="mb-4">
            <label class="mb-1">Nombre del rol</label>

            <x-input  name="name"  class="w-full" placeholder="Ingrese el nombre"
            value="{{old('name')}}"/>


           </div>

          <div  class="flex justify-end">
            <x-button>Crear rol</x-button>
          </div>

        </form>

    </div>




</x-admin-layout>
