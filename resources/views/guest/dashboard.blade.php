@extends('layout.layout')

@section('content')
    <nav class="navbar navbar-expand-lg">
        <div class="container">
           <a class="navbar-brand text-white font-head"><img src="{{ asset('/assets/img/buku.png') }}" alt="" width="65">E-book</a>
           <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
             <ul class="navbar-nav">
               <li class="nav-item">
                 <a class="nav-link active text-white font-head" aria-current="page" href="/">Home</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link active text-white btn btn-primary rounded-pill px-3 font-head" href="/login">Login</a>
               </li>
             </ul>
           </div>
     </div>
 </nav>
    <div class="container grid">
        <div class="d-flex align-items-center">
            <div class="text-area">
                <h2 class="text-white font-head">Better Solutions For Your <br> Choice Book</h2>
                <p class="text-secondary font-text fw-bold fs-5">We can access book for online and free!</p>
                <a href="/register" class="btn btn-primary rounded-pill text-white font-head px-4">Register</a>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <img src="{{ asset('/assets/img/e-bookimg.png') }}" alt="" width="500">
        </div>
    </div>
@endsection