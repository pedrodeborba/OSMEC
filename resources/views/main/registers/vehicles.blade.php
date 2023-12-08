@extends('layouts.default.vehicles')

@section('title', 'Veículos')

@section('content')

<section id="MainSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <form method="POST" action="{{ route('vehicles.send') }}">
                    @csrf

                    <ul class="row" id="box">
                        <li class="col-lg-6" id="inputs">
                            <input id="input" type="text" name="name" placeholder="Nome" required pattern="^[a-zA-Z0-9\s]+$"
                                title="Apenas letras, números e espaços são permitidos" value="{{ old('name') }}">
                            <span id="name-error" class="error-message">{{ $errors->first('name') }}</span>
                        </li>
                        <li class="col-lg-6" id="inputs">
                            <input id="input" type="text" name="color" placeholder="Cor" required pattern="^[a-zA-Z0-9\s]+$"
                                title="Apenas letras, números e espaços são permitidos" value="{{ old('color') }}">
                            <span id="color-error" class="error-message">{{ $errors->first('color') }}</span>
                        </li>
                    </ul>

                    <ul class="row" id="box">
                        <li class="col-lg-6" id="inputs">
                            <input id="input" type="text" name="license_plate" placeholder="Placa: A1B-2C3D" required
                                value="{{ old('license_plate') }}">
                        </li>
                        <li class="col-lg-6" id="inputs">
                            <input id="input" type="text" name="model" placeholder="Modelo" required pattern="^[a-zA-Z0-9\s]+$"
                                title="Apenas letras, números e espaços são permitidos" value="{{ old('model') }}">
                            <span id="model-error" class="error-message">{{ $errors->first('model') }}</span>
                        </li>
                    </ul>

                    <ul class="row" id="box">
                        <li class="col-lg-6" id="inputs">
                            <input id="input" type="number" name="mileage" step="0.01" min="0.00" placeholder="Km" required
                                pattern="^[a-zA-Z0-9\s]+$" title="Apenas números, virgulas e pontos são permitidos"
                                value="{{ old('mileage') }}">
                            <span id="mileage-error" class="error-message">{{ $errors->first('mileage')
                                }}</span>
                        </li>
                        <li class="col-lg-6" id="inputs">
                            <select id="input" name="client_cpf" required>
                                <option value="" disabled selected>CPF do cliente</option>
                                @foreach($clients as $client)
                                <option value="{{ $client->cpf }}" {{ old('client_cpf')==$client->cpf ? 'selected' : ''
                                    }}>{{ $client->cpf }}</option>
                                @endforeach
                            </select>
                            <span id="client_cpf-error" class="error-message">{{ $errors->first('client_cpf') }}</span>
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
                            <a href="{{ route('vehicles.index') }}"><button type="button"
                                    class="btn btn-danger btn-lg text-white">Voltar</button></a>
                        </li>
                    </ul>
                </form>

            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</section>

@endsection