@extends('layouts.app')

@section('content')
    <div class="ls-form-back">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Aggiungi il tuo ristorante</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.ristoranti.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Nome *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">

                                <div class="form-group">
                                    <label for="p_iva">P.Iva * (es. IT76428131056)</label>
                                    <input type="text" class="form-control @error('p_iva') is-invalid @enderror" id="p_iva"
                                        name="p_iva" value="{{ old('p_iva') }}" required>
                                    @error('p_iva')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <p>Seleziona le categorie *</p>
                            <div class="form-check form-check-inline d-flex flex-wrap">
                                @foreach ($categories as $cat)
                                    <div class="d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" name="categories[]"
                                            id="{{ $cat->id }}" value="{{ $cat->id }}"
                                            @if (in_array($cat->id, old('categories', []))) checked @endif>
                                        <label class="form-check-label mr-3"
                                            for="inlineCheckbox1">{{ $cat->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('categories')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Indirizzo * (es. Via/piazza ..... n° ....)</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                name="address" value="{{ old('address') }}" required>
                            @error('address')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="phone">N. cellulare * (es.+39 0123456789)</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                        name="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="delivery_price">Prezzo di consegna *</label>
                                    <input type="number" min="0" max="10" step="0.01"
                                        class="form-control @error('delivery_price') is-invalid @enderror"
                                        id="delivery_price" name="delivery_price" value="{{ old('delivery_price') }}"
                                        required>
                                    @error('delivery_price')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="order_min">Prezzo minimo ordine *</label>
                                    <input type="number" min="0" max="99" step="0.01"
                                        class="form-control @error('order_min') is-invalid @enderror" id="order_min"
                                        name="order_min" value="{{ old('order_min') }}" required>
                                    @error('order_min')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="delivery_time">Tempo consegna in minuti *</label>
                                    <input type="number" min="10" max="120" step="1.00"
                                        class="form-control @error('delivery_time') is-invalid @enderror" id="delivery_time"
                                        name="delivery_time" value="{{ old('delivery_time') }}" required>
                                    @error('delivery_time')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="photo">Inserisci un immagine per l'icona</label>
                                        <input type="file" class="form-control-file" name="photo" id="photo">
                                    </div>
                                    @error('photo')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="photo_bg">Inserisci un immagine per il background</label>
                                        <input type="file" class="form-control-file" name="photo_bg" id="photo_bg">
                                    </div>
                                    @error('photo_bg')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Salva</button>
                            <button type="reset" class="btn btn-dark">Reset</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

    </div>
@endsection
