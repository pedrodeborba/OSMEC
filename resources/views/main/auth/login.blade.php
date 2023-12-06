@extends('layouts.auth.login')

@section('title', 'Login')

@section('content')

<div class="container d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{asset('img/osmec.png')}}" alt="Logo">
        </div>
        <div class="col-lg-6" id="inputs">
            <form method="post" action="{{ route('login.send') }}">
                @csrf

                <input id="input" type="email" name="email" placeholder="Email" required>

                <br>

                <input id="input" type="password" name="password" placeholder="Senha" required>

                <br>

                <button id="send" type="submit">Login</button>
            </form>
            @if($errors->any())
            <div style="color: red;">
                {{ $errors->first() }}
            </div>
            @endif
        </div>

    </div>
</div>

@endsection