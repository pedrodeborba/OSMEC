@extends('layouts.registers.mechanics')

@section('title', 'Mechanics')

@section('content')

<section id="MainSection">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <form method="post" action="/vehicles">
                    @csrf

                    Adicionar Veículos

                    <input id="input" type="text" name="name" placeholder="Nome" required>

                    <br>

                    <input id="input" type="text" name="color" placeholder="Cor" required>

                    <br>

                    <input id="input" type="text" name="license_plate" placeholder="Placa" required>

                    <br>

                    <input id="input" type="text" name="model" placeholder="Modelo" required>

                    <br>

                    <input id="input" type="text" name="mileage" placeholder="Quilometragem" required>

                    <br>

                    <label for="client_cpf">Cpf do Cliente</label>
                    <select id="client_cpf" name="client_cpf" required>
                        <option value="" disabled selected>Selecione o cpf do cliente</option>
                        @foreach($clients as $client)
                        <option value="{{ $client->cpf }}" {{ old('client_cpf')==$client->cpf ? 'selected' : '' }}>
                            {{ $client->cpf }}
                        </option>
                        @endforeach
                    </select>
                    <span id="client_cpf-error" class="error-message">{{ $errors->first('client_cpf') }}</span>


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