@extends('layouts.crud')

@section('title', 'Editar categoria')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold">Editar categoria</h1>
        <p class="mt-1 text-sm text-slate-600">Actualiza la informacion de la categoria.</p>
    </div>

    <div class="rounded-lg border border-slate-200 bg-white p-6">
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @method('PUT')
            @include('categories._form')
        </form>
    </div>
@endsection
