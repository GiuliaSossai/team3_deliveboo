@extends('layouts.app')

@section('content')
    <div class="gs-box">
    <div class="container">
        <h1>Ristorante "{{ $restaurant->name }}"</h1>

        <h3>Menu</h3>
        <div class="row">
            <div class="col-6">
                <a class="btn btn-primary mb-3" href="{{ route('admin.piatti.create', $restaurant->slug) }}"
                    role="button">Aggiungi
                    un nuovo
                    piatto</a>
            </div>
            <div class="col-6">

                <a class="btn btn-success mb-3" href="{{ route('admin.order.index', $restaurant->slug) }}"
                    role="button">Vedi Ordini</a>

            </div>
        </div>

        

        @foreach ($types as $type)
            <h2 class="my-4">{{ $type->name }}</h2>
            <div class="row row-cols-3">
                
            @foreach ($dishes as $dish)
                @if($type->id == $dish->type_id)
                <div class="col mb-4">
                    <div class="card gs-card" style="width: 18rem;">
                        <img src="{{ asset($dish->photo) }}" class="gs-img card-img-top" alt="{{ $dish->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dish->name}}</h5>
                            <p>{{ $dish->price }}</p>
                            <p class="card-text">Ingredienti: {{ $dish->description}}</p>
                            <a href="#" class="btn btn-primary">modifica</a>
                        </div>
                    </div>
                </div>
                
                    


                
                
        
                @endif
            @endforeach
            </div>
        @endforeach

    </div>
    </div>
    
@endsection
