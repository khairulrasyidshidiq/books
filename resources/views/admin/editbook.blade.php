@extends('admin.layout.admin')

@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Edit Book</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Form Book</h4>
            </div>
            <div class="card-body">
                <form action="/bookpatch/{{ $book['id'] }}" method="POST" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label font-text fw-bold">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Insert Title" value="{{ $book['title'] }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-text fw-bold">Writer</label>
                        <input type="text" class="form-control" name="writer" placeholder="Insert Writer Name" value="{{ $book['writer'] }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-text fw-bold">Publisher</label>
                        <input type="text" class="form-control" name="publisher" placeholder="Insert Publisher Name" value="{{ $book['publisher'] }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-text fw-bold">No ISBN</label>
                        <input type="text" class="form-control" name="no_isbn" placeholder="Insert No_ISBN" value="{{ $book['isbn'] }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-text fw-bold">Category Book</label>
                        <select class="form-select" name="category_id">
                            <option selected hidden>Select Category</option>
                            @foreach ($category as $item)
                                <option value="{{ $item['id'] }}">{{ $item['category_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-text fw-bold">Sinopsis</label><br>
                        <textarea name="sinopsis" id="text" cols="100" rows="5">{{ $book['sinopsis'] }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-text fw-bold">Cover</label>
                        <input type="file" class="form-control" name="cover">
                    </div>
                    <button type="submit" class="btn btn-warning rounded-pill px-4">Edit</button>
                    <a href="/databook" class="btn btn-danger rounded-pill px-4">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
