@extends('layout.layout')

@section('content')
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white font-head"><img src="{{ asset('/assets/img/buku.png') }}" alt=""
                    width="65">E-book</a>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white font-head" href="/user">Home</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link active text-white font-head" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/book" class="dropdown-item text-center">All Book</a>
                                    <form action="" class="d-flex row">
                                        @foreach ($category as $item)
                                            <button type="submit" name="filter" id="search" class="border border-0 bg-transparent"
                                                value="{{ $item['id'] }}">{{ $item['category_name'] }}</button>
                                        @endforeach
                                    </form>
                                </li>
                            </ul>
                        </div>
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
                            <div class="d-flex justify-content-center">
                                <a href="/readbook/{{ $item['id'] }}" class="btn btn-primary">Read</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
