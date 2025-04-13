@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Agregar Medicamento</h2>

    <form action="{{ route('medicamentos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">Nombre</label>
            <input type="text" name="nombre" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium">Código</label>
            <input type="text" name="codigo" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium">Descripción</label>
            <textarea name="descripcion" class="w-full border p-2 rounded"></textarea>
        </div>

        <div>
            <label class="block font-medium">Precio</label>
            <input type="number" name="precio" step="0.01" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium">Stock</label>
            <input type="number" name="stock" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium">Imagen</label>
            <input type="file" name="imagen" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Guardar
        </button>
    </form>
</div>
@endsection
