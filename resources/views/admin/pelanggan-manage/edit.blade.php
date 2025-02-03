@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 col-md-7 col-lg-5 mx-auto ">
                <div class="border border-secondary py-4 px-3 rounded-3 my-5 text-white shadow-lg">
                    <h2 class="text-white text-center">Daftar Profile Pelanggan </h2>
                    <form action="{{ route('pelanggan-update', $pelanggan->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="user123"
                                value="{{ old('username', $pelanggan->username) }}">
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan"
                                placeholder="John Doe" value="{{ $pelanggan->nama_pelanggan }}" hidden>
                        </div>

                        <div class="mb-3">
                            <label for="nomor_kwh" class="form-label">Nomor Kwh</label>
                            <input type="text" class="form-control" id="nomor_kwh" name="nomor_kwh" placeholder="12345"
                                value="{{ old('nomor_kwh', $pelanggan->nomor_kwh) }}">
                            @error('nomor_kwh')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="id_tarif" class="form-label">Daya Listrik</label>
                            <select class="form-select" aria-label="Default select example" name="id_tarif">
                                @foreach ($tarifs as $tarif)
                                    <option value={{ $tarif->id }}
                                        {{ $tarif->id == $pelanggan->id_tarif ? 'selected' : '' }}>
                                        {{ $tarif->daya }} VA</option>
                                @endforeach

                            </select>
                            @error('id_tarif')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="JL. Melati No. 123" value="{{ old('alamat', $pelanggan->alamat) }}">
                            @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                placeholder="john@gmail.com" value="{{ $pelanggan->email }}" hidden>
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
