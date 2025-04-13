@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Medicamentos Destacados</h2>

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
