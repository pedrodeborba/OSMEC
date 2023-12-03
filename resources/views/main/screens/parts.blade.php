@extends('layouts.screens.parts')

@section('title', 'Parts')

@section('content')

<section id="MainSection">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <a href="/parts/add">
                    <button type="button" class="btn btn-primary btn-lg">Adicionar Peças</button>
                </a>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</section>

@endsection