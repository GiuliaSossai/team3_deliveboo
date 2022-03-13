@extends('layouts.app')

@section('content')
    <div class="gs-container">
        <div class="container">
            <h2 class="py-4">I tuoi ristoranti</h2>
            <a class="btn btn-primary mb-3" href="{{ route('admin.ristoranti.create') }}" role="button">Aggiungi un nuovo ristorante</a>

            {{-- riga con i ristoranti --}}
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mb-5">

                @foreach ($restaurants as $restaurant)
                <div class="box p-3">
                    <div class="cover">
                        <a href="{{ route('admin.ristoranti.show', $restaurant->slug) }}">
                            <div class="box-image">
                                @if ($restaurant->photo)

                                    <img src="{{ asset($restaurant->photo) }}" alt="#">
                                @else
                                    <p>Nessuna foto presente</p>
                                @endif
                            </div>
                        
                            <div class="layover">
                                <i class="fa-solid fa-pencil gs-icon"></i>
                                <i class="fa-solid fa-trash-can gs-icon"></i>
                            </div>    
                        </a>
                    </div>
                      
                        <div class="text-box">
                            <h5>{{ $restaurant->name }}</h5>
                        </div>
                    
                </div>
                @endforeach


                @foreach ($restaurants as $restaurant)
                <div class="card-rest-box p-3">
                    <div class="translate">

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
                    
                    
                    <div class="d-flex mt-4">
                        <a class="btn btn-success mr-3" href="{{ route('admin.ristoranti.edit', $restaurant->slug) }}" role="button"
                        >Modifica</a>
                    
                        <form action="{{ route('admin.ristoranti.destroy', $restaurant) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare il ristorante {{ $restaurant->name }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
