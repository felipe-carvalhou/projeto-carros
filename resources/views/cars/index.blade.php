@extends('layout')

@section('content')
    <a href="{{ route('cars.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Adicionar Carro</a>
    <table class="table-auto w-full mt-6 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Modelo</th>
                <th class="px-4 py-2">Marca</th>
                <th class="px-4 py-2">Ano</th>
                <th class="px-4 py-2">Preço</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $car->modelo }}</td>
                <td class="px-4 py-2">{{ $car->marca }}</td>
                <td class="px-4 py-2">{{ $car->ano }}</td>
                <td class="px-4 py-2">R$ {{ number_format($car->preco, 2, ',', '.') }}</td>
                <td class="px-4 py-2 flex gap-2">
                    <a href="{{ route('cars.edit', $car) }}" class="bg-yellow-500 px-2 py-1 text-white rounded">Editar</a>
                    <form method="POST" action="{{ route('cars.destroy', $car) }}">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 px-2 py-1 text-white rounded">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
