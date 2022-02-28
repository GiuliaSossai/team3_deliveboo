@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>I miei Ristoranti</h1>

        <td> <a class="btn btn-primary mb-3" href="{{ route('admin.ristoranti.create') }}" role="button">Aggiungi un nuovo
                ristorante</a>
        </td>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col" colspan="3">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurants as $restaurant)
                    <tr>
                        <th scope="row">{{ $restaurant->id }}</th>
                        <td>{{ $restaurant->name }}</td>
                        <td> <a class="btn btn-primary" href="{{ route('admin.ristoranti.show', $restaurant->slug) }}"
                                role="button">Mostra</a>
                        </td>
                        <td><a class="btn btn-success" href="{{ route('admin.ristoranti.edit', $restaurant->slug) }}"
                                role="button">Modifica</a></td>
                        <td>
                            <form action="{{ route('admin.ristoranti.destroy', $restaurant) }}" method="post"
                                onsubmit="return confirm('Sei sicuro di voler eliminare il ristorante {{ $restaurant->name }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
