@extends('admin.home')

@section('page_title', 'Dish #' . $dish->id)

@section('content')
    <div class="container">
      <h2>{{ $dish->name }}</h2>
      <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><line x1="20" y1="12" x2="4" y2="12"></line><polyline points="10 18 4 12 10 6"></polyline></svg> Tutti i piatti
      </a>
      <a href="{{ route('admin.dishes.edit', $dish->id) }}" type="button" class="btn btn-info">Modifica</a>
      
      <form action="{{ route('admin.dishes.destroy', $dish->id )}}" method="POST">
        @csrf
  
        @method('DELETE')
        <button type="submit" href="{{ route('admin.dishes.index') }}" class="btn btn-danger">Elimina</button>
      </form>
      <p>{{ $dish->description }}</p>
      <span>{{ $dish->price }}</span>
      {{$dish->types->implode("name", " - ")}}
    </div>
@endsection