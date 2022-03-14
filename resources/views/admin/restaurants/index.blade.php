@extends('layouts.app')

@section('content')
    <div class="gs-container">
        <div class="container">
            <h2 class="py-5">I tuoi ristoranti</h2>

            {{-- riga con i ristoranti --}}
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 m3-5">

                {{-- card singolo ristorante --}}
                @foreach ($restaurants as $restaurant)
                <div class="box p-3">
                    {{-- box immagine e layover --}}
                    
                    <div class="cover">
                        <div class="box-image">
                            @if ($restaurant->photo)
                                <img src="{{ asset($restaurant->photo) }}" alt="#">
                            @else
                                <p>Nessuna foto presente</p>
                            @endif
                        </div>
                        
                        {{-- layover e azioni --}}
                        <div class="layover">
                            {{-- modifica --}}
                            <a href="{{ route('admin.ristoranti.edit', $restaurant->slug) }}" role="button"><i class="fa-solid fa-pencil gs-icon"></i></a>
                                
                            {{-- elimina --}}  
                            <form action="{{ route('admin.ristoranti.destroy', $restaurant) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare il ristorante {{ $restaurant->name }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-0">
                                    <i class="fa-solid fa-trash-can gs-icon"></i>
                                </button>
                            </form>   
                        </div>    
                    </div>
                    
                    {{-- nome ristorante --}}
                    <a href="{{ route('admin.ristoranti.show', $restaurant->slug) }}" class="gs-hover">
                        <div class="text-box">
                            <h5>{{ $restaurant->name }}</h5>
                        </div>
                    </a>   
                </div>
                @endforeach

                {{-- @foreach ($restaurants as $restaurant)
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
                @endforeach --}}
            </div>

            <a class="gs-btn btn btn-primary px-3" href="{{ route('admin.ristoranti.create') }}" role="button">Aggiungi un nuovo ristorante</a>
        </div>
    </div>
@endsection
