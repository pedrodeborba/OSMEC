@extends('layouts.default.service_orders')

@section('title', 'Ordens de Serviço')

@section('content')

<section id="MainSection">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">

                <form action="{{ route('service_orders.update', $service_order->id_service_order) }}" method="POST" class="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label for="client_id_client_fk">Cliente</label>
                    <select name="client_id_client_fk" class="form-control" required>
                        @foreach($clients as $clientId => $clientName)
                        <option value="{{ $clientId }}" {{ old('client_id_client_fk')==$clientId ? 'selected' : '' }}>{{
                            $clientName }}</option>
                        @endforeach
                    </select>

                    <br>

                    <label for="vehicle_id_vehicle_fk">Veículo</label>
                    <select name="vehicle_id_vehicle_fk" class="form-control" required>
                        @foreach($vehicles as $vehicleId => $licensePlate)
                        <option value="{{ $vehicleId }}" {{ old('vehicle_id_vehicle_fk')==$vehicleId ? 'selected' : ''
                            }}>{{ $licensePlate }}</option>
                        @endforeach
                    </select>

                    <br>

                    <label for="mechanic_team_id_mechanic_team">Equipe</label>
                    <select name="mechanic_team_id_mechanic_team" class="form-control" required>
                        @foreach($teams as $teamId => $teamName)
                        <option value="{{ $teamId }}" {{ old('mechanic_team_id_mechanic_team')==$teamId ? 'selected'
                            : '' }}>{{ $teamName }}</option>
                        @endforeach
                    </select>

                    <br>

                    <label for="defect">Defeito</label>
                    <input type="text" name="defect" placeholder="Defeito" required value="{{ $service_order->defect }}">

                    <br>

                    <label for="solution">Solução</label>
                    <input type="text" name="solution" placeholder="Solução" required value="{{ $service_order->solution }}">

                    <br>

                    <label for="part">Peças</label>
                    <select name="part[]" class="form-control" multiple required>
                        @foreach($parts as $partId => $partName)
                        <option value="{{ $partId }}" {{ in_array($partId, old('part', [])) ? 'selected' : '' }}>{{
                            $partName }}</option>
                        @endforeach
                    </select>

                    <br>

                    <label for="work_price">Mão de Obra</label>
                    <input type="number" name="work_price" placeholder="Mão de Obra" required
                        value="{{ $service_order->work_price }}">

                    <br>

                    <label for="entry_date">Data de emissão</label>
                    <input type="date" name="entry_date" placeholder="DD/MM/AAAA" required
                        value="{{ \Carbon\Carbon::parse($service_order->entry_date)->format('Y-m-d') }}">

                    <br>

                    <label for="exit_date">Data de emissão</label>
                    <input type="date" name="exit_date" placeholder="DD/MM/AAAA" required
                        value="{{ \Carbon\Carbon::parse($service_order->exit_date)->format('Y-m-d') }}">

                    <br>

                    <label for="status">Status</label>
                    <div class="form-check form-switch form-check-reverse">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckReverse" name="status" value="0">
                        <label class="form-check-label" for="flexSwitchCheckReverse">Fechado</label>
                    </div>

                    <br>

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