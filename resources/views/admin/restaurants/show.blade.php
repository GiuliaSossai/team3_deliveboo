@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>I miei Ristoranti {{ $restaurant->name }}</h1>

        <td> <a class="btn btn-primary mb-3" href="{{ route('admin.dish.create', $restaurant->slug) }}"
                role="button">Aggiungi un nuovo
                piatto</a>
        </td>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Ingredienti</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col" colspan="3">Azioni</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($restaurant->dishes as $dish)
                    <tr>
                        <th scope="row">{{ $dish->name }}</th>
                        <td>{{ $dish->description }}</td>
                        <td>{{ $dish->price }}</td>
                        <td> <a class="btn btn-primary" {{-- href="{{ route('admin.dish.show', ['dish' => $dish, 'slug' => $restaurant->slug]) }}" --}} role="button">Mostra</a>
                        </td>
                        <td><a class="btn btn-success" href="#" role="button">Modifica</a></td>
                        <td><a class="btn btn-danger" href="#" role="button">Elimina</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
