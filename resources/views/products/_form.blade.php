@csrf
<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label for="numero" class="mb-2 block text-sm font-medium">Numero</label>
        <input
            type="number"
            id="numero"
            name="numero"
            min="1"
            value="{{ old('numero', $product->numero ?? '') }}"
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
            value="{{ old('name', $product->name ?? '') }}"
            class="w-full rounded-md border border-slate-300 px-3 py-2"
            required
        >
    </div>

    <div>
        <label for="price" class="mb-2 block text-sm font-medium">Precio</label>
        <input
            type="number"
            id="price"
            name="price"
            step="0.01"
            min="0"
            value="{{ old('price', isset($product) ? number_format((float) $product->price, 2, '.', '') : '') }}"
            class="w-full rounded-md border border-slate-300 px-3 py-2"
            required
        >
    </div>

    <div class="md:col-span-2">
        <label for="description" class="mb-2 block text-sm font-medium">Descripcion corta</label>
        <input
            type="text"
            id="description"
            name="description"
            value="{{ old('description', $product->description ?? '') }}"
            class="w-full rounded-md border border-slate-300 px-3 py-2"
        >
    </div>

    <div class="md:col-span-2">
        <label for="descriptionLong" class="mb-2 block text-sm font-medium">Descripcion larga</label>
        <textarea
            id="descriptionLong"
            name="descriptionLong"
            rows="4"
            class="w-full rounded-md border border-slate-300 px-3 py-2"
        >{{ old('descriptionLong', $product->descriptionLong ?? '') }}</textarea>
    </div>

    <div class="md:col-span-2">
        <label for="category_id" class="mb-2 block text-sm font-medium">Categoria</label>
        <select id="category_id" name="category_id" class="w-full rounded-md border border-slate-300 px-3 py-2">
            <option value="">Sin categoria</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected((string) old('category_id', $product->category_id ?? '') === (string) $category->id)>
                    #{{ $category->numero }} - {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="mt-6 flex items-center gap-3">
    <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">
        Guardar
    </button>
    <a href="{{ route('products.index') }}" class="rounded-md border border-slate-300 px-4 py-2 text-sm font-medium hover:bg-slate-100">
        Cancelar
    </a>
</div>
