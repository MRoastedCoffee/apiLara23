<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CRUD Laravel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <nav class="bg-white shadow">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4 sm:px-6">
            <a href="{{ url('/') }}" class="text-lg font-semibold">Gestión de Productos y Categorías</a>
            <div class="flex gap-2">
                <a href="{{ route('categories.index') }}" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-slate-100">Categorias</a>
                <a href="{{ route('products.index') }}" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-slate-100">Productos</a>
            </div>
        </div>
    </nav>

    <main class="mx-auto max-w-6xl px-4 py-8 sm:px-6">
        @if (session('success'))
            <div class="mb-6 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                <p class="font-semibold">Se encontraron errores:</p>
                <ul class="mt-2 list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
