@extends('layouts.registers.clients')

@section('title', 'Clientes')

@section('content')

<section id="MainSection">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <form method="post" action="{{ route('clients.send') }}">
                    @csrf

                    Adicionar Cliente

                    <input id="input" type="text" name="name" placeholder="Nome" required>

                    <br>

                    <input id="input" type="email" name="email" placeholder="Email" required>

                    <br>

                    <input id="input" type="text" name="cpf" placeholder="CPF" required>

                    <br>

                    <input id="input" type="text" name="rg" placeholder="RG" required>

                    <br>

                    <input id="input" type="text" name="address" placeholder="Endereço" required>

                    <br>

                    <input id="input" type="text" name="phone" placeholder="Telefone" required>

                    <button id="send" type="submit">Adicionar</button>

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