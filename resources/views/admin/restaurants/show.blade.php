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
                    <a class="gs-btn btn btn-primary px-3 mb-5" href="{{ route('admin.piatti.create', $restaurant->slug) }}" role="button"
                    >Aggiungi un nuovo piatto</a>
                </div>
            </div>

            
            {{-- @foreach ($types as $type)
                <h4 class="my-4">{{ $type->name }}</h4>
                
                <div class="row row-cols-3 gs-row"> --}}
                
                
                {{-- @foreach ($dishes as $dish)
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
                @endforeach --}}
                
                {{-- </div>

            @endforeach --}}

            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Descrizione</th>
                        {{-- <th scope="col">Ingredienti</th> --}}
                        <th scope="col">Prezzo</th>
                        <th scope="col">Visibile</th>
                        <th scope="col" colspan="2" class="text-center">Azioni</th>
    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                    <tr class="gs-row">
                        <td colspan="6">
                            <h4>{{ $type->name }}</h4>
                        </td>   
                    </tr>
                        @foreach ($restaurant->dishes as $dish)
                        @if($type->id == $dish->type_id)
                        <tr>
                            <td>
                                <div class="gs-dish-img">
                                    @if ($dish->photo)
                                    <img src="{{ asset($dish->photo) }}" alt="{{$dish->name}}">
                                    @else
                                        <p>Nessuna foto presente</p>
                                    @endif
                                </div>
                                
                            </td>
                            <td>
                                <h4 class="mt-2">{{ $dish->name }}</h4>
                                <p>ingredienti: {{ $dish->description }}</p>
                            </td>
                            {{-- <td>{{ $dish->description }}</td> --}}
                            <td><p class="mt-4">{{ $dish->price }} €</p></td>
                            <td>
                                <p class="mt-4">
                                    @if ($dish->visible === 1)
                                        Sì
                                    @else
                                        No
                                    @endif
                                </p>   
                            </td>
                            <td><a class="btn mt-4"
                                    href="{{ route('admin.piatti.edit', ['slug' => $restaurant->slug, 'piatti' => $dish->slug]) }}"
                                    role="button"><i class="fa-solid fa-pencil"></i></a></td>
                            <td>
                                <form class="mt-4"
                                    action="{{ route('admin.piatti.destroy', ['slug' => $restaurant->slug, 'piatti' => $dish]) }}"
                                    method="post"
                                    onsubmit="return confirm('Sei sicuro di voler eliminare il piatto {{ $dish->name }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endif
            
                    @endforeach
                </tbody>
                @endforeach
            </table>
            

        </div>
    </div>
    
@endsection
