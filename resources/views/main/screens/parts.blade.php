@extends('layouts.screens.parts')

@section('title', 'Parts')

@section('content')

<section id="partSection">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <a button id="send" href="/parts/add">Adicionar Peça</button></a>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</section>

@endsection