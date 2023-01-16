@extends('layout.layout')

@section('content')
    <div class="container grid bg-white py-5 mt-5">
        <div class="d-flex justify-content-center align-items-center">
            <img src="{{ asset('/assets/img/guest.jpg') }}" alt="" width="400" height="400">
        </div>
        <div class="container mt-5">
            <div class="text-center">
                <h2 class="fw-bold font-text">Login</h2>
            </div>
            <form action="/loginstore" method="POST">
                @csrf
                <div class="mb-3">
                  <label class="form-label font-text fw-bold">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Insert Email">
                </div>
                <div class="mb-3">
                  <label class="form-label font-text fw-bold">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Insert Password">
                </div>
                <div class="d-flex justify-content-between">
                  <button type="submit" class="btn btn-success rounded-pill px-4">Submit</button>
                  <a href="/" class="d-flex align-items-center">Kembali</a>
                </div>
              </form>
        </div>
    </div>
@endsection