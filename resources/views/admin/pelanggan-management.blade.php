@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-white">
                <h1>Daftar Pelanggan</h1>
                <div class="table-responsive">
                    <table class="table table-bordered text-white" style="min-width: 1000px;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Nomor Kwh</th>
                                <th>Alamat</th>
                                <th>Daya</th>
                                <th>Tarif Per Kwh</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->nama_pelanggan }}</td>
                                    <td>{{ $user->nomor_kwh }}</td>
                                    <td>{{ $user->alamat }}</td>
                                    <td>{{ $user->tarif->daya }}</td>
                                    <td>{{ $user->tarif->tarif_per_kwh }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('pelanggan-edit', $user->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('pelanggan-destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Apakah yakin ingin menghapus User ini?')"
                                                    type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <a href="{{ route('admin.users.create') }}" class="btn btn-success">Add User</a> --}}
            </div>
        </div>
    </div>
@endsection
