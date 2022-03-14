@extends('layouts.app')

@section('content')
    <div class="od-bg">

    
        <div class="container">

            <h2 class="py-5">Ordini di: <span class="font-italic">{{ $restaurant_name }}</span></h2>

            @if (count($orders))
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Prezzo Totale</th>
                        <th scope="col">Data</th>
                        <th scope="col">Dettagli</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->customer_surname }}</td>
                                <td>{{ $order->delivery_address }}</td>
                                <td>{{ $order->customer_email }}</td>
                                <td>{{ $order->customer_phone }}</td>
                                <td>{{ $order->final_price }} €</td>
                                <td>{{ date_format($order->created_at, 'd/m/Y H:i') }}</td>
                                <td class="text-center"><a class="i-color" href="{{ route('admin.order.show', ['slug' => $slug, 'id' => $order->id]) }}"><i class="fa-solid fa-circle-info fa-xl"></i></a></td>
                            </tr>
                    @endforeach
                </tbody>
            </table>


            @else
                <h2>Non ci sono ordini per il tuo Ristorante (Stai Fallendo!!!)</h2>
            @endif

            <div class="orders mb-4">
                <span><i class="fa-solid fa-left-long"></i></span>
                <span><a class="gs-link mb-5" href="{{ route('admin.ristoranti.show', $slug) }}" 
                >torna al ristorante</a></span>
            </div>
        </div>

    </div>  
@endsection
