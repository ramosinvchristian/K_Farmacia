@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-6">Dashboard Administrativo</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-4 rounded shadow text-center">
            <h3 class="text-gray-500 text-sm">Total Ventas</h3>
            <p class="text-2xl font-bold text-blue-600">{{ $totalVentas }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow text-center">
            <h3 class="text-gray-500 text-sm">Ingresos Totales</h3>
            <p class="text-2xl font-bold text-green-600">${{ number_format($ingresosTotales, 2) }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow text-center">
            <h3 class="text-gray-500 text-sm">Medicamentos Vendidos</h3>
            <p class="text-2xl font-bold text-red-600">{{ $medicamentosVendidos }}</p>
        </div>
    </div>

    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-2">Top 5 Medicamentos Más Vendidos</h3>
        <ul class="list-disc pl-6">
            @foreach ($topMedicamentos as $med)
                <li>{{ $med->nombre }} - {{ $med->total_vendido }} unidades</li>
            @endforeach
        </ul>
    </div>

    <div>
        <h3 class="text-xl font-semibold mb-2">Últimas Ventas</h3>
        <table class="w-full table-auto border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Cliente</th>
                    <th class="border p-2">Fecha</th>
                    <th class="border p-2">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventasRecientes as $venta)
                    <tr>
                        <td class="border p-2">{{ $venta->id }}</td>
                        <td class="border p-2">{{ $venta->usuario->name }}</td>
                        <td class="border p-2">{{ $venta->created_at->format('d/m/Y H:i') }}</td>
                        <td class="border p-2">${{ number_format($venta->total, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
