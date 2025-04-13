@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Editar Medicamento</h2>

    <form action="{{ route('medicamentos.update', $medicamento) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Nombre</label>
            <input type="text" name="nombre" value="{{ $medicamento->nombre }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium">Código</label>
            <input type="text" name="codigo" value="{{ $medicamento->codigo }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium">Descripción</label>
            <textarea name="descripcion" class="w-full border p-2 rounded">{{ $medicamento->descripcion }}</textarea>
        </div>

        <div>
            <label class="block font-medium">Precio</label>
            <input type="number" name="precio" value="{{ $medicamento->precio }}" step="0.01" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium">Stock</label>
            <input type="number" name="stock" value="{{ $medicamento->stock }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium">Imagen (opcional)</label>
            <input type="file" name="imagen" class="w-full border p-2 rounded">
        </div>

        @if($medicamento->imagen)
            <div>
                <img src="{{ asset('storage/' . $medicamento->imagen) }}" alt="Imagen actual" class="h-32 mt-2">
            </div>
        @endif

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Actualizar
        </button>
    </form>
</div>
@endsection
