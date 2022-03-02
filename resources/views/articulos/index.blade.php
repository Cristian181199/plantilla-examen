<x-contenido>
    <x-slot name="cabecera">
        Articulos
    </x-slot>
    <x-success-message/>
    <x-error-message/>
    <table>
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Articulo
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Numero Autores
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Numero monografias
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($articulos as $articulo)
                <tr class="whitespace-nowrap">

                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                                {{ $articulo->titulo }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $articulo->autores->count() }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $articulo->monografias_count }}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-contenido>
