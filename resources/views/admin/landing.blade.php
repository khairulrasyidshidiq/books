@extends('admin.layout.admin')

@section('content')
<div class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="section-body">
        <h2 class="section-title">Hi, {{ auth()->user()->name }}</h2>
        <p class="section-lead">Selamat datang!</p>
    </div>
</div>
@endsection