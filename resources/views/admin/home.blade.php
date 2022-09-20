@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div>
                        <strong>Piatti:</strong>
                        <a href="{{ route('admin.dishes.index') }}">Vai ai piatti</a>
                    </div>
                    <div>
                        <strong>Ordini:</strong>
                        <a href="{{ route('admin.orders.index') }}">Vedi tutti gli ordini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
