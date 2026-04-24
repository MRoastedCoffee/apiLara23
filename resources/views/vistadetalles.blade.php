<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del registro</title>
</head>
<body>
    <h1>Detalles del registro</h1>
    <p><strong>ID:</strong> {{ $traductorjson['id']}}</p>
    <p><strong>Nombre:</strong> {{ $traductorjson['name'] }}</p>
    <p><strong>Base:</strong> {{ $traductorjson['base'] }}</p>
    <p><strong>Tamano:</strong> {{ $traductorjson['size'] }}</p>
    <p><strong>Leche:</strong> {{ $traductorjson['milk'] }}</p>
    <p><strong>Precio MXN:</strong> {{ $traductorjson['price_mxn'] }}</p>
    <p><strong>Calorias:</strong> {{ $traductorjson['calories_estimate'] }}</p>

        <a href="{{ url('/datoslinkpropio') }}">
            <button>Regresar</button>
        </a>
</body>
</html>
