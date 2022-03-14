@extends('layouts.app')

@section('content')
    <div class="ls-form-back">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Modifica {{ $dish->name }}</h2>
                </div>
                <div class="card-body">


                    <form action="{{ route('admin.piatti.update', ['slug' => $restaurant_slug, 'piatti' => $dish]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Nome *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" value="{{ old('name', $dish->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="type_id">Seleziona la tipologia *</label>
                                    <select name="type_id" id="type_id" class="form-control" required>
                                        <option value="" selected>Scegli:</option>
                                        @foreach ($types as $type)
                                            <option @if ($type->id == old('type_id', $dish->type_id)) selected @endif
                                                value="{{ $type->id }}">
                                                {{ $type->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Descrizione * (es: Ingrediente1, Ingrediente2)</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                                name="description" required>{{ old('description', $dish->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="price">Prezzo *</label>
                                    <input type="number" min="0.99" max="999" step="0.01"
                                        class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                                        value="{{ old('price', $dish->price) }}" required>
                                    @error('price')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-check-label" for="visible">
                                Il piatto è attualmente disponibile o meno *
                            </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="visible" id="visible"
                                    value="{{ old('visible', 1) }}" @if ($dish->visible === 1) checked @endif>
                                <label class="form-check-label" for="visible">
                                    Disponibile
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="visible" id="visible"
                                    value="{{ old('visible', 0) }}" @if ($dish->visible === 0) checked @endif>
                                <label class="form-check-label" for="visible">
                                    Non disponibile
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="mb-2 d-flex justify-content-start">
                                            <img width="200px" src="{{ asset($dish->photo) }}" alt="">
                                        </div>
                                        @if ($dish->photo)
                                            <label for="photo">Modifica l' immagine</label>
                                        @else
                                            <label for="photo">Inserisci un immagine</label>
                                        @endif
                                        <input type="file" class="form-control-file" name="photo" id="photo">
                                    </div>
                                    @error('photo')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary">Salva</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
