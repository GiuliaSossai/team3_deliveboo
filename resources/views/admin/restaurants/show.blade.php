@extends('layouts.app')

@section('content')
    <div class="gs-box">
        <div class="container">
            <h2 class="pt-5 pb-3">Ristorante <span class="font-italic">{{ $restaurant->name }}</span></h2>

            <div class="orders my-4">
                <span><i class="fa-solid fa-right-long"></i></span>
                <span><a class="gs-link mb-5" href="{{ route('admin.order.index', $restaurant->slug) }}" 
                >i tuoi ordini</a></span> 
                {{-- role="button" --}}
            </div>

            <div class="orders my-4">
                <span><i class="fa-solid fa-left-long"></i></span>
                <span><a class="gs-link mb-5" href="{{ route('admin.ristoranti.index') }}" 
                >torna ai ristoranti</a></span> 
                {{-- role="button" --}}
            </div>
            
            <h3 class="pb-3">Menu</h3>
            <div class="row">
                <div class="col">
                    <a class="gs-btn btn btn-primary px-3 mb-3" href="{{ route('admin.piatti.create', $restaurant->slug) }}" role="button"
                    >Aggiungi un nuovo piatto</a>
                </div>
            </div>

            {{-- ciclo  prima i tipi di piatto --}}
            @foreach ($types as $type)
                <h4 class="my-4">{{ $type->name }}</h4>
                {{-- <div class="gs-row"> --}}
                <div class="row row-cols-3 gs-row">
                
                {{-- per ogni tipo ciclo i piatti relativi --}}
                @foreach ($dishes as $dish)
                    @if($type->id == $dish->type_id)
                    <div class="col mb-4 col-12 col-md-6 col-lg-4">
                        <div class="card gs-card" style="width: 18rem;">
                            <img src="{{ asset($dish->photo) }}" class="gs-img card-img-top" alt="{{ $dish->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $dish->name}}</h5>
                                <p>{{ $dish->price }}</p>
                                <p class="card-text">Ingredienti: {{ $dish->description}}</p>
                                <div class="d-flex justify-content-around">
                                    <p>Azioni:</p>
                                    <a href="{{ route('admin.piatti.edit', ['slug' => $restaurant->slug, 'piatti' => $dish->slug]) }}"
                                        role="button"
                                    ><i class="fa-solid fa-pencil"></i></a>

                                    <form
                                        action="{{ route('admin.piatti.destroy', ['slug' => $restaurant->slug, 'piatti' => $dish]) }}"
                                        method="post"
                                        onsubmit="return confirm('Sei sicuro di voler eliminare il piatto {{ $dish->name }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </div>    
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                {{-- fine ciclo dei piatti --}}
                </div>

            @endforeach
            {{-- fine ciclo dei tipi --}}

        </div>
    </div>
    
@endsection
