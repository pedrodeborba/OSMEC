@extends('layouts.default.parts')

@section('title', 'Peças')

@section('content')

<section id="MainSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <form method="POST" action="{{ route('parts.update', $part->id_part) }}">
                    @csrf
                    @method('PUT')
                    <ul class="row" id="box">
                            <li class="col-lg-6" id="inputs">
                                <input id="input" type="text" name="name" placeholder="Peça" value="{{ $part->name }}" required>
                            </li>
                            <li class="col-lg-6" id="inputs">
                                <input id="input" type="text" name="description" placeholder="Modelo / Descrição" value="{{ $part->description }}" >
                            </li>
                        </ul>

                        <ul class="row" id="box">
                            <li class="col-lg-6" id="inputs">
                                <input id="input" type="text" name="manufacturer" placeholder="Fabricante" value="{{ $part->manufacturer }}" required>
                            </li>
                            <li class="col-lg-6" id="inputs">
                                <input id="input" type="number" name="quantity" placeholder="Quantidade" value="{{ $part->quantity }}" required>
                            </li>
                        </ul>

                        <ul class="row" id="box">
                            <li class="col-lg-6" id="inputs">
                                <input id="input" type="number" name="cost" step="0.01" min="0.00" placeholder="Valor" value="{{ $part->cost }}" required>
                            </li>
                            <li class="col-lg-6" id="inputs">
                                <input id="input" type="number" name="manufacture_year" placeholder="Ano fabricação" value="{{ $part->manufacture_year }}"required>
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
                                <a href="{{ route('parts.index') }}"><button type="button"
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