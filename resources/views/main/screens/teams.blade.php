@extends('layouts.screens.teams')

@section('title', 'Teams')

@section('content')

<section id="MainSection">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <a href="/teams/add">
                    <button type="button" class="btn btn-primary btn-lg">Adicionar Equipes</button>
                </a>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</section>

@endsection