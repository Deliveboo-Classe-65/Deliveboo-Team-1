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
    <div class="d-flex justify-content-between align-items-center">
      <h1>Modifica piatto</h1>
      <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><line x1="20" y1="12" x2="4" y2="12"></line><polyline points="10 18 4 12 10 6"></polyline></svg> Tutti i piatti
      </a>
    </div>
    <form action="{{ route('admin.dishes.update', $dish->id) }}" method="post" enctype="multipart/form-data">
      @csrf

      @method('PUT')

      <div class="row mb-3">
        <div class="col-md-8">
          <label for="nameInput">Nome</label>
          <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="nameInput" value="{{ $dish->name }}">
          <div class="invalid-feedback">
            {{ $errors->first('name') }}
          </div>
        </div>
        <div class="col-md-4">
          <label for="priceInput">Prezzo</label>
          <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" id="priceInput" value="{{ $dish->price }}">
          <div class="invalid-feedback">
            {{ $errors->first('price') }}
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label for="img_file" >Immagine</label>

        <div class="d-flex">
          @if ($dish->image)
            <img class="img-thumbnail" style="width: 150px" src="{{ asset('storage/' . $dish->image) }}">
          @endif
          
          <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="img_file">
        </div>
        @error('image')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="descInput" >Descrizione</label>
        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="descInput" rows="3">{!! $dish->description  !!}</textarea>
        <div class="invalid-feedback">
          {{ $errors->first('description') }}
        </div>
      </div>

      <div class="mb-3">
        <fieldset class="form-control">
          <legend class="fs-6">Seleziona una o più categorie</legend>
            @foreach ($types as $type)
            <div class="form-check form-check-inline">
                <input class="form-check-input" {{ checked($type, $dish, old("types"), $errors) }} name="types[]" type="checkbox" value="{{ $type->id }}" id="{{"flexCheckDefault" . $type->id}}">
                <label class="form-check-label" for={{"flexCheckDefault" . $type->id}}>
                  {{ $type->name }}
                </label>
            </div>
            @endforeach
        </fieldset>
      </div>

      <div class="form-check form-switch mb-3">
        <input class="form-check-input" {{ $errors->count() === 0 && $dish->visibility === 1 || old("visibility") ? 'checked' : '' }} role="switch" name="visibility" type="checkbox" value="1" id="flexCheckDefault">
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