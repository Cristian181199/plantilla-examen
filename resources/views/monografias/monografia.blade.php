<x-contenido>
    <x-slot name="cabecera">
        Monografias con autores
    </x-slot>
    <x-success-message/>
    <x-error-message/>
    <table>
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Titulo de la monografia
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    autores
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($monografias as $monografia)
                <tr class="whitespace-nowrap">

                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                                {{ $monografia->titulo }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            @foreach ($monografia->articulos->autores as $autor)
                                <p>{{ $autor->nombre }}</p>
                            @endforeach
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-contenido>
