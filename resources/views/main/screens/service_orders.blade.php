@extends('layouts.screens.service_orders')

@section('title', 'Ordens de Serviço')

@section('content')

<section id="MainSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 text-center p-3">
                <div class="title-top">
                    Clientes
                </div>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4 text-center p-3">
                <a href="{{ route('service_orders.create') }}">
                    <button class="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#fff" class="bi bi-plus-lg"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                        </svg>
                        Adicionar
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg text-center">
                <div class="table-box">
                    <table class="table table-striped">
                        <thead>
                            <th class="table-column">Cliente</th>
                            <th class="table-column">Veículo</th>
                            <th class="table-column">Equipe</th>
                            <th class="table-column">Total</th>
                            <th class="table-column">Status</th>
                            <th class="table-column">Ver</th>
                            <th class="table-column">Excluir</th>
                        </thead>
                        <tbody>
                            @foreach ($service_orders as $service_order)
                            <tr>
                                <td class="table-column">
                                    <p>{{ optional($service_order->client)->name }}</p>
                                </td>
                                <td class="table-column">
                                    <p>{{ optional($service_order->vehicle)->license_plate }}</p>
                                </td>
                                <td class="table-column">
                                    <p>{{ optional($service_order->team)->name }}</p>
                                </td>
                                <td class="table-column">
                                    <p>{{ optional($service_order)->total }}</p>
                                </td>
                                <td class="table-column">
                                    <p>{{ optional($service_order)->status }}</p>
                                </td>
                                <td class="table-column">
                                    <a href="{{ route('service_orders.edit', $service_order->id_service_order) }}">
                                        <button class="icons">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                fill="#00C09E" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                                <td class="table-column">
                                    <a href="{{ route('service_orders.delete', $service_order->id_service_order) }}">
                                        <button class="icons">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#f00"
                                                class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @foreach ($service_orders as $service_order)
                <div class="row text-center" id="card-mobile">
                    <div class="col-lg-8">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span>Cliente: </span>
                                    <p>{{ optional($service_order->client)->name }}</p>
                                </li>
                                <li class="list-group-item"><span>Veículo: </span>
                                    <p>{{ optional($service_order->vehicle)->license_plate }}</p>
                                </li>
                                <li class="list-group-item"><span>Equipe: </span>
                                    <p>{{ optional($service_order->service_order)->name }}</p>
                                </li>
                                <li class="list-group-item"><span>Total: </span>
                                    <p>{{ optional($service_order)->total }}</p>
                                </li>
                                <li class="list-group-item"><span>Status: </span>
                                    <p>{{ optional($service_order)->status }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Editar e Excluir -->
                        <table class="table table-striped">
                            <tbody>
                                <tr id="editANDdelete">
                                    <td class="table-column">
                                        <a href="{{ route('service_orders.edit', $service_order->id_service_order) }}">
                                            <button class="icons">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="#00C09E" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                    <path
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                                </svg>
                                                <p style="color: #00C09E">Ver</p>
                                            </button>
                                        </a>
                                    </td>
                                    <td class="table-column">
                                        <a
                                            href="{{ route('service_orders.delete', $service_order->id_service_order) }}">
                                            <button class="icons">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="#f00" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg>
                                                <p style="color: #f00">Excluir</p>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection