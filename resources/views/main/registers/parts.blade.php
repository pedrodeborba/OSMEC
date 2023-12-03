@extends('layouts.registers.parts')

@section('title', 'Parts')

@section('content')

<section id="MainSection">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <form method="post" action="/parts">
                    @csrf

                    Adicionar Peça

                    <input id="input" type="text" name="name" placeholder="Nome" required>

                    <br>

                    <input id="input" type="text" name="type" placeholder="Tipo" required>

                    <br>

                    <input id="input" type="text" name="manufacturer" placeholder="Fabricante" required>

                    <br>

                    <input id="input" type="number" name="quantity" placeholder="Quantidade" required>

                    <br>

                    <input id="input" type="number" name="cost" placeholder="Custo" required>

                    <br>

                    <input id="input" type="number" name="manufacture_year" placeholder="Ano fabricação" required>

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