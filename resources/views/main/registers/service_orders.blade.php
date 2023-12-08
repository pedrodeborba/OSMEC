@extends('layouts.default.service_orders')

@section('title', 'Ordens de Serviço')

@section('content')

<section id="MainSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">

                <form action="{{ route ('service_orders.send') }}" method="POST" class="form"
                    enctype="multipart/form-data">
                    @csrf

                    <ul class="row" id="box">
                        <li class="col-lg-6" id="inputs">
                            <label for="client_id_client_fk">Cliente</label>
                            <select name="client_id_client_fk" class="form-control" required>
                                @foreach($clients as $clientId => $clientName)
                                <option value="{{ $clientId }}" {{ old('client_id_client_fk')==$clientId ? 'selected'
                                    : '' }}>{{
                                    $clientName }}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="col-lg-6" id="inputs">
                            <label for="vehicle_id_vehicle_fk">Veículo</label>
                            <select name="vehicle_id_vehicle_fk" class="form-control" required>
                                @foreach($vehicles as $vehicleId => $licensePlate)
                                <option value="{{ $vehicleId }}" {{ old('vehicle_id_vehicle_fk')==$vehicleId
                                    ? 'selected' : '' }}>{{ $licensePlate }}</option>
                                @endforeach
                            </select>
                        </li>
                    </ul>

                    <ul class="row" id="box">
                        <li class="col-lg-6" id="inputs">
                            <label for="mechanic_team_id_mechanic_team">Equipe</label>
                            <select name="mechanic_team_id_mechanic_team" class="form-control" required>
                                @foreach($teams as $teamId => $teamName)
                                <option value="{{ $teamId }}" {{ old('mechanic_team_id_mechanic_team')==$teamId
                                    ? 'selected' : '' }}>{{ $teamName }}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="col-lg-6" id="inputs">
                            <label for="part">Peça</label>
                            <select name="part[]" class="form-control" required>
                                @foreach($parts as $partId => $partName)
                                <option value="{{ $partId }}" {{ in_array($partId, old('part', [])) ? 'selected' : ''
                                    }}>{{
                                    $partName }}</option>
                                @endforeach
                            </select>

                        </li>
                    </ul>

                    <ul class="row" id="box">
                        <li class="col-lg" id="inputs">
                            <input id="input" type="text" name="defect" placeholder="Defeito" required
                                value="{{ old('defect') }}">
                        </li>
                    </ul>

                    <ul class="row" id="box">
                        <li class="col-lg" id="inputs">
                            <input id="input" type="text" name="solution" placeholder="Solução" required
                                value="{{ old('solution') }}">
                        </li>
                    </ul>

                    <ul class="row" id="box">
                        <li class="col-lg" id="inputs">
                            <input id="input" type="number" name="work_price" placeholder="Mão de Obra (R$)" required
                                value="{{ old('work_price') }}">
                        </li>
                    </ul>

                    <ul class="row" id="box">
                        <li>
                            <label for="entry_date">Data de emissão</label>
                        </li>
                        <li class="col-lg" id="inputs">
                            <input id="input" type="date" name="entry_date" placeholder="DD/MM/AAAA" required
                                value="{{ old('entry_date') }}">
                        </li>
                    </ul>

                    <ul class="row" id="box">
                        <li>
                        <label for="exit_date">Data de conclusão</label>
                        </li>
                        <li class="col-lg" id="inputs">
                            <input id="input" type="date" name="exit_date" placeholder="Data de conclusão: DD/MM/AAAA" required
                                value="{{ old('exit_date') }}">
                        </li>
                    </ul>

                    <ul class="row" id="box">
                        <li class="col-lg" id="inputs">
                            <div class="form-check form-switch form-check-reverse">
                                <br>
                                <label for="status">Status: </label>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckReverse"
                                    name="status" value="0">
                                <label class="form-check-label" for="flexSwitchCheckReverse">Fechado</label>
                            </div>
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
                            <a href="{{ route('parts.index') }}"><button type="button"
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