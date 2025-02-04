@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-white">
                <h1>Checkout</h1>
                <div class="row">
                    <div class="card bg-secondary text-white mt-5 mx-auto py-5 px-3 col-10 col-md-5">

                        <h3 class="text-center">Detail Pembayaran</h3>
                        <div class="mt-3 mx-auto">
                            <div class="mb-3">
                                <table>
                                    <tr>
                                        <td>Nama Pelanggan</td>
                                        <td class="px-3">:</td>
                                        <td>{{ $pembayaran->pelanggan->nama_pelanggan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td class="px-3">:</td>
                                        <td>{{ $pembayaran->pelanggan->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bulan Bayar</td>
                                        <td class="px-3">:</td>
                                        <td>{{ $bulan[$pembayaran->bulan_bayar] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tahun Bayar</td>
                                        <td class="px-3">:</td>
                                        <td>{{ $pembayaran->tahun_bayar }}</td>
                                    </tr>
                                    <tr>
                                        <td>Biaya Admin</td>
                                        <td class="px-3">:</td>
                                        <td><strong> Rp. {{ $pembayaran->biaya_admin }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Total Bayar</td>
                                        <td class="px-3">:</td>
                                        <td><strong> Rp. {{ $pembayaran->total_bayar }}</strong></td>
                                    </tr>
                                </table>
                                @if ($pembayaran->tagihan->status == 1)
                                    <div class="alert alert-success mt-3" role="alert">
                                        Pembayaran sudah dilakukan
                                    </div>
                                @else
                                    <button class="btn btn-primary py-3 px-4 shadow fw-bold mt-3" id="pay-button">Bayar
                                        Tagihan</button>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
            // Also, use the embedId that you defined in the div above, here.
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                    window.location.href = '/dashboard-user';
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            });
        });
    </script>
@endsection
