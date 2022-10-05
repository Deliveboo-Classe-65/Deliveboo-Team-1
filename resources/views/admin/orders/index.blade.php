@extends('admin.home')

@section('content')
    <h1 class="text-center">Lista ordini</h1>
    <div class="row justify-content-center">
        @foreach ($orders as $order)
            <div class="col-lg-8">
                <div class="card rounded-0 mb-1">
                    <div class="card-body py-1">
                        <div class="card-text py-2 mb-0 d-flex align-items-center justify-content-between">
                            <div class="col-md-7">{{ $order->delivery_address }}</div>
                            <div class="col-md-2 text-end">{{ $order->chosen_delivery_time }}</div>
                            <div class="col-md-1 text-center">
                                @if ($order->sent)
                                    <i class="fs-3 text-success fa-solid fa-truck" ></i>                                       
                                @else
                                    <i class="fs-3 text-warning fa-solid fa-clock" ></i>
                                @endif
                            </div>
                            <div class="col-md-2 text-center">
                                <button class="btn btn-sm {{ $order->sent ? 'btn-outline-primary' : 'btn-warning' }}" data-bs-toggle="collapse" data-bs-target={{ '#order' . $order->id }}>Dettagli <i class=" fs-5 fa-solid fa-caret-down"></i></button>
                            </div>
                        </div>
                        <div class="collapse" id={{ 'order' . $order->id }}>
                            <div class="card-text row px-2 pt-2 pb-3">
                                <div class="col-lg-5">
                                    <div class="fw-bold mb-2">Dettagli ordine:</div>
                                    <ul class="list-group mb-4">
                                        @foreach ($order->dishes as $dish)
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-9">{{ $dish->name }}</div>
                                                    <div class="col-3">{{ $dish->pivot->quantity }}</div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-lg-7">
                                    <div class="fw-bold mb-2">Dettagli cliente:</div>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex">
                                            <div class="col-4">Nome:</div>
                                            <div class="col-8">{{ $order->client_name . ' ' . $order->client_surname }}</div>
                                        </li>
                                        <li class="list-group-item d-flex">
                                            <div class="col-4">Indirizzo:</div>
                                            <div class="col-8">{{ $order->delivery_address }}</div>
                                        </li>
                                        <li class="list-group-item d-flex">
                                            <div class="col-4">Telefono:</div>
                                            <div class="col-8">{{ '+39 ' . $order->client_phone }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col">
                                    @if (!$order->sent)
                                        <form action="{{ route('admin.set_order_sent', ['postId' => $order->id]) }}"method="post">
                                            @csrf
                                            <button class="btn btn-warning">Segna come Spedito <i class="fa-solid fa-truck-arrow-right"></i></button>
                                        </form>
                                    @else
                                        <span class="text-success fs-5"><i class="fa-solid fa-square-check"></i> Spedito</span>
                                    @endif
                                </div>
                                <div class="col">
                                    <div class="px-3 text-end"><span class="fw-bold">Totale:</span> € {{ $order->total }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $orders->links('vendor.pagination.bootstrap') }}
@endsection
