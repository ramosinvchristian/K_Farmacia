@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Lista de Medicamentos</h2>

    <a href="{{ route('medicamentos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-600">
        + Agregar Medicamento
    </a>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Nombre</th>
                <th class="border p-2">Código</th>
                <th class="border p-2">Precio</th>
                <th class="border p-2">Stock</th>
                <th class="border p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicamentos as $med)
                <tr>
                    <td class="border p-2">{{ $med->nombre }}</td>
                    <td class="border p-2">{{ $med->codigo }}</td>
                    <td class="border p-2">${{ $med->precio }}</td>
                    <td class="border p-2">{{ $med->stock }}</td>
                    <td class="border p-2 space-x-2">
                        <a href="{{ route('medicamentos.edit', $med) }}" class="text-blue-500 hover:underline">Editar</a>
                        <form action="{{ route('medicamentos.destroy', $med) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar este medicamento?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
