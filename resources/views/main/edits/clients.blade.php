@extends('layouts.default.clients')

@section('title', 'Clientes')

@section('content')

<section id="MainSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <form method="POST" action="{{ route('clients.update', $client->id_client) }}">
                    @csrf
                    @method('PUT')

                    <ul class="row" id="box">
                        <li class="col-lg-6" id="inputs">
                            <input id="input" class="form-control" type="text" name="name" placeholder="Nome" value="{{ $client->name }}" required>
                        </li>
                        <li class="col-lg-6" id="inputs">
                            <input id="input" class="form-control" type="email" name="email" placeholder="Email" value="{{ $client->email }}" required>
                        </li>
                    </ul>

                    <ul class="row" id="box">
                        <li class="col-lg-6" id="inputs">
                            <input id="input" class="form-control" type="text" name="cpf" placeholder="CPF" value="{{ $client->cpf }}" required>
                        </li>
                        <li class="col-lg-6" id="inputs">
                            <input id="input" class="form-control" type="text" name="rg" placeholder="RG" value="{{ $client->rg }}" required>
                        </li>
                    </ul>

                    <ul class="row" id="box">
                        <li class="col-lg-6" id="inputs">
                            <input id="input" class="form-control" type="text" name="phone" placeholder="Telefone" value="{{ $client->address }}" required>
                        </li>
                        <li class="col-lg-6" id="inputs">
                            <input id="input" class="form-control" type="text" name="cellphone" placeholder="Celular" value="{{ $client->phone }}" equired>
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
                                style="background: #00C09E">Atualizar</button>
                            <a href="{{ route('clients.index') }}"><button type="button"
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