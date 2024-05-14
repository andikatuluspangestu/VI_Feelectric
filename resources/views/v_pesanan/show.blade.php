<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/18b04d2726.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Detail Pesanan
            </div>
            <div class="card-body">
                <h5 class="card-title">Pesanan #{{ $pesanan->id }}</h5>
                <p class="card-text"><strong>Status:</strong> {{ $pesanan->status }}</p>
                <p class="card-text"><strong>Detail:</strong> {{ $pesanan->detail }}</p>
                <p class="card-text"><strong>Total Harga:</strong> Rp{{ number_format($pesanan->total, 2, ',', '.') }}</p>
                <p class="card-text"><strong>Tanggal Pesanan:</strong> {{ $pesanan->created_at->toFormattedDateString() }}</p>
                
                <a href="{{ route('v_pesanan.index') }}" class="btn btn-primary">Kembali ke Daftar Pesanan</a>
            </div>
        </div>
    </div>
</body>
</html>
