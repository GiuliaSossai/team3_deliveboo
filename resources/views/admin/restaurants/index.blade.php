@extends('layouts.app')

@section('content')

    <div class="container mt-5">



        <h2>I Ristoranti</h2>

        <a class="btn btn-primary mb-3" href="{{ route('admin.ristoranti.create') }}" role="button">Aggiungi un nuovo ristorante</a>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mb-5">
        @foreach ($restaurants as $restaurant)
            <div class="card-rest-box p-3">
                <div class="translate">

                    <a href=""></a>

                    <a href="{{ route('admin.ristoranti.show', $restaurant->slug) }}">

                        <div class="card-rest-box-image" >
                            @if ($restaurant->photo)

                                <img src="{{ asset($restaurant->photo) }}" alt="#">
                            @else
                                <p>Nessuna foto presente</p>
                            @endif
                            
                        </div>
                    
                    </a>
                

                    <div class="card-rest-box-text">
                        <h5>{{ $restaurant->name }}</h5>
                    </div>

                </div>
                
                <div class="d-flex mt-3 ">

                    <a class="btn btn-success mr-3" href="{{ route('admin.ristoranti.edit', $restaurant->slug) }}" role="button">Modifica</a>
                    <form action="{{ route('admin.ristoranti.destroy', $restaurant) }}" method="post"
                                    onsubmit="return confirm('Sei sicuro di voler eliminare il ristorante {{ $restaurant->name }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </div>
            </div>
            




        @endforeach
        
    </div>
    </div>

        {{-- <h1>I miei Ristoranti</h1>

        <td> <a class="btn btn-primary mb-3" href="{{ route('admin.ristoranti.create') }}" role="button">Aggiungi un nuovo
                ristorante</a>
        </td>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col" colspan="3">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurants as $restaurant)
                    <tr>
                        <td>
                            @if ($restaurant->photo)
                                <img src="{{ asset($restaurant->photo) }}" alt="#" style="width:50px">
                            @else
                                <p>Nessuna foto presente</p>
                            @endif
                        </td>
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
        </table> --}}

    </div>

@endsection
