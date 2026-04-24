@extends('layouts.crud')

@section('title', 'Detalle de categoria')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold">Detalle de categoria</h1>
            <p class="mt-1 text-sm text-slate-600">Informacion y productos asociados.</p>
        </div>
        <a href="{{ route('categories.index') }}" class="rounded-md border border-slate-300 px-4 py-2 text-sm font-medium hover:bg-slate-100">
            Volver
        </a>
    </div>

    <div class="mb-6 rounded-lg border border-slate-200 bg-white p-6">
        <dl class="grid gap-4 md:grid-cols-2">
            <div>
                <dt class="text-sm text-slate-500">Numero</dt>
                <dd class="font-medium">{{ $category->numero }}</dd>
            </div>
            <div>
                <dt class="text-sm text-slate-500">Nombre</dt>
                <dd class="font-medium">{{ $category->name }}</dd>
            </div>
            <div class="md:col-span-2">
                <dt class="text-sm text-slate-500">Descripcion</dt>
                <dd class="font-medium">{{ $category->description ?: 'Sin descripcion' }}</dd>
            </div>
        </dl>
    </div>

    <div class="rounded-lg border border-slate-200 bg-white p-6">
        <h2 class="mb-4 text-lg font-semibold">Productos de esta categoria</h2>
        <ul class="space-y-2">
            @forelse ($category->products as $product)
                <li class="rounded-md border border-slate-200 px-3 py-2">
                    #{{ $product->numero }} - {{ $product->name }} - ${{ number_format((float) $product->price, 2) }}
                </li>
            @empty
                <li class="text-sm text-slate-500">No hay productos relacionados.</li>
            @endforelse
        </ul>
    </div>
@endsection
