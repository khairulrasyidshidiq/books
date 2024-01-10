@extends('admin.layout.admin')

@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Book</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Form Create Book</h4>
                </div>
                <div class="card-body">
                    <form action="/bookstore" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label font-text fw-bold">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Insert Title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-text fw-bold">Writer</label>
                            <input type="text" class="form-control" name="writer" placeholder="Insert Writer Name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-text fw-bold">Publisher</label>
                            <input type="text" class="form-control" name="publisher" placeholder="Insert Publisher Name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-text fw-bold">No ISBN</label>
                            <input type="text" class="form-control" name="no_isbn" placeholder="Insert No_ISBN">
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
                            <textarea name="sinopsis" id="text" cols="100" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-text fw-bold">Cover</label>
                            <input type="file" class="form-control" name="cover">
                        </div>
                        <button type="submit" class="btn btn-success rounded-pill px-4">Submit</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Data Book</h4>
                    <a href="/books_export" class="btn btn-success">Export Book</a>
                </div>
                <div class="card-body">
                    <table id="data-admin" class="table table-striped table-bordered table-md"
                        style="width: 100%; padding:2%;" cellspacing="1">
                        <thead>
                            <tr>
                                <th>Book ID</th>
                                <th>Category ID</th>
                                <th>Title</th>
                                <th>Writer</th>
                                <th>Publisher</th>
                                <th>ISBN</th>
                                <th>Sinopsis</th>
                                <th>Cover Book</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($book as $item)
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td>{{ $item['category_id'] }}</td>
                                    <td>{{ $item['title'] }}</td>
                                    <td>{{ $item['writer'] }}</td>
                                    <td>{{ $item['publisher'] }}</td>
                                    <td>{{ $item['isbn'] }}</td>
                                    <td class="text-truncate" style="max-width: 100px">{{ $item['sinopsis'] }}</td>
                                    <td>{{ $item['cover'] }}</td>
                                    <td>
                                        <a href="/editbook/{{ $item['id'] }}" class="btn btn-warning rounded-pill px-4 mb-2">Edit</a>
                                        <form action="/bookdelete/{{ $item['id'] }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger rounded-pill px-4">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
