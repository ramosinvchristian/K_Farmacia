<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte PDF</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 4px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Reporte de Ventas</h2>
    <p>Desde: {{ $request->fecha_inicio }} — Hasta: {{ $request->fecha_fin }}</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->usuario->name }}</td>
                    <td>{{ $venta->created_at->format('d/m/Y') }}</td>
                    <td>${{ number_format($venta->total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p style="text-align: right; font-weight: bold; margin-top: 10px;">
        Total: ${{ number_format($total, 2) }}
    </p>
</body>
</html>
