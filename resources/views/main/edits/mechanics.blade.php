@extends('layouts.registers.mechanics')

@section('title', 'Mecânicos')

@section('content')

<section id="MainSection">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <form method="POST" action="{{ route('mechanics.update', $mechanic->person_id_person) }}">
                    @csrf
                    @method('PUT')

                    Editar Mecânico

                    <input id="input" type="text" name="name" placeholder="Nome" value="{{ $mechanic->person->name }}">

                    <br>

                    <input id="input" type="email" name="email" placeholder="Email" value="{{ $mechanic->person->email }}">

                    <br>

                    <input id="input" type="text" name="cpf" placeholder="CPF" value="{{ $mechanic->person->cpf }}">

                    <br>

                    <input id="input" type="text" name="rg" placeholder="RG" value="{{ $mechanic->person->rg }}">

                    <br>

                    <input id="input" type="number" name="phone" placeholder="Telefone" value="{{ $mechanic->person->phone }}">

                    <br>

                    <input id="input" type="text" name="specialty" placeholder="Especialidade" value="{{ $mechanic->specialty }}">

                    <button id="send" type="submit">Atualizar</button>

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