<x-admin-layout :breadcrumb="[
    [
'name' => 'Home',
'url'  => route('admin.dashboard'),

],
[
'name' => 'Articulos',
'url'  => route('admin.posts.index'),

],
[
'name' => 'Nuevo',

]

]">

    <form action="{{route('admin.posts.store')}}" method="POST"
     x-data="data()"
     x-init="$watch('title', value => { string_to_slug(value) })">

     @csrf

     <x-validation-errors class="mb-4"/>

    <div class="mb-4">


     <x-label class="mb-2">
        Titulo del articulo
    </x-label>

    <x-input name="title" value="{{ old('title') }}" x-model='title' class="w-full"
    placeholder="Ingrese el nombre del post" />

</div>


   <div>


    <x-label class="mb-2">
       Slug
   </x-label>

   <x-input name="slug"  x-model="slug" class="w-full"
    placeholder="Ingrese el slug del articulo"/>

</div>

<div class="mb-4">

<x-label>
    Categoria
</x-label>

<x-select class="w-full" name="category_id">

    @foreach ($categories as $category )

<option @selected(old('category_id') == $category->id)
    value="{{$category->id}}">{{$category->name}}</option>


    @endforeach
</x-select>

</div>

<div class="flex justify-end">
    <x-button>
    Crear Articulo
    </x-button>
</div>


    </form>
    @push('js')

    <script>


        function data(){
            return {
                title: '',
                slug: '',
                string_to_slug(str){
                    str = str.replace(/^\s+|\s+$/g, '');
                    str = str.toLowerCase();
                    var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
                    var to = "aaaaeeeeiiiioooouuuunc------";
                    for (var i = 0, l = from.length; i < l; i++) {
                        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
                    }
                    str = str.replace(/[^a-z0-9 -]/g, '')
                        .replace(/\s+/g, '-')
                        .replace(/-+/g, '-');
                    this.slug = str;
                }
            }
        }
    </script>

    @endpush

</x-admin-layout>
