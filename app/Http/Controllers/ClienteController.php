<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ClienteController extends Controller
{
    public function inicio()
    {
        $destacados = Medicamento::select('medicamentos.*')
            ->join('detalle_ventas', 'medicamentos.id', '=', 'detalle_ventas.medicamento_id')
            ->groupBy('medicamentos.id')
            ->orderByDesc(DB::raw('SUM(detalle_ventas.cantidad)'))
            ->limit(5)
            ->get();

        $medicamentos = Medicamento::all();

        return view('cliente.inicio', compact('destacados', 'medicamentos'));
    }

    public function historial()
    {
        $ventas = auth()->user()->ventas()->with('detalles.medicamento')->orderByDesc('created_at')->get();
        return view('cliente.historial', compact('ventas'));
    }

    public function generarTicket($venta_id)
    {
        $venta = auth()->user()->ventas()->with('detalles.medicamento')->findOrFail($venta_id);
        $pdf = Pdf::loadView('cliente.ticket', compact('venta'));
        return $pdf->download('ticket_venta_' . $venta->id . '.pdf');
    }
}
