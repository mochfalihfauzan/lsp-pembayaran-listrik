@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-white">
                <h1>Halo, {{ Auth::user()->name }}!</h1>
                <div class="row">
                    @if ($pelanggan == false)
                        <div class="card bg-secondary text-white mt-5 mx-auto py-4 px-3 col-10 col-md-5">
                            <h3 class="text-center">Anda belum terdaftar sebagai pelanggan</h3>
                            <div class="mt-3 mx-auto">
                                <a href="/register-user" class="text-center">
                                    <div class="btn btn-warning">Daftar Pelanggan</div>
                                </a>
                            </div>
                        </div>
                    @endif
                    <div class="card bg-secondary text-white mt-5 mx-auto py-4 px-3 col-10 col-md-5">
                        @if ($tagihan)
                            <h3 class="text-center">Tagihan Anda Saat ini</h3>
                            <div class="mt-3 mx-auto">
                                <h4 class="mb-3 text-center">Rp. {{ $tagihan->amount }}</h4>
                                <div class="d-flex flex-column justify-content-center align-items-center gap-3">

                                    <form action="{{ route('checkout') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="name" value="{{ $pelanggan->nama_pelanggan }}">
                                        <input type="hidden" name="email" value="{{ $pelanggan->email }}">
                                        <input type="hidden" name="id_tagihan" value="{{ $tagihan->id }}">
                                        <input type="hidden" name="id_pelanggan" value="{{ $pelanggan->id }}">
                                        <input type="hidden" name="bulan_bayar" value="{{ $tagihan->bulan }}">
                                        <input type="hidden" name="tahun_bayar" value="{{ $tagihan->tahun }}">
                                        <input type="hidden" name="biaya_admin" value="{{ $biaya_admin }}" }}>
                                        <input type="hidden" name="total_bayar"
                                            value="{{ $tagihan->amount + $biaya_admin }}">
                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                        <button type="submit" class="btn btn btn-primary py-3 px-4 shadow fw-bold">Bayar
                                            Tagihan</button>
                                    </form>
                                    <a href="{{ route('tagihan-listrik') }}" class="text-center">
                                        <div class="btn btn-warning">Lihat Tagihan</div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <h3 class="text-center">Tagihan Anda Sudah Lunas ✅</h3>
                            <div class="mt-3 mx-auto">
                                <a href="{{ route('tagihan-listrik') }}" class="text-center">
                                    <div class="btn btn-warning">Lihat Tagihan</div>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
