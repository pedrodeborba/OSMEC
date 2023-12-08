@extends('layouts.registers.teams')

@section('title', 'Equipes')

@section('content')

<section id="MainSection">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">

                <form action="{{ route('teams.send') }}" method="post" class="form" enctype="multipart/form-data">
                    @csrf

                    <label for="name">Nome</label>
                    <input type="text" name="name" placeholder="name da Equipe" required value="{{ old('name') }}">

                    <br>

                    <label for="function">Função</label>
                    <input type="text" name="function" placeholder="Função da Equipe" required
                        value="{{ old('function') }}">

                    <br>

                    <label for="mechanics">Mecânicos</label>
                    <input type="text" name="mechanics" placeholder="EX: Pedro, João..." required
                        value="{{ old('mechanics') }}">

                    <br>

                    <label for="mechanic_person_id_person">Lider</label>
                    <select name="mechanic_person_id_person" style="width: 90%" required>
                        @foreach($persons as $person)
                        <option value="{{ $person->name }}" {{ old('mechanic_person_id_person')==$person->name ?
                            'selected' : '' }}>{{ $person->name }}</option>
                        @endforeach
                    </select>

                    <br>

                    <button type="submit">Adicionar</button>
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