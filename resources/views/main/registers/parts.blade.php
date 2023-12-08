@extends('layouts.default.parts')

@section('title', 'Parts')

@section('content')

<section id="MainSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <form method="post" action="{{ route('parts.send') }}">
                    @csrf
                    <form method="POST" action="{{ route('parts.send') }}">
                        @csrf

                        <ul class="row" id="box">
                            <li class="col-lg-6" id="inputs">
                                <input id="input" type="text" name="name" placeholder="Peça" required>
                            </li>
                            <li class="col-lg-6" id="inputs">
                                <input id="input" type="text" name="description" placeholder="Modelo / Descrição">
                            </li>
                        </ul>

                        <ul class="row" id="box">
                            <li class="col-lg-6" id="inputs">
                                <input id="input" type="text" name="manufacturer" placeholder="Fabricante" required>
                            </li>
                            <li class="col-lg-6" id="inputs">
                                <input id="input" type="number" name="quantity" placeholder="Quantidade" required>
                            </li>
                        </ul>

                        <ul class="row" id="box">
                            <li class="col-lg-6" id="inputs">
                                <input id="input" type="number" name="cost" step="0.01" min="0.00" placeholder="Valor"
                                    required>
                            </li>
                            <li class="col-lg-6" id="inputs">
                                <input id="input" type="number" name="manufacture_year" placeholder="Ano fabricação"
                                    required>
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