@extends('admin.home')

@section('page_title', 'Dishes List')

@section('content')
  <div class="row justify-content-between py-3">
    <div class="col">
      <h2>Lista piatti</h2>
    </div>
    <div class="col text-end">
      <a href="{{ route('admin.dishes.create') }}" type="button" class="btn btn-primary">Aggiungi piatto</a>
    </div>
  </div>
  <div class="container">
    @if (session('success'))
      <div class="alert alert-success" role="alert">
        Il piatto è stato eliminato correttamente.
      </div>
    @endif
    @if (count($dishes) === 0)
      <h5>Non hai ancora inserito un piatto.</h5>     
    @else
      <table class="table">
        <thead>
          <tr>
            <th class="text-center">Visibile</th>
            <th>Nome</th>
            <th>Prezzo</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dishes as $dish)
            <tr>
              <td class="text-center fs-4">{!! $dish->visibility ? '<i class="fa-solid fa-eye text-success"></i>' : '<i class="fa-solid fa-eye-slash text-danger"></i>' !!}</td>
              <td>{{ $dish->name }}</td>
              <td>€ {{ $dish->price }}</td>
              <td class="text-end">
                <a href="{{ route('admin.dishes.show', $dish->id) }}" type="button" class="btn btn-primary">Mostra</a>
                <a href="{{ route('admin.dishes.edit', $dish->id) }}" type="button" class="btn btn-warning">Modifica</a>
                <button class="btn btn-danger" data-dishid={{ $dish->id }} data-bs-toggle="modal" data-bs-target="#delete">Elimina</button>
              </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="deleteLabel" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5>Sei sicuro di voler eliminare il piatto definitivamente?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
@endsection
