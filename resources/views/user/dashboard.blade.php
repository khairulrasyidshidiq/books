@extends('layout.layout')

@section('content')
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white font-head"><img src="{{ asset('/assets/img/buku.png') }}" alt=""
                    width="65">E-book</a>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white font-head" href="/book">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white btn btn-primary rounded-pill px-3 font-head"
                            href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h3 class="font-head text-white mb-3 d-flex justify-content-center ">Top 3 Books</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4 flex-row">
            @foreach ($book as $item)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h3>{{ $item['title'] }}</h3>
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('assets/cover/' . $item['cover']) }}" alt="" width="200px">
                            </div>
                            <p class="text-center mt-2">Writer : {{ $item['writer'] }}</p>
                            <p class="text-center mt-2">Category : {{ $item->category->category_name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
