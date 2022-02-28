@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>I miei Ristoranti {{ $restaurant->name }}</h1>

        <td> <a class="btn btn-primary mb-3" href="#" role="button">Aggiungi un nuovo
                piatto</a>
        </td>

        {{-- <table class="table table-striped">
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
                        <td> <a class="btn btn-primary" href="#" role="button">Mostra</a>
                        </td>
                        <td><a class="btn btn-success" href="{{ route('admin.ristoranti.edit', $restaurant->slug) }}"
                                role="button">Modifica</a></td>
                        <td><a class="btn btn-danger" href="#" role="button">Elimiina</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table> --}}

    </div>
@endsection
