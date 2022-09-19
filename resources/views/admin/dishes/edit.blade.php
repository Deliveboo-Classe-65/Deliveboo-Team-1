@php
    function hello($type, $dish, $old, $errors) {
      if ($errors->has("name") || $errors->has("description") || $errors->has("price") || $errors->has("image")) {
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
    <form action="{{ route('admin.dishes.update', $dish->id) }}" method="post" enctype="multipart/form-data">
      @csrf

      @method('PUT')

      <div class="mb-3">
        <label for="nameInput" class="form-label">Name</label>
        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
          id="nameInput" value="{{ $dish->name }}">
        <div class="invalid-feedback">
          {{ $errors->first('name') }}
        </div>
      </div>

      <div class="mb-3">
        <label for="priceInput" class="form-label">Price</label>
        <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price"
          id="priceInput" value="{{ $dish->price }}">
        <div class="invalid-feedback">
          {{ $errors->first('price') }}
        </div>
      </div>

      <div class="mb-3">
        <label for="descInput" class="form-label">Description</label>
        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="descInput"
          rows="3">{!! $dish->description  !!}</textarea>
        <div class="invalid-feedback">
          {{ $errors->first('description') }}
        </div>
      </div>

      @foreach ($types as $type)
      <div class="form-check">
          <input class="form-check-input" {{ hello($type, $dish, old("type"), $errors) }} name="type[]" type="checkbox" value="{{ $type->id }}" id="{{"flexCheckDefault" . $type->id}}">
          <label class="form-check-label" for={{"flexCheckDefault" . $type->id}}>
            {{ $type->name }}
          </label>
      </div>
      @endforeach

      <div class="d-flex gap-2">
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.dishes.index') }}" class="btn btn-danger">Cancel</a>
      </div>
    </form>

  </div>
@endsection