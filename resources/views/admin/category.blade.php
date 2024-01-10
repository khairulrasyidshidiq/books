@extends('admin.layout.admin')

@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Category</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Form Create Category</h4>
            </div>
            <div class="card-body">
                <form action="/categorystore" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label font-text fw-bold">Category Name</label>
                        <input type="text" class="form-control" name="category_name" placeholder="Insert Category Name">
                    </div>
                    <button type="submit" class="btn btn-success rounded-pill px-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Category</h4>
            </div>
            <div class="card-body">
                <table id="data-admin" class="table table-striped table-bordered table-md" style="width: 100%; padding:2%;"
                    cellspacing="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($category as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['category_name'] }}</td>
                                <td>
                                    <form action="/categorydelete/{{ $item['id'] }}" method="POST">
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
