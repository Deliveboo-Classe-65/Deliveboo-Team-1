@extends('admin.home')

@section('content')
    <div class="row justify-content-center">
        @foreach ($orders as $order)
            <div class="col-lg-8">
                <div class="card mb-1">
                    <div class="card-body py-1">
                        <div class="card-title py-2 mb-0 d-flex align-items-center justify-content-between">
                            <div class="col-md-2"> Ordine # {{ $order->id }}</div>
                            <div class="col-md-2">Totale: €{{ $order->total }}</div>
                            <div class="col-md-2">Data: {{ $order->created_at->format('d/m/Y') }}</div>
                            <div class="col-md-3">Orario consegna: {{ $order->chosen_delivery_time }}</div>
                            <form action="{{ route('admin.set_order_sent', ['postId' => $order->id]) }}" method="post">
                                @csrf
                                <button class="btn btn-sm {{ $order->sent ? 'disabled btn-outline-success' : 'btn-warning' }}">
                                    Preparato
                                </button>
                            </form>
                            <button class="btn btn-sm btn-outline-info" data-bs-toggle="collapse" data-bs-target={{ '#order' . $order->id }}>
                                Dettagli
                            </button>
                        </div>
                        <div class="collapse" id={{ 'order' . $order->id }}>
                            <div class="card-text row px-2 py-2" >
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
                                            <div class="col-8">
                                                {{ '+39 '. $order->client_phone }}
                                            </div>
                                        </li>
                                    </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
