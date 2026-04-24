@csrf
<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label for="numero" class="mb-2 block text-sm font-medium">Numero</label>
        <input
            type="number"
            id="numero"
            name="numero"
            min="1"
            value="{{ old('numero', $category->numero ?? '') }}"
            class="w-full rounded-md border border-slate-300 px-3 py-2"
            required
        >
    </div>

    <div>
        <label for="name" class="mb-2 block text-sm font-medium">Nombre</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $category->name ?? '') }}"
            class="w-full rounded-md border border-slate-300 px-3 py-2"
            required
        >
    </div>

    <div>
        <label for="description" class="mb-2 block text-sm font-medium">Descripcion</label>
        <input
            type="text"
            id="description"
            name="description"
            value="{{ old('description', $category->description ?? '') }}"
            class="w-full rounded-md border border-slate-300 px-3 py-2"
        >
    </div>
</div>

<div class="mt-6 flex items-center gap-3">
    <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">
        Guardar
    </button>
    <a href="{{ route('categories.index') }}" class="rounded-md border border-slate-300 px-4 py-2 text-sm font-medium hover:bg-slate-100">
        Cancelar
    </a>
</div>
