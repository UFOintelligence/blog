  <x-admin-layout :breadcrumb="[
          [
     'name' => 'Home',
     'url'  => route('admin.dashboard'),

],
[
     'name' => 'Usuarios',

 ]

  ]">

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                  </th>

                  <th scope="col" class="px-6 py-3">
                   Email
                  </th>

                <th scope="col" class="px-6 py-3">
                    Accion
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ( $users as $user )
          <tr class="bg-white dark:bg-gray-800">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
               {{$user->id}}
            </th>
            <td class="px-6 py-4">
                {{$user->name}}
            </td>
            <td class="px-6 py-4">
                {{$user->email}}
            </td>


            <td class="px-6 py-4">
                <a href="{{route('admin.users.edit', $user )}}">Editar</a>
            </td>



           @endforeach


            </tr>
        </tbody>
    </table>


</div>


<div class="mt-4">
    {{ $users->links() }}
</div>
</x-admin-layout>
