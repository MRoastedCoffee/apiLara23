<h1>Mi propio URL</h1>

@foreach ($traductorjson as $tj)
<div style = "border:4px solid #a125b7c3; margin:7px; padding:7px;" >
    <h3>{{$tj['name']}}</h3>
    <p>{{$tj['base']}}</p>
    <p>{{$tj['size']}}</p>
    <a href="{{ route('tj.detalle', $tj['id']) }}">
        <button>Ver detalle</button>
    </a>
</div>
@endforeach