<x-contenido>
    <x-slot name="cabecera">
        Posts
    </x-slot>

    <div class="p-16">
        <x-success-message/>
        <div>
            <a href="{{ route('posts.create') }}" class="font-bold text-lg h-2 mb-8 border-2 border-green-400 rounded-full text-green-400 px-4 py-3 transition duration-300 ease-in-out hover:bg-green-400 hover:text-white mr-6">Publicar un post</a>
        </div>
        <div class="grid md:grid-cols-2 sm:grid-cols-1 lg:grid-cols-3 m-5 mb-10">
            @foreach ($posts as $post)
                <div class="bg-white overflow-hidden hover:bg-green-100 border border-gray-200 p-3">
                    <div class="m-2 text-justify text-sm">
                        <p class="text-right text-xs">{{ $post->created_at }}</p>
                        <h2 class="font-bold text-lg h-2 mb-8">{{ $post->title }}</h2>
                        <p class="text-xs">{{ $post->body }}</p>
                    </div>
                    <div class="w-full text-right mt-4">
                    <a class="text-green-400 uppercase font-bold text-sm" href="{{ route('posts.show', [$post]) }}">Leer mas</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

</x-contenido>
