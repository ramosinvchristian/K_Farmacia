<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ticket de Compra</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 4px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Farmacia Kisma</h2>
    <p><strong>Cliente:</strong> {{ auth()->user()->name }}</p>
    <p><strong>Fecha:</strong> {{ $venta->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Ticket #:</strong> {{ $venta->id }}</p>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cant.</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($venta->detalles as $detalle)
                <tr>
                    <td>{{ $detalle->medicamento->nombre }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>${{ $detalle->precio_unitario }}</td>
                    <td>${{ $detalle->subtotal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p style="text-align: right; margin-top: 10px;">
        <strong>Total:</strong> ${{ number_format($venta->total, 2) }}
    </p>
    <p style="text-align: center; margin-top: 20px;">¡Gracias por tu compra!</p>
</body>
</html>
