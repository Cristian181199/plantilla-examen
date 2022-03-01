<x-contenido>
    <x-slot name="cabecera">
        Posts
    </x-slot>
    <div class="font-sans antialiased bg-gray-50 dark:bg-gray-900 py-8">
        <x-success-message/>
        <div class="px-8 md:mr-16">
            <p class="font-sans font-bold text-2xl leading-none my-4 text-gray-900 dark:text-white">
                {{ $post->title }}
                <span class="ml-2 text-base font-normal text-gray-600 dark:text-gray-400">{{ $post->commentstotal . ' comments'}}</span>
            </p>
        </div>
        <div class="px-8 py-4">
            <div class="flex">
                <div class="w-10 h-10 bg-cover bg-center mr-3">
                    <img src="{{ asset('storage/avatares/' . $post->user_id . '.jpg') }}" alt="8bit avatar" class=" rounded-full overflow-hidden h-10 w-10">
                                </div>
                    <div>
                        <p class="text-gray-900 dark:text-white font-medium">{{ $post->user->email }}</p>

                        <div class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                            <p>{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400">{{ $post->body }}</p>
                </div>
                @if (Auth::user()->id == $post->user_id)
                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('posts.edit', [$post]) }}" class="p-2 pl-5 pr-5 bg-yellow-500 text-gray-100 text-lg rounded-lg focus:border-4 border-yellow-300">Editar</a>
                        <form action="{{ route('posts.destroy', [$post])}}" method="post">
                            @csrf
                            @method('DELETE')
                        <button class="p-2 pl-5 pr-5 bg-red-500 text-gray-100 text-lg rounded-lg focus:border-4 border-red-300">Eliminar</button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="px-8 py-4">
                <div class="px-8 md:mr-16">
                    <p class="font-sans font-bold text-xl leading-none my-4 text-gray-900 dark:text-white">Comentarios</p>
                </div>
                @foreach ($post->comments as $comment)
                <div class="flex mt-4">
                    <div class="w-10 h-10 bg-cover bg-center rounded-full mr-3 shadow-inner">
                        <img src="{{ asset('storage/avatares/' . $comment->user_id . '.jpg') }}" alt="8bit avatar" class="overflow-hidden h-10 w-10">
                                    </div>
                        <div>
                            <p class="text-gray-900 dark:text-white font-medium">{{ $comment->user->email }}</p>

                            <div class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                                <p>{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400">{{ $comment->body }}</p>
                    </div>
                    @if (Auth::user()->id == $comment->user_id)
                        <div class="mt-4">
                            <form action="{{ route('comments.destroy', [$post, $comment])}}" method="post">
                                @csrf
                                @method('DELETE')
                            <button class="p-2 pl-5 pr-5 bg-red-500 text-gray-100 text-lg rounded-lg focus:border-4 border-red-300">Eliminar</button>
                            </form>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="flex px-8">

                <div class="w-full md:w-1/4 commentForm">
                    <p class="font-sans font-bold text-2xl leading-none my-2 text-gray-900 dark:text-white">Deja un comentario!</p>
                    <form action="{{ route('comments.store', [$post]) }}" method="POST" class="mt-2 md:mt-4">
                        @csrf
                        <div class="text-gray-600 dark:text-gray-400">
                            <label class="block" for="body">Escribe tu mensaje:</label>
                            <textarea name="body" id="body" cols="32" rows="3" class="p-2 rounded border border-gray-8 bg-white dark:border-gray-700 text-gray-600 dark:text-gray-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-400 focus:border-transparent placeholder-gray-400 text-sm h-auto" maxlength="255">
                            </textarea>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <button type="submit" class="bg-teal-500 mt-4 text-white active:bg-teal-400 rounded shadow hover:shadow-lg outline-none focus:outline-none h-auto text-xs p-3">Comentar</button>
                    </form>
                </div>
            </div>
        </div>
</x-contenido>
