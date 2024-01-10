@extends('layout.layout')

@section('content')
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white font-head"><img src="{{ asset('/assets/img/buku.png') }}" alt=""
                    width="65">E-book</a>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white btn btn-primary rounded-pill px-3 font-head"
                            href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        <div class="container gridbook mt-4">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('/assets/cover/' . $book['cover']) }}" alt="" width="300px">
            </div>
            <div class="textarea">
                <p class="text-white font-text">Title : {{ $book['title'] }}</p>
                <p class="text-white font-text">Writer : {{ $book['writer'] }}</p>
                <p class="text-white font-text">Publisher : {{ $book['publisher'] }}</p>
                <p class="text-white font-text">No ISBN : {{ $book['isbn'] }}</p>
                <h3 class="text-white font-text">Sinopsis : </h3>
                <p class="text-white font-text">{{ $book['sinopsis'] }}</p>
                <div class="d-flex">
                    <a href="/pdfbook/{{ $book['id'] }}" class="btn btn-warning me-2">Download Book</a>
                    <a href="/book" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
        <script>
            @if (Session::has('status'))
                toastr.options = {
                    "closeButton": true,
                }
                toastr.warning("{{ session('status') }}");
            @endif
        </script>
@endsection
