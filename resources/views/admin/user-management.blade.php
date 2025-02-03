@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-white">
                <h1>User Management</h1>
                <div class="table-responsive">
                    <table class="table table-bordered text-white" style="min-width: 1000px;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="col-1">{{ $user->id }}</td>
                                    <td class="col-3">{{ $user->name }}</td>
                                    <td class="col-3">{{ $user->email }}</td>
                                    <td class="col-3">{{ $user->role }}</td>
                                    <td class="col-2">
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('users-management-edit', $user->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('users-management-destroy', $user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Apakah yakin ingin menghapus User ini?')"
                                                    type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
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
