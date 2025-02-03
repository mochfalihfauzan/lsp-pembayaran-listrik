@extends('layouts.main')
@section('content')
    <div class="container">
        <h2 class="mt-3 text-white">Tagihan Listrik</h2>
        <table class="table table-dark table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Bulan</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Total Meter</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tagihanPelanggan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $namaBulan[$item->bulan] }}</td>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->jumlah_meter }}</td>
                        <td>Rp. {{ number_format($item->amount, 2, ',', '.') }}</td>
                        <td>
                            <p class="badge {{ $item->status == 0 ? 'bg-warning text-dark' : 'bg-success' }} ">
                                {{ $item->status == 0 ? 'Belum Lunas' : 'Sudah Lunas' }}
                            </p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
