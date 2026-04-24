@extends('layouts.crud')

@section('title', 'Productos')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-semibold">Productos</h1>
        <a href="{{ route('products.create') }}" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">
            Nuevo producto
        </a>
    </div>

    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Numero</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Nombre</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Categoria</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Precio</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wide text-slate-600">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($products as $product)
                    <tr>
                        <td class="px-4 py-3 text-sm">{{ $product->numero }}</td>
                        <td class="px-4 py-3 text-sm font-medium">{{ $product->name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $product->category ? ('#' . $product->category->numero . ' - ' . $product->category->name) : 'Sin categoria' }}</td>
                        <td class="px-4 py-3 text-sm">${{ number_format((float) $product->price, 2) }}</td>
                        <td class="px-4 py-3 text-right text-sm">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('products.show', $product) }}" class="rounded-md border border-slate-300 px-3 py-1 hover:bg-slate-100">Ver</a>
                                <a href="{{ route('products.edit', $product) }}" class="rounded-md border border-slate-300 px-3 py-1 hover:bg-slate-100">Editar</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('¿Eliminar este producto?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-md border border-red-300 px-3 py-1 text-red-700 hover:bg-red-50">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-sm text-slate-500">No hay productos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
@endsection
