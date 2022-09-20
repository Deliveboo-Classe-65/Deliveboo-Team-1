@php
    function checked($type, $dish, $old, $errors) {
      if ($errors->count() > 0) {
        if (in_array($type->id, $old ?? [])) {
          return 'checked';
        }
      } else {
        if ($dish->types->contains($type)) {
          return 'checked';
        }
      }
    }
@endphp

@extends('admin.home')

@section('page_title', 'Edit Dish #' . $dish->id)

@section('content')

  @csrf 
  
  <div class="container">
    <h1>Modifica piatto</h1>
    <form action="{{ route('admin.dishes.update', $dish->id) }}" method="post" enctype="multipart/form-data">
      @csrf

      @method('PUT')

      <div class="mb-3">
        <label for="nameInput" class="form-label">Nome</label>
        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
          id="nameInput" value="{{ $dish->name }}">
        <div class="invalid-feedback">
          {{ $errors->first('name') }}
        </div>
      </div>

      <div class="mb-3">
        <label for="priceInput" class="form-label">Prezzo</label>
        <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price"
          id="priceInput" value="{{ $dish->price }}">
        <div class="invalid-feedback">
          {{ $errors->first('price') }}
        </div>
      </div>

      <div class="form-group">
        <label for="img_file" class="form-label">Immagine</label>

        <div class="d-flex">
          @if ($dish->image)
          <img class="img-thumbnail" style="width: 150px" src="{{ asset('storage/' . $dish->image) }}">
          @endif
          
          <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror" id="img_file">
        </div>
        @error('image')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="descInput" class="form-label">Descrizione</label>
        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="descInput"
          rows="3">{!! $dish->description  !!}</textarea>
        <div class="invalid-feedback">
          {{ $errors->first('description') }}
        </div>
      </div>

      @foreach ($types as $type)
      <div class="form-check">
          <input class="form-check-input" {{ checked($type, $dish, old("types"), $errors) }} name="types[]" type="checkbox" value="{{ $type->id }}" id="{{"flexCheckDefault" . $type->id}}">
          <label class="form-check-label" for={{"flexCheckDefault" . $type->id}}>
            {{ $type->name }}
          </label>
      </div>
      @endforeach
      
      <div class="form-check">
        <input class="form-check-input" {{ $errors->count() === 0 && $dish->visibility === 1 || old("visibility") ? 'checked' : '' }} name="visibility" type="checkbox" value="1" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Visibile
        </label>
      </div>
      
      <div class="d-flex gap-2">
        <button type="submit" class="btn btn-success">Salva</button>
        <a href="{{ route('admin.dishes.index') }}" class="btn btn-danger">Annulla</a>
      </div>
    </form>

  </div>
@endsection