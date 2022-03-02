<x-contenido>
    <x-slot name="cabecera">
        Crear monografia
    </x-slot>
    <form action="{{ route('monografias.store') }}" method="POST">
        @csrf
        @method('POST')
        <h1 class="text-center text-2xl font-bold text-gray-500 mb-10">CREAR MONOGRAFIA</h1>
        <div class="space-y-4">
            <div>
                <label for="titulo" class="text-xl">Titulo:</label>
                <input type="text" placeholder="titulo" name="titulo" id="titulo" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md @error('titulo') border-red-500 @enderror" value="{{ old('titulo', $monografia->titulo) }}"/>
                @error('titulo')
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div>
                <label for="anyo" class="text-xl">Anyo:</label>
                <input type="text" placeholder="1968" name="anyo" id="anyo" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md @error('anyo') border-red-500 @enderror" value="{{ old('anyo', $monografia->anyo) }}"/>
                @error('anyo')
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <button type="submit" class=" px-6 py-2 mx-auto block rounded-md text-lg font-semibold text-indigo-100 bg-indigo-600">Crear monografia</button>
        </div>
        <div>
            <a href="{{ route('monografias.index') }}" class="bg-red-500 hover:bg-red-400 transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2 ring-red-500">Volver</a>
        </div>
    </form>
</x-contenido>
