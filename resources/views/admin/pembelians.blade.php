<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembelian</title>
    <!-- Include CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
</head>
<body>

@include('template.navbar')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Pembelian</h4>
                        <p class="card-description">List of all purchase entries.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-right mb-3">
                                    <!-- Form for filtering or searching can be added here -->
                                    <form action="" method="GET" class="form-inline">
                                        <!-- Example filter input -->
                                        <!-- <input type="text" class="form-control" placeholder="Search..."> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Pembeli</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telepon</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>Nama Parfum</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pembelians as $pembelian)
                                    <tr>
                                        <td>{{ $pembelian->id }}</td>
                                        <td>{{ $pembelian->nama_pembeli }}</td>
                                        <td>{{ $pembelian->alamat }}</td>
                                        <td>{{ $pembelian->nomor_telepon }}</td>
                                        <td>{{ $pembelian->jumlah }}</td>
                                        <td>Rp {{ number_format($pembelian->total_harga, 0, ',', '.') }}</td>

                                        <td>{{ $pembelian->parfum ? $pembelian->parfum->nama_parfum : 'N/A' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('template.footer')

<!-- Include JS -->
<script src="{{ asset('backend/js/scripts.js') }}"></script>
</body>
</html>
