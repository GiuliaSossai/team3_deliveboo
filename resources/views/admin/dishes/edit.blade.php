@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica {{ $dish->name }}</h1>

        <form action="{{ route('admin.piatti.update', ['slug' => $restaurant_slug, 'piatti' => $dish]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nome Piatto</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $dish->name) }}">
                @error('name')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="type_id">Seleziona il tipo</label>
                <select name="type_id" id="type_id" class="form-control">
                    <option value="" selected>Scegli:</option>
                    @foreach ($types as $type)
                        <option @if ($type->id == old('type_id', $dish->type_id)) selected @endif value="{{ $type->id }}">
                            {{ $type->name }} </option>
                    @endforeach

                </select>
                @error('type_id')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Descrizione (es: Ingrediente1 | Ingrediente2)</label>
                <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                    name="description">{{ old('description', $dish->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Prezzo</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                    value="{{ old('price', $dish->price) }}">
                @error('price')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <div class="form-group">
                    <div class="mb-2">
                        <img width="250px" src="{{ asset($dish->photo) }}" alt="">
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

            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" name="visible" id="visible" value="0"
                        @if (!old('visible', $dish->visible)) checked @endif>
                    <label class="custom-control-label" for="visible">Non Disponibile</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Modifica</button>
            <button type="reset" class="btn btn-dark">Reset</button>
        </form>

    </div>
@endsection
