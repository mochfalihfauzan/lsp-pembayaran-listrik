@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 col-md-7 col-lg-5 mx-auto ">
                <div class="border border-secondary py-4 px-3 rounded-3 my-5 text-white shadow-lg">
                    <h2 class="text-white text-center">Update User</h2>
                    <form action="{{ route('users-management-update', $user->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="John Doe"
                                value='{{ old('name', $user->name) }}'>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="john@gmail.com" value='{{ old('email', $user->email) }}'>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" aria-label="Default select example" name="role">
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin
                                </option>
                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User
                                </option>
                            </select>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
