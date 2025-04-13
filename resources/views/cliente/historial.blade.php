@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Historial de Compras</h2>

    @if ($ventas->isEmpty())
        <p class="text-gray-600">No has realizado ninguna compra aún.</p>
    @else
        @foreach ($ventas as $venta)
            <div class="border rounded shadow p-4 mb-4 bg-white">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-bold">Compra #{{ $venta->id }}</p>
                        <p class="text-sm text-gray-500">Fecha: {{ $venta->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div class="text-right font-bold text-green-600">Total: ${{ number_format($venta->total, 2) }}</div>
                </div>

                <table class="w-full mt-4 table-auto border-collapse border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2 text-left">Producto</th>
                            <th class="border p-2">Cantidad</th>
                            <th class="border p-2">Precio Unitario</th>
                            <th class="border p-2">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($venta->detalles as $detalle)
                            <tr>
                                <td class="border p-2">{{ $detalle->medicamento->nombre }}</td>
                                <td class="border p-2 text-center">{{ $detalle->cantidad }}</td>
                                <td class="border p-2 text-center">${{ $detalle->precio_unitario }}</td>
                                <td class="border p-2 text-center">${{ $detalle->subtotal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Botón para descargar ticket PDF --}}
                <div class="mt-4 text-right">
                    <a href="{{ route('cliente.ticket', $venta->id) }}" target="_blank"
                       class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">
                        Descargar Ticket PDF
                    </a>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
