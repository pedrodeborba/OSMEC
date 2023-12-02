@extends('layouts.login')

@section('title', 'Login')

@section('content')

<div class="container d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{asset('img/osmec.png')}}" alt="Logo">
        </div>
        <div class="col-lg-6" id="inputs">
            <input id="input" type="email" placeholder="Email">
            <input id="input" type="password" placeholder="Senha">
            <a href="/dashboard">
                <button id="send">Entrar</button>
            </a>
        </div>
    </div>
</div>

@endsection