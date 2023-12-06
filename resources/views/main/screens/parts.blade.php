@extends('layouts.screens.parts')

@section('title', 'Parts')

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
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#fff"
                            class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                        </svg>
                        Adicionar
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                @if (session('secess'))
                <div class="alert alert-success">
                    {{ session('secess') }}
                </div>
                @endif

                <div class="table-box">
                    <table class="table table-striped">
                        <thead>
                            <th class="table-column">Nome</th>
                            <th class="table-column">Custo</th>
                            <th class="table-column">Quantidade</th>
                            <th class="table-column" id="delXXX">Descrição</th>
                            <th class="table-column" id="delXX">Fabricante</th>
                            <th class="table-column" id="delX">Ano de Fabricação</th>
                        </thead>
                        <tbody>
                            @foreach ($parts as $part)
                            <tr>
                                <td class="table-column">{{ $part->name }}</td>
                                <td>R$ {{ $part->cost }}</td>
                                <td class="table-column">{{ $part->quantity }}</td>
                                <td class="table-column" id="delXXX">{{ $part->description }}</td>
                                <td class="table-column" id="delXX">{{ $part->manufacturer }}</td>
                                <td class="table-column" id="delX">{{ $part->manufacture_year }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection