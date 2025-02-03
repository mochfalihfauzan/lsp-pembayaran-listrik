@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-white">
                <h1>Selamat Datang, {{ Auth::user()->role }}!</h1>
            </div>
            <div class="row gap-1">
                <div class="card bg-secondary text-white mt-5 mx-auto py-4 col-10 col-md-3">
                    <h3 class="text-center">Daftar Pelanggan</h3>
                    <h2 class="text-center">{{ $pelanggan->count() }}</h2>
                    <div class="mt-3 mx-auto">
                        <a href="{{ route('pelanggan') }}" class="text-center">
                            <div class="btn btn-warning">Lihat Daftar Pelanggan</div>
                        </a>
                    </div>
                </div>

                <div class="card bg-secondary text-white mt-5 mx-auto py-4 col-10 col-md-3">
                    <h3 class="text-center">User Management</h3>
                    <h2 class="text-center">{{ $users->count() }}</h2>

                    <div class="mt-3 mx-auto">
                        <a href="{{ route('users-management') }}" class="text-center">
                            <div class="btn btn-warning">Lihat User Management</div>
                        </a>
                    </div>
                </div>

                <div class="card bg-secondary text-white mt-5 mx-auto py-4 col-10 col-md-3">
                    <h3 class="text-center">Penggunaan Listrik</h3>
                    <h2 class="text-center">{{ $tagihan->count() }}</h2>
                    <div class="mt-3 mx-auto">
                        <a href="{{ route('penggunaan-listrik-admin') }}" class="text-center">
                            <div class="btn btn-warning">Lihat Penggunaan Listrik</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
