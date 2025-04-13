<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Medicamento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalVentas = Venta::count();
        $ingresosTotales = Venta::sum('total');
        $medicamentosVendidos = DetalleVenta::sum('cantidad');

        $topMedicamentos = Medicamento::select('medicamentos.nombre', DB::raw('SUM(detalle_ventas.cantidad) as total_vendido'))
            ->join('detalle_ventas', 'medicamentos.id', '=', 'detalle_ventas.medicamento_id')
            ->groupBy('medicamentos.id')
            ->orderByDesc('total_vendido')
            ->limit(5)
            ->get();

        $ventasRecientes = Venta::with('usuario')->orderByDesc('created_at')->limit(5)->get();

        return view('admin.dashboard', compact(
            'totalVentas',
            'ingresosTotales',
            'medicamentosVendidos',
            'topMedicamentos',
            'ventasRecientes'
        ));
    }

    public function reporteForm()
    {
        $clientes = User::where('rol', 'cliente')->get();
        $productos = Medicamento::all();
        return view('admin.reporte_form', compact('clientes', 'productos'));
    }

    public function generarReporte(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);
    
        $ventas = Venta::with('usuario', 'detalles')
            ->whereBetween('created_at', [
                Carbon::parse($request->fecha_inicio)->startOfDay(),
                Carbon::parse($request->fecha_fin)->endOfDay()
            ]);
    
        if ($request->filled('cliente_id')) {
            $ventas->where('user_id', $request->cliente_id);
        }
    
        if ($request->filled('producto_id')) {
            $ventas->whereHas('detalles', function ($query) use ($request) {
                $query->where('medicamento_id', $request->producto_id);
            });
        }
    
        $ventas = $ventas->get();
        $total = $ventas->sum('total');
    
        return view('admin.reporte_resultado', compact('ventas', 'total'));
    }

    public function reportePDF(Request $request)
    {
        $ventas = Venta::with('usuario', 'detalles')
            ->whereBetween('created_at', [
                Carbon::parse($request->fecha_inicio)->startOfDay(),
                Carbon::parse($request->fecha_fin)->endOfDay()
            ]);

        if ($request->filled('cliente_id')) {
            $ventas->where('user_id', $request->cliente_id);
        }

        if ($request->filled('producto_id')) {
            $ventas->whereHas('detalles', function ($query) use ($request) {
                $query->where('medicamento_id', $request->producto_id);
            });
        }

        $ventas = $ventas->get();
        $total = $ventas->sum('total');

        $pdf = Pdf::loadView('admin.reporte_pdf', compact('ventas', 'total', 'request'));
        return $pdf->download('reporte_ventas.pdf');
    }

        
}
