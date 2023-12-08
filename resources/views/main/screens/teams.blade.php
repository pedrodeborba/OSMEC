@extends('layouts.default.teams')

@section('title', 'Equipes')

@section('content')

<section id="MainSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 text-center p-3">
                <div class="title-top">
                    Equipes
                </div>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4 text-center p-3">
                <a href="{{ route('teams.create') }}">
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
                            <th class="table-column">Nome</th>
                            <th class="table-column">Função</th>
                            <th class="table-column">Mecânicos</th>
                            <th class="table-column">Lider</th>
                            <th class="table-column">Editar</th>
                            <th class="table-column">Concluir</th>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                            <tr>
                                <td class="table-column">
                                    <p>{{ $team->name }}</p>
                                </td>
                                <td class="table-column">
                                    <p>{{ $team->function }}</p>
                                </td>
                                <td class="table-column">
                                    <p>{{ $team->mechanics }}</p>
                                </td>
                                <td class="table-column">
                                    <p>{{ $team->mechanic ? $team->mechanic->person->name : 'Nenhum mecânico associado'}}</p>
                                </td>
                                <td class="table-column">
                                    <a href="">
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
                                    <a href="{{ route('teams.delete', $team->id_mechanic_team) }}">
                                        <button class="icons">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                fill="#FFD700" class="bi bi-check-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                <path
                                                    d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @foreach ($teams as $team)
                <div class="row text-center" id="card-mobile">
                    <div class="col-lg-8">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span>Nome: </span>
                                    <p>{{ $team->name }}</p>
                                </li>
                                <li class="list-group-item"><span>Função: </span>
                                    <p>{{ $team->function }}</p>
                                </li>
                                <li class="list-group-item"><span>Mecânicos: </span>
                                    <p>{{ $team->mechanics }}</p>
                                </li>
                                <li class="list-group-item"><span>Lider: </span>
                                    <p>{{ $team->mechanic ? $team->mechanic->person->name : 'Nenhum mecânico associado'}}</p>
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
                                        <a href="">
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
                                        <a href="{{ route('teams.delete', $team->id_mechanic_team) }}">
                                            <button class="icons">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="#FFD700" class="bi bi-check-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                                                </svg>
                                                <p style="color: #FFD700">Concluir</p>
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