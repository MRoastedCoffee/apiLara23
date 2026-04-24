@extends('layouts.crud')

@section('title', 'Categorias')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-semibold">Categorias</h1>
        <a href="{{ route('categories.create') }}" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">
            Nueva categoria
        </a>
    </div>

    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Numero</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Nombre</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Descripcion</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Productos</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wide text-slate-600">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($categories as $category)
                    <tr>
                        <td class="px-4 py-3 text-sm">{{ $category->numero }}</td>
                        <td class="px-4 py-3 text-sm font-medium">{{ $category->name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $category->description ?: 'Sin descripcion' }}</td>
                        <td class="px-4 py-3 text-sm">{{ $category->products_count }}</td>
                        <td class="px-4 py-3 text-right text-sm">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('categories.show', $category) }}" class="rounded-md border border-slate-300 px-3 py-1 hover:bg-slate-100">Ver</a>
                                <a href="{{ route('categories.edit', $category) }}" class="rounded-md border border-slate-300 px-3 py-1 hover:bg-slate-100">Editar</a>
                                @if ($category->products_count === 0)
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('¿Eliminar esta categoria?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-md border border-red-300 px-3 py-1 text-red-700 hover:bg-red-50">
                                            Eliminar
                                        </button>
                                    </form>
                                @else
                                    <button type="button" class="cursor-not-allowed rounded-md border border-slate-300 px-3 py-1 text-slate-400" title="No se puede eliminar porque tiene productos asociados">
                                        Eliminar
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-sm text-slate-500">No hay categorias registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>
@endsection
