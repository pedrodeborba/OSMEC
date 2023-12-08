@extends('layouts.default.parts')

@section('title', 'Peças')

@section('content')

<section id="MainSection">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <form method="POST" action="{{ route('parts.update', $part->id_part) }}">
                    @csrf
                    @method('PUT')

                    Editar Peça

                    <input id="input" type="text" name="name" placeholder="Nome" value="{{ $part->name }}" required>

                    <br>

                    <input id="input" type="text" name="quantity" placeholder="Quantidade" value="{{ $part->quantity }}" required>

                    <br>

                    <input id="input" type="number" name="cost" step="0.01" min="0.00" placeholder="Custo" value="{{ $part->cost }}" required>

                    <br>

                    <input id="input" type="text" name="manufacturer" placeholder="Fabricante" value="{{ $part->manufacturer }}" required>

                    <br>

                    <input id="input" type="number" name="manufacture_year" placeholder="Ano de Fabricação" value="{{ $part->manufacture_year }}" required>

                    <br>

                    <input id="input" type="text" name="description" placeholder="Descrição" value="{{ $part->description }}" required>

                    <br>

                    <button id="send" type="submit">Atualizar</button>

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