<h1>Lista de datos Holisss</h1>

@foreach ($traductorjson as $tj)
<div style = "border:4px solid #a125b7c3; margin:7px; padding:7px;" >
    <h3>{{$tj['title']}}</h3>
    <p>{{$tj['body']}}</p>
</div>
@endforeach