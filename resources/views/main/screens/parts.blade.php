@extends('layouts.default.parts')

@section('title', 'Peças')

@section('content')

<section id="MainSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 text-center p-3">
                <div class="title-top">
                    Peças
                </div>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4 text-center p-3">
                <a href="{{ route('parts.create') }}">
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
                            <th class="table-column">Peça</th>
                            <th class="table-column">Quantidade</th>
                            <th class="table-column">Valor</th>
                            <th class="table-column">Fabricante</th>
                            <th class="table-column" >Ano de fabricação</th>
                            <th class="table-column">Descrição</th>
                            <th class="table-column" >Editar</th>
                            <th class="table-column">Excluir</th>
                        </thead>
                        <tbody>
                            @foreach ($parts as $part)
                            <tr>
                                <td class="table-column"><p>{{ $part->name }}</p></td>
                                <td class="table-column"><p>{{ $part->quantity }}</p></td>
                                <td class="table-column"><p>R$ {{ $part->cost }}</p></td>
                                <td class="table-column"><p>{{ $part->manufacturer }}</p></td>
                                <td class="table-column"><p>{{ $part->manufacture_year }}</p></td>
                                <td class="table-column"><p>{{ $part->description }}</p></td>
                                <td class="table-column">
                                    <a href="{{ route('parts.edit', $part->id_part) }}">
                                        <button class="icons">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                fill="#00C09E" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                                <td class="table-column">
                                    <a href="{{ route('parts.delete', $part->id_part) }}">
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

                @foreach ($parts as $part)
                <div class="row text-center" id="card-mobile">
                    <div class="col-lg-8">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span>Peça: </span>
                                    <p>{{ $part->name }}</p>
                                </li>
                                <li class="list-group-item"><span>Quantidade: </span>
                                    <p>{{ $part->quantity }}</p>
                                </li>
                                <li class="list-group-item"><span>Valor: </span>
                                    <p>R$ {{ $part->cost }}</p>
                                </li>
                                <li class="list-group-item"><span>Fabricante: </span>
                                    <p>{{ $part->manufacturer }}</p>
                                </li>
                                <li class="list-group-item"><span>Ano de fabricação: </span>
                                    <p>{{ $part->manufacture_year }}</p>
                                </li>
                                <li class="list-group-item"><span>Descrição: </span>
                                    <p>{{ $part->description }}</p>
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
                                        <a href="{{ route('parts.edit', $part->id_part) }}">
                                            <button class="icons">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="#00C09E" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg>
                                                <p style="color: #00C09E">Editar</p>
                                            </button>
                                        </a>
                                    </td>
                                    <td class="table-column">
                                        <a href="{{ route('parts.delete', $part->id_part) }}">
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