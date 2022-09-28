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
      <table class="table">
        <thead>
          <tr>
            <th>Visibile</th>
            <th>Nome</th>
            <th>Prezzo</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dishes as $dish)
            <tr>
              <td>
                {!! $dish->visibility ? '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="green" class="bi bi-eye" viewBox="0 0 16 16">
                  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                  </svg>' 
                  : 
                  '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="red" class="bi bi-eye-slash" viewBox="0 0 16 16">
                  <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                  <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                  <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                </svg>' !!}
              </td>
              <td>{{ $dish->name }}</td>
              <td>€ {{ $dish->price }}</td>
              
              <td class="text-end">
                <a href="{{ route('admin.dishes.show', $dish->id) }}" type="button" class="btn btn-warning">Mostra</a>
                <a href="{{ route('admin.dishes.edit', $dish->id) }}" type="button" class="btn btn-info">Modifica</a>
                <button class="btn btn-danger" data-dishid={{ $dish->id }} data-bs-toggle="modal" data-bs-target="#delete">Elimina</button>
              </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="deleteLabel" data-bs-backdrop="static"        data-bs-keyboard="false" aria-hidden="true">
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
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
@endsection
