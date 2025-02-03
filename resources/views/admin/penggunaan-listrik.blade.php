@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-white">
                <h1>Penggunaan Listrik</h1>
                <div class="table-responsive">
                    <table class="table table-bordered text-white" style="min-width: 1000px;">
                        <thead>
                            <tr class="text-center">
                                <th class="col-1">Id Pelanggan</th>
                                <th class="col-1">Nama Pelanggan</th>
                                <th class="col-1">Nomor Kwh</th>
                                <th class="col-1">Bulan</th>
                                <th class="col-1">Tahun</th>
                                <th class="col-1">Meter Awal</th>
                                <th class="col-1">Meter Akhir</th>
                                <th class="col-2">Tagihan</th>
                                <th class="col-1">Status</th>
                                <th class="col-1">Update Pembayaran</th>
                                <th class="col-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggan as $item)
                                @if ($item->penggunaan->isEmpty())
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nama_pelanggan }}</td>
                                        <td>{{ $item->nomor_kwh }}</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>
                                            <a href="{{ route('penggunaan-listrik-create', $item->id) }}"
                                                class="btn btn-primary float-left">Tambah</a>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($item->penggunaan as $data)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->nama_pelanggan }}</td>
                                            <td>{{ $item->nomor_kwh }}</td>
                                            <td>{{ $data->bulan }}</td>
                                            <td>{{ $data->tahun }}</td>
                                            <td>{{ $data->meter_awal }}</td>
                                            <td>{{ $data->meter_akhir }}</td>
                                            <td>Rp. {{ $data->tagihan->amount }}</td>
                                            <td>
                                                <p class="badge bg-secondary fw-bold">
                                                    {{ $data->tagihan->status === 1 ? 'Lunas' : 'Belum Dibayar' }}</p>
                                            </td>
                                            <td>
                                                <form action="{{ route('penggunaan-listrik-paid') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $data->tagihan->id }}">
                                                    <button
                                                        onclick="return confirm('Apakah yakin ingin update pembayaran?')"
                                                        type="submit" class="btn btn-success float-left"
                                                        {{ $data->tagihan->status === 1 ? 'disabled' : '' }}>Update</button>
                                                </form>
                                            </td>
                                            <td class="d-flex gap-2">
                                                <a href="{{ route('penggunaan-listrik-edit', $data->id) }}"
                                                    class="btn btn-warning float-left">Edit</a>
                                                <a href="{{ route('penggunaan-listrik-create', $item->id) }}"
                                                    class="btn btn-primary float-left">Add</a>
                                                <form action="{{ route('penggunaan-listrik-destroy', $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Apakah yakin ingin hapus data ini?')"
                                                        type="submit" class="btn btn-danger float-left">
                                                        Del
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <a href="{{ route('admin.penggunaan-listrik.create') }}" class="btn btn-success">Add Penggunaan Listrik</a> --}}
            </div>
        </div>
    </div>
@endsection
