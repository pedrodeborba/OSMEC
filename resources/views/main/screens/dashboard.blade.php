@extends('layouts.default.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="box">
        <h2>Dashboard</h2>
        {{ $totalSales }}
        {{ $totalExpenses }}
        {{ $totalEarnings }}
    </div>
@endsection
