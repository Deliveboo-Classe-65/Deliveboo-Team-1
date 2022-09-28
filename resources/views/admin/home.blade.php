@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 mb-5">
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
            @isset($orders)
            @if (!$orders->isEmpty())
            <h3 class="mb-3 col-lg-8">
                Lista ordini da preparare
            </h3>
            @endif
            
            
            @foreach ($orders as $order)
            <div class="col-lg-8">
                <div class="card rounded-0 mb-1">
                    <div class="card-body py-1">
                        <div class="card-text py-2 mb-0 d-flex align-items-center justify-content-between">

                            <div class="col-md-8">{{ $order->delivery_address }}</div>

                            <div class="col-md-2 text-end">

                                {{ $order->chosen_delivery_time }}
                            </div>
                            <div class="col-md-1 text-center">
                                <template>
                                    <font-awesome-icon class="fs-3 {{ $order->sent ? 'text-success' : 'text-warning' }}"
                                        icon="fa-regular fa-clock" />
                                </template>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-sm btn-outline-info" data-bs-toggle="collapse"
                                    data-bs-target={{ '#order' . $order->id }}>
                                    Dettagli
                                </button>
                            </div>

                        </div>
                        <div class="collapse" id={{ 'order' . $order->id }}>
                            <div class="card-text row px-2 py-2">
                                <ul class="list-group col-lg-5 mb-2 mb-lg-0">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-9">
                                                Articolo
                                            </div>
                                            <div class="col-3">
                                                Q.tà
                                            </div>
                                        </div>
                                    </li>

                                    @foreach ($order->dishes as $dish)
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-9">
                                                    {{ $dish->name }}
                                                </div>
                                                <div class="col-3">
                                                    {{ $dish->pivot->quantity }}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-8">
                                                Totale
                                            </div>
                                            <div class="col-4">
                                                € {{ $order->total }}
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <ul class="list-group col-lg-7">
                                    <li class="list-group-item d-flex">
                                        <div class="col-4">
                                            Nome:
                                        </div>
                                        <div class="col-8">
                                            {{ $order->client_name . ' ' . $order->client_surname }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <div class="col-4">
                                            Via:
                                        </div>
                                        <div class="col-8">
                                            {{ $order->delivery_address }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <div class="col-4">
                                            Telefono:
                                        </div>
                                        <i class="fas fa-camera"></i>
                                        <div class="col-8">
                                            {{ '+39 ' . $order->client_phone }}
                                        </div>
                                    </li>
                                </ul>

                            </div>
                            <div class="mb-2">
                                @if (!$order->sent)
                                    <form action="{{ route('admin.set_order_sent', ['postId' => $order->id]) }}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-sm btn-warning">
                                            Segna come Spedito <template>
                                                <font-awesome-icon icon="fa-solid fa-truck-arrow-right" />
                                            </template>
                                        </button>
                                    </form>
                                @else
                                    <span class="text-success fs-4">
                                        <template>
                                            <font-awesome-icon icon="fa-regular fa-square-check" />
                                        </template>
                                        Spedito
                                    </span>
                                @endif
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endisset
    </div>
</div>

@endsection
