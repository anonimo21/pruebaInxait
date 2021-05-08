<div class="mx-2">
    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 my-4 rounded">
        <i class="fas fa-save"></i> Nuevo
    </button>
    <a href="{{ route('clientes.export') }}"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 my-4 rounded">
        <i class="fas fa-file-excel"></i> Exportar
    </a>
    <input type="text" placeholder="Buscar..." wire:model="search"
        class="my-2 w-full focus:outline-one focus:border-blue-300 rounded" />
    @if ($champion)
        <div class="bg-blue-100 border-l-4 border-blue-500 text-orange-700 my-4 p-4" role="alert">

            <p class="font-bold">Ganador del concurso</p>
            <p><span>Cédula</span>: {{ $champion->cedula }}</p>
            <p><span>Nombres</span>: {{ $champion->nombres }}</p>
            <p><span>Apellidos</span>: {{ $champion->apellidos }}</p>

        </div>
    @endif
    <table class="w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col"
                    class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nombres
                </th>
                <th scope="col"
                    class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Apellidos
                </th>
                <th scope="col"
                    class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Cedula
                </th>
                <th scope="col"
                    class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Departamento
                </th>
                <th scope="col"
                    class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Ciudad
                </th>
                <th scope="col"
                    class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Celular
                </th>
                <th scope="col"
                    class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Correo
                </th>
                <th scope="col"
                    class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Términos
                </th>
                <th scope="col"
                    class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fecha Creación
                </th>
                <th scope="col"
                    class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Editar
                </th>
                <th scope="col"
                    class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Eliminar
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($clientes as $cliente)
                <tr>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $cliente->nombres }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $cliente->apellidos }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        <div class="text-sm text-gray-900">{{ $cliente->cedula }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        <div class="text-sm text-gray-900">{{ $cliente->departamento }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        <div class="text-sm text-gray-900">{{ $cliente->ciudad }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        <div class="text-sm text-gray-900">{{ $cliente->celular }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        <div class="text-sm text-gray-900">{{ $cliente->correo }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        <div class="text-sm text-gray-900">{{ $cliente->terminos }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        <div class="text-sm text-gray-900">{{ $cliente->created_at }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm font-medium">
                        <a class="cursor-pointer"><i class="fas fa-edit"></i></a>
                    </td>
                    <td class="px-6 py-4 text-sm font-medium">
                        <a class="cursor-pointer"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($clientes->hasPages())
        <div class="px-6 py-6">
            {{ $clientes->links() }}
        </div>
    @endif
</div>
