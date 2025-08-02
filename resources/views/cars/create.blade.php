@extends('layout')

@section('content')
    <form method="POST" action="{{ route('cars.store') }}">
        @csrf
        <input type="text" name="modelo" placeholder="Modelo" required class="w-full p-2 mb-4 border rounded">
        <input type="text" name="marca" placeholder="Marca" required class="w-full p-2 mb-4 border rounded">
        <input type="number" name="ano" placeholder="Ano" required class="w-full p-2 mb-4 border rounded">
        <input type="text" name="preco" placeholder="Preço" required class="w-full p-2 mb-4 border rounded">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Salvar</button>
    </form>
@endsection
