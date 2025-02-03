@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-white">
                <h1>Tambah Penggunaan Listrik Pengguna</h1>
                <form action="{{ route('penggunaan-listrik-store', $pelanggan->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="id_pelanggan">Id Pelanggan</label>
                        <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan"
                            value="{{ $pelanggan->id }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_pelanggan">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan"
                            value="{{ $pelanggan->nama_pelanggan }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="bulan">Bulan (format angka)</label>
                        <input type="number" class="form-control" id="bulan" name="bulan" placeholder="01"
                            maxlength="2" min="1" max="12" oninput="limitDigits(this, 2)" required>
                        <small>contoh. Januari : 01</small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tahun">Tahun</label>
                        <input type="number" class="form-control" id="tahun" name="tahun" placeholder="2024"
                            oninput="limitDigits(this, 4)" required>
                    </div>
                    <div class="form-group
                            mb-3">
                        <label for="meter_awal">Meter Awal</label>
                        <input type="number" class="form-control" id="meter_awal" name="meter_awal"
                            value="{{ $awalMeter }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="meter_akhir">Meter Akhir</label>
                        <input type="number" class="form-control" id="meter_akhir" name="meter_akhir" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function limitDigits(input, maxDigits) {
            if (input.value.length > maxDigits) {
                input.value = input.value.slice(0, maxDigits);
            }
        }
    </script>
@endsection
