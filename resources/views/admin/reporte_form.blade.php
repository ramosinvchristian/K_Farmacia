@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Generar Reporte de Ventas</h2>

    <form method="POST" action="{{ route('admin.reporte.resultado') }}" class="space-y-4">
        @csrf
        <div>
            <label>Fecha Inicio:</label>
            <input type="date" name="fecha_inicio" required class="w-full border p-2 rounded">
        </div>
        <div>
            <label>Fecha Fin:</label>
            <input type="date" name="fecha_fin" required class="w-full border p-2 rounded">
        </div>

        <div>
            <label>Cliente (opcional):</label>
            <select name="cliente_id" class="w-full border p-2 rounded">
                <option value="">Todos</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Producto (opcional):</label>
            <select name="producto_id" class="w-full border p-2 rounded">
                <option value="">Todos</option>
                @foreach ($productos as $prod)
                    <option value="{{ $prod->id }}">{{ $prod->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Generar Reporte
        </button>
    </form>
</div>
@endsection
