<h1>Lista de datos de la API</h1>

@foreach($traductorjson as $tj)
<div style = "border:4px solid #a125b7c3; margin:7px; padding:7px;" >
    <h3>{{$tj['title']]}}</h3>

    <a href="{{route('tj.detalle', $tj['id])}}">
        <button>HOLIS BOTON</button>
    </a>
</div>
@endforeach

