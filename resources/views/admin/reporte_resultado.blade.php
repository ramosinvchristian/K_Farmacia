@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Reporte de Ventas</h2>

    <form action="{{ route('admin.reporte.pdf') }}" method="POST" target="_blank">
        @csrf
        <input type="hidden" name="fecha_inicio" value="{{ request('fecha_inicio') }}">
        <input type="hidden" name="fecha_fin" value="{{ request('fecha_fin') }}">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mb-4">
            Descargar PDF
        </button>
    </form>

    <table class="w-full border-collapse border border-gray-300 mb-4">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Cliente</th>
                <th class="border p-2">Fecha</th>
                <th class="border p-2">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td class="border p-2">{{ $venta->id }}</td>
                    <td class="border p-2">{{ $venta->usuario->name }}</td>
                    <td class="border p-2">{{ $venta->created_at->format('d/m/Y') }}</td>
                    <td class="border p-2">${{ number_format($venta->total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-right font-bold text-lg">
        Total generado: ${{ number_format($total, 2) }}
    </div>
</div>
@endsection
