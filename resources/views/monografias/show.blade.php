<x-contenido>
    <x-slot name="cabecera">
        Show
    </x-slot>
    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <h1 class="text-2xl">Datos de la monografia:</h1>

        <h3 class="border-t mb-2 pt-3 font-semibold">Titulo: <span class="font-thin">{{ $monografia->titulo }}</span></p>
        <h3 class="border-t mb-2 pt-3 font-semibold">Anyo: <span class="font-thin">{{ $monografia->anyo }}</span></p>    </div>
    <div class="flex justify-end space-x-2 pt-3">
            <a href="{{ route('monografias.index') }}" class="bg-red-500 hover:bg-red-400 transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2 ring-red-500">Volver</a>
    </div>
</x-contenido>
