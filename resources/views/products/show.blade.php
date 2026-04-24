@extends('layouts.crud')

@section('title', 'Detalle de producto')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold">Detalle de producto</h1>
            <p class="mt-1 text-sm text-slate-600">Informacion completa del producto.</p>
        </div>
        <a href="{{ route('products.index') }}" class="rounded-md border border-slate-300 px-4 py-2 text-sm font-medium hover:bg-slate-100">
            Volver
        </a>
    </div>

    <div class="rounded-lg border border-slate-200 bg-white p-6">
        <dl class="grid gap-4 md:grid-cols-2">
            <div>
                <dt class="text-sm text-slate-500">Numero</dt>
                <dd class="font-medium">{{ $product->numero }}</dd>
            </div>
            <div>
                <dt class="text-sm text-slate-500">Nombre</dt>
                <dd class="font-medium">{{ $product->name }}</dd>
            </div>
            <div>
                <dt class="text-sm text-slate-500">Categoria</dt>
                <dd class="font-medium">{{ $product->category ? ('#' . $product->category->numero . ' - ' . $product->category->name) : 'Sin categoria' }}</dd>
            </div>
            <div>
                <dt class="text-sm text-slate-500">Precio</dt>
                <dd class="font-medium">${{ number_format((float) $product->price, 2) }}</dd>
            </div>
            <div class="md:col-span-2">
                <dt class="text-sm text-slate-500">Descripcion corta</dt>
                <dd class="font-medium">{{ $product->description ?: 'Sin descripcion' }}</dd>
            </div>
            <div class="md:col-span-2">
                <dt class="text-sm text-slate-500">Descripcion larga</dt>
                <dd class="font-medium whitespace-pre-line">{{ $product->descriptionLong ?: 'Sin descripcion larga' }}</dd>
            </div>
        </dl>
    </div>
@endsection
