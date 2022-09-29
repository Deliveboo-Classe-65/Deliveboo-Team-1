@extends('admin.home')

@section('page_title', 'Dish #' . $dish->id)

@section('content')
  <div class="container">
    <div class="mb-5">
      <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Tutti i piatti</a>
      <a href="{{ route('admin.dishes.edit', $dish->id) }}" type="button" class="btn btn-warning">Modifica</a>
      <button class="btn btn-danger" data-dishid={{ $dish->id }} data-bs-toggle="modal" data-bs-target="#delete">Elimina</button>
      <!-- Modal -->
      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p class="text-center fw-semibold">Sei sicuro di voler eliminare il piatto definitivamente?</p>
            </div>
            <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="post">
              @csrf
              @method('DELETE')
              <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">No, annulla</button>
                <button type="submit" class="btn btn-danger">Sì, elimina</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-4">
        @if ($dish->image)
          <img class="img-thumbnail" src="{{ asset('storage/img/dishes/' . $dish->image) }}">
        @endif
      </div>
      <div class="col-8">
        <h3 class="mb-4">{{ $dish->name }}{!! $dish->visibility ? '<i class="fa-solid fa-eye text-success"></i>' : '<i class="fa-solid fa-eye-slash text-danger"></i>' !!}</h3>
        <h5>Descrizione:</h5>
        <p>{{ $dish->description }}</p>
        @if ($dish->types->count() !== 0)
          <h5>Categorie:</h5>
          <p class="text-capitalize">{{ $dish->types->implode("name", " - ") }}</p>
        @endif
        <h5>Prezzo:</h5>
        <p>€ {{ $dish->price }}</p>
      </div>
    </div>
  </div>
@endsection