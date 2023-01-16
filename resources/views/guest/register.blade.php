@extends('layout.layout')

@section('content')
    <div class="container grid bg-white py-4 mt-4">
        <div class="d-flex justify-content-center align-items-center">
            <img src="{{ asset('/assets/img/guest.jpg') }}" alt="" width="400" height="400">
        </div>
        <div class="formarea">
            <div class="text-center">
                <h2 class="fw-bold font-text">Register</h2>
            </div>
            <form action="/registerstore" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label font-text fw-bold">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Insert Name">
                </div>
                <div class="mb-3">
                    <label class="form-label font-text fw-bold">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Insert Username">
                </div>
                <div class="d-flex justify-content-between">
                    <div class="mb-3">
                        <label class="form-label font-text fw-bold">Address</label>
                        <input type="text" class="form-control" name="address" style="width: 250px" placeholder="Insert Address">
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-text fw-bold">Handphone Number</label>
                        <input type="text" class="form-control" name="no_hp" style="width: 290px" placeholder="Insert Handphone Number">
                    </div>
                </div>
                <div class="mb-3">
                  <label class="form-label font-text fw-bold">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Insert Email">
                </div>
                <div class="mb-3">
                  <label class="form-label font-text fw-bold">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Insert Password">
                </div>
                <button type="submit" class="btn btn-success rounded-pill px-4">Submit</button>
              </form>
        </div>
    </div>
@endsection