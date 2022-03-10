@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="my-5">Ordini Ristorante {{ $restaurant_name }}</h1>

        @if (count($orders))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Prezzo Totale</th>
                        <th scope="col">Data</th>
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
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @else
            <h2>Non ci sono ordini per il tuo Ristorante (Stai Fallendo!!!)</h2>
        @endif


    </div>
@endsection
