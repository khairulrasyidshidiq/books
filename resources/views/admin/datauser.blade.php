@extends('admin.layout.admin')

@section('content')
    <div class="section">
        <div class="section-header">
            <h1>User</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Data User</h4>
                    <a href="/users_export" class="btn btn-success">Export User</a>
                </div>
                <div class="card-body">
                    <table id="data-admin" class="table table-striped table-bordered table-md" style="width: 100%; padding:2%;"
                        cellspacing="">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Handphone Number</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($user as $item)
                                <tr>
                                    @if ($item['roles'] == 'User')
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['address'] }}</td>
                                        <td>{{ $item['no_hp'] }}</td>
                                        <td>{{ $item['email'] }}</td>
                                        <td>
                                            <form action="/userdelete/{{ $item['id'] }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-danger rounded-pill px-4">Delete</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
