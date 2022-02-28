@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Aggiungi il tuo ristorante</h1>

        <form action="{{ route('admin.ristoranti.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="p_iva">P.Iva</label>
                <input type="text" class="form-control @error('p_iva') is-invalid @enderror" id="p_iva" name="p_iva"
                    value="{{ old('p_iva') }}">
                @error('p_iva')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Indirizzo</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                    value="{{ old('address') }}">
                @error('address')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">N. cellulare</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                    value="{{ old('phone') }}">
                @error('phone')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="delivery_price">Prezzo di consegna</label>
                <input type="text" class="form-control @error('delivery_price') is-invalid @enderror" id="delivery_price"
                    name="delivery_price" value="{{ old('delivery_price') }}">
                @error('delivery_price')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="order_min">Minimo ordine</label>
                <input type="text" class="form-control @error('order_min') is-invalid @enderror" id="order_min"
                    name="order_min" value="{{ old('order_min') }}">
                @error('order_min')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="delivery_time">Tempo di consegna in minuti</label>
                <input type="text" class="form-control @error('delivery_time') is-invalid @enderror" id="delivery_time"
                    name="delivery_time" value="{{ old('delivery_time') }}" default="30">
                @error('delivery_time')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-dark">Reset</button>
        </form>

    </div>
@endsection
