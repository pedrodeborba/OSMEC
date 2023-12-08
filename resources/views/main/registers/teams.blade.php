@extends('layouts.default.teams')

@section('title', 'Equipes')

@section('content')

<section id="MainSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">

                <form action="{{ route('teams.send') }}" method="post" class="form" enctype="multipart/form-data">
                    @csrf
                    <ul class="row" id="box">
                        <li class="col-lg" id="inputs">
                            <input id="input" type="text" name="name" placeholder="Nome da Equipe" required
                                value="{{ old('name') }}">
                        </li>
                    </ul>

                    <ul class="row" id="box">
                        <li class="col-lg" id="inputs">
                            <input id="input" type="text" name="function" placeholder="Função da Equipe" required
                                value="{{ old('function') }}">
                        </li>
                    </ul>

                    <ul class="row" id="box">
                        <li>
                            <label for="mechanics">Integrantes</label>
                        </li>
                        <li class="col-lg" id="inputs">
                            <input id="input" type="text" name="mechanics" placeholder="EX: Pedro, João..." required
                                value="{{ old('mechanics') }}">
                        </li>
                    </ul>

                    <ul class="row" id="box">
                        <li class="col-lg" id="inputs">
                            <label for="mechanic_person_id_person">Lider</label>
                            <select name="mechanic_person_id_person" class="form-control" required>
                                @foreach($persons as $person)
                                <option value="{{ $person->name }}" {{ old('mechanic_person_id_person')==$person->name ?
                                    'selected' : '' }}>{{ $person->name }}</option>
                                @endforeach
                            </select>
                        </li>
                    </ul>

                    <ul class="row" id="box">
                        <li class="col-lg-6 text-center" id="inputs">
                            @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first() }}
                            </div>
                            @endif
                        </li>
                        <li class="col-lg-6 text-end" id="inputs">
                            <button type="submit" class="btn btn-lg text-white"
                                style="background: #00C09E">Adicionar</button>
                            <a href="{{ route('teams.index') }}"><button type="button"
                                    class="btn btn-danger btn-lg text-white">Voltar</button></a>
                        </li>
                    </ul>


                </form>

                @if($errors->any())
                <div style="color: red;">
                    {{ $errors->first() }}
                </div>
                @endif
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</section>

@endsection