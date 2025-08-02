@extends('layout')

@section('content')
    <form method="POST" action="{{ route('cars.update', $car) }}">
        @csrf
        @method('PUT')
        <input type="text" name="modelo" value="{{ $car->modelo }}" required class="w-full p-2 mb-4 border rounded">
        <input type="text" name="marca" value="{{ $car->marca }}" required class="w-full p-2 mb-4 border rounded">
        <input type="number" name="ano" value="{{ $car->ano }}" required class="w-full p-2 mb-4 border rounded">
        <input type="text" name="preco" value="{{ $car->preco }}" required class="w-full p-2 mb-4 border rounded">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Atualizar</button>
    </form>
@endsection
