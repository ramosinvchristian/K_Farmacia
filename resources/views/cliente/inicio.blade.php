@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Medicamentos Destacados</h2>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if (session('ticket_id'))
        <div class="mt-4">
            <a href="{{ route('cliente.ticket', session('ticket_id')) }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                Descargar ticket de la última compra
            </a>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        @foreach ($destacados as $med)
            <div class="border rounded shadow p-4 bg-yellow-50">
                <h3 class="text-lg font-semibold">{{ $med->nombre }}</h3>
                <p class="text-sm text-gray-600">{{ $med->descripcion }}</p>
                <p class="text-green-700 font-bold mt-2">${{ $med->precio }}</p>
                <form method="POST" action="{{ route('carrito.agregar', $med->id) }}" class="mt-2">
                    @csrf
                    <input type="number" name="cantidad" min="1" value="1" class="w-16 border rounded p-1">
                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 ml-2">
                        Agregar al carrito
                    </button>
                </form>
            </div>
        @endforeach
    </div>

    <h2 class="text-2xl font-bold mb-4">Todos los Medicamentos</h2>

    @if(session()->has('carrito') && count(session('carrito')) > 0)
        <div class="mb-4">
            <a href="{{ route('carrito.ver') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                🛒 Ver Carrito y Finalizar Compra
            </a>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        @foreach ($medicamentos as $med)
            <div class="border rounded shadow p-4">
                <h3 class="text-lg font-semibold">{{ $med->nombre }}</h3>
                <p class="text-sm text-gray-600">{{ $med->descripcion }}</p>
                <p class="text-green-700 font-bold mt-2">${{ $med->precio }}</p>
                <form method="POST" action="{{ route('carrito.agregar', $med->id) }}" class="mt-2">
                    @csrf
                    <input type="number" name="cantidad" min="1" value="1" class="w-16 border rounded p-1">
                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 ml-2">
                        Agregar al carrito
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
