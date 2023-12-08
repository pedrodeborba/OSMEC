@extends('layouts.default.clients')

@section('title', 'Clientes')

@section('content')

<section id="MainSection">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <form method="POST" action="{{ route('clients.update', $client->id_client) }}">
                    @csrf
                    @method('PUT')

                    Editar Cliente

                    <input id="input" type="text" name="name" placeholder="Nome" value="{{ $client->name }}" required>

                    <br>

                    <input id="input" type="email" name="email" placeholder="Email" value="{{ $client->email }}" required>

                    <br>

                    <input id="input" type="text" name="cpf" placeholder="CPF" value="{{ $client->cpf }}" required>

                    <br>

                    <input id="input" type="text" name="rg" placeholder="RG" value="{{ $client->rg }}" required>

                    <br>

                    <input id="input" type="text" name="address" placeholder="Endereço" value="{{ $client->address }}" required>

                    <br>

                    <input id="input" type="text" name="phone" placeholder="Telefone" value="{{ $client->phone }}" required>

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