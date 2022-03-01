<x-contenido>
    <x-slot name="cabecera">
        Crear un post
    </x-slot>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class=" bg-white rounded-md px-6 py-10 max-w-2xl mx-auto">
            <h1 class="text-center text-2xl font-bold text-gray-500 mb-10">Crear post</h1>
            <div class="space-y-4">
                <div>
                    <label for="title" class="text-lx font-serif">Titulo:</label>
                    <input type="text" name="title" placeholder="titulo" id="title" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md @error('title') border-red-500 @enderror"/>
                    @error('title')
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="body" class="block mb-2 text-lg font-serif">Descripcion:</label>
                    <textarea id="body" name="body" cols="30" rows="10" placeholder="Escribe aqui.." class="w-full font-serif  p-4 text-gray-600 outline-none rounded-md @error('body') border-red-500 @enderror"></textarea>
                    @error('body')
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <button type="submit" class="px-6 py-2 mx-auto block rounded-md text-lg font-semibold text-indigo-100 bg-indigo-600">Publicar post</button>
            </div>
        </div>
    </form>
    <a href="{{ route('posts.index') }}" class="p-2 pl-5 pr-5 bg-red-500 text-gray-100 text-lg rounded-lg focus:border-4 border-red-300">Cancelar</a>
</x-contenido>
