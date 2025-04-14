<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicamento;
use App\Models\Venta;
use App\Models\DetalleVenta;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function agregar(Request $request, $id)
    {
        $medicamento = Medicamento::findOrFail($id);
        $cantidad = $request->input('cantidad', 1);

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] += $cantidad;
        } else {
            $carrito[$id] = [
                'nombre' => $medicamento->nombre,
                'precio' => $medicamento->precio,
                'cantidad' => $cantidad
            ];
        }

        session()->put('carrito', $carrito);

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    public function ver()
    {
        $carrito = session()->get('carrito', []);
        return view('cliente.carrito', compact('carrito'));
    }

    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);
        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->route('carrito.ver')->with('success', 'Producto eliminado del carrito');
    }

    public function pagar()
    {
        $carrito = session()->get('carrito', []);
        if (empty($carrito)) {
            return redirect()->route('carrito.ver')->with('error', 'El carrito está vacío');
        }

        $total = 0;
        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        // Crear venta
        $venta = Venta::create([
            'user_id' => Auth::id(),
            'total' => $total,
        ]);

        // Crear detalles de la venta y actualizar stock
        foreach ($carrito as $id => $item) {
            DetalleVenta::create([
                'venta_id' => $venta->id,
                'medicamento_id' => $id,
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio'],
                'subtotal' => $item['precio'] * $item['cantidad'],
            ]);

            // Disminuir stock
            $med = Medicamento::find($id);
            $med->stock -= $item['cantidad'];
            $med->save();
        }

        session()->forget('carrito');

        session()->flash('ticket_id', $venta->id);

        return redirect()->route('cliente.ticket', $venta->id);

    }
}
