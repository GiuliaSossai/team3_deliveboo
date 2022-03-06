@extends('layouts.app')

@section('content')
    <div class="ls-form-back">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Aggiungi un nuovo piatto</h2>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.piatti.store', $restaurant_id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="type_id">Seleziona la tipologia</label>
                                    <select name="type_id" id="type_id" class="form-control">
                                        <option value="" selected>Scegli:</option>
                                        @foreach ($types as $type)
                                            <option @if ($type->id == old('type_id')) selected @endif
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
                            <label for="description">Descrizione (es: Ingrediente1, Ingrediente2)</label>
                            <textarea type="text" rows="5" class="form-control @error('description') is-invalid @enderror"
                                id="description" name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="price">Prezzo</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price') }}">
                                    @error('price')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="visible" id="visible" value="true"
                                    {{ old('visible') == 'true' ? 'checked' : '' }}>
                                <label class="form-check-label" for="visible">
                                    Disponibile
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="visible" id="visible" value="false"
                                    {{ old('visible') == 'false' ? 'checked' : '' }}>
                                <label class="form-check-label" for="visible">
                                    Non disponibile
                                </label>
                            </div>
                            @error('visible')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="photo">Inserisci un immagine</label>
                                <input type="file" class="form-control-file" name="photo" id="photo">
                            </div>
                            @error('photo')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary">Salva</button>
                            <button type="reset" class="btn btn-dark">Reset</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
