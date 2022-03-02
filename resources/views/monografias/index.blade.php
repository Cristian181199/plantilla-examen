<x-contenido>
    <x-slot name="cabecera">
        Monografias
    </x-slot>
    <x-success-message/>
    <x-error-message/>
    <table>
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Titulo
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Anyo
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($monografias as $monografia)
                <tr class="whitespace-nowrap">

                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            <a class="hover:text-blue-600" href="{{ route('monografias.show', $monografia) }}">
                                {{ $monografia->titulo }}
                            </a>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $monografia->anyo }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            <a href="{{ route('monografias.edit', $monografia) }}" class="mx-2 my-2 bg-white transition duration-150 ease-in-out hover:bg-gray-100 hover:text-amber-600 rounded border border-amber-700 text-amber-700 px-6 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-amber-700">Editar</a>
                        </div>
                        <div class="text-sm text-gray-900">
                            <form action="{{ route('monografias.destroy', $monografia) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="mx-2 my-2 bg-white transition duration-150 ease-in-out hover:bg-gray-100 hover:text-red-600 rounded border border-red-700 text-red-700 px-6 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-red-700">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pt-4">
        <a class="mx-2 my-2 bg-white transition duration-150 ease-in-out hover:bg-gray-100 hover:text-indigo-600 rounded border border-indigo-700 text-indigo-700 px-6 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-indigo-700" href="{{ route('monografias.create') }}">Crear monografia</a>
    </div>
</x-contenido>
