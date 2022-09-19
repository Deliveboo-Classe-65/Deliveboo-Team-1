@extends('admin.home')

@section('page_title', 'Dishes List')

@section('content')
    <div class="text-center py-5">
      <a href="{{ route('admin.dishes.create') }}" type="button" class="btn btn-primary">Add</a>
    </div>

    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Name</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dishes as $dish)
            <tr>
              <td>{{ $dish->id }}</td>
              <td>{{ $dish->user_id }}</td>
              <td>{{ $dish->name }}</td>
              
              <td><a href="{{ route('admin.dishes.show', $dish->id) }}" type="button" class="btn btn-warning">Show</a></td>
              <td><a href="{{ route('admin.dishes.edit', $dish->id) }}" type="button" class="btn btn-info">Edit</a></td>
              <td>
                <form action="{{ route('admin.dishes.destroy', $dish->id )}}" method="POST">
                  @csrf
    
                  @method('DELETE')
                  <button type="submit" href="{{ route('admin.dishes.index') }}" class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
@endsection
