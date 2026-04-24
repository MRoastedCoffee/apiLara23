@extends('layouts.crud')

@section('title', 'Editar producto')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold">Editar producto</h1>
        <p class="mt-1 text-sm text-slate-600">Actualiza la informacion del producto.</p>
    </div>

    <div class="rounded-lg border border-slate-200 bg-white p-6">
        <form action="{{ route('products.update', $product) }}" method="POST">
            @method('PUT')
            @include('products._form')
        </form>
    </div>
@endsection
