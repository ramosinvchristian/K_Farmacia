@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Carrito de Compras</h2>

    @if (session('success'))
        <div class="bg-green-100 border text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if (count($carrito) > 0)
        <table class="w-full table-auto border-collapse border border-gray-300 mb-4">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">Producto</th>
                    <th class="border p-2">Cantidad</th>
                    <th class="border p-2">Precio Unitario</th>
                    <th class="border p-2">Subtotal</th>
                    <th class="border p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($carrito as $id => $item)
                    @php $subtotal = $item['precio'] * $item['cantidad']; $total += $subtotal; @endphp
                    <tr>
                        <td class="border p-2">{{ $item['nombre'] }}</td>
                        <td class="border p-2">{{ $item['cantidad'] }}</td>
                        <td class="border p-2">${{ $item['precio'] }}</td>
                        <td class="border p-2">${{ $subtotal }}</td>
                        <td class="border p-2">
                            <a href="{{ route('carrito.eliminar', $id) }}" class="text-red-500 hover:underline">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right font-bold text-xl mb-4">Total: ${{ number_format($total, 2) }}</div>

        <form method="POST" action="{{ route('carrito.pagar') }}">
            @csrf
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Confirmar Compra
            </button>
        </form>
    @else
        <p class="text-gray-600">Tu carrito está vacío.</p>
    @endif
</div>
@endsection
