@extends('layouts.default.vehicles')

@section('title', 'Veículos')

@section('content')

<section id="MainSection">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <form action="{{ route('vehicles.update', $vehicle->id_vehicle) }}" method="POST" class="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="text" name="name" placeholder="Nome" required pattern="^[a-zA-Z0-9\s]+$"
                        title="Apenas letras, números e espaços são permitidos" value="{{ $vehicle->name }}">
                    <span id="name-error" class="error-message">{{ $errors->first('name') }}</span>

                    <input type="text" name="color" placeholder="Cor" required pattern="^[a-zA-Z0-9\s]+$"
                        title="Apenas letras, números e espaços são permitidos" value="{{ $vehicle->color }}">
                    <span id="color-error" class="error-message">{{ $errors->first('color') }}</span>

                    <input type="text" name="license_plate" placeholder="Placa: A1B-2C3D" required
                        value="{{ $vehicle->license_plate }}">
                    <span id="license_plate-error" class="error-message">{{ $errors->first('license_plate') }}</span>

                    <input type="text" name="model" placeholder="Modelo" required pattern="^[a-zA-Z0-9\s]+$"
                        title="Apenas letras, números e espaços são permitidos" value="{{ $vehicle->model }}">
                    <span id="model-error" class="error-message">{{ $errors->first('model') }}</span>

                    <input type="number" name="mileage" step="0.01" min="0.00" placeholder="Km" required
                        pattern="^[a-zA-Z0-9\s]+$" title="Apenas números, virgulas e pontos são permitidos"
                        value="{{ $vehicle->mileage }}">
                    <span id="mileage-error" class="error-message">{{ $errors->first('mileage')
                        }}</span>

                    <select name="client_cpf" required>
                        <option value="" disabled selected>CPF do cliente</option>
                        @foreach($clients as $client)
                        <option value="{{ $client->cpf }}" {{ $client->cpf == $vehicle->client->cpf ? 'selected' : ''
                            }}>
                            {{ $client->cpf }}
                        </option>
                        @endforeach
                    </select>

                    <span id="client_cpf-error" class="error-message">{{ $errors->first('client_cpf') }}</span>

                    <button type="submit">Atualizar</button>
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