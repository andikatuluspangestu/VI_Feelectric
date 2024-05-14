<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Voucher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/18b04d2726.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Detail Voucher
            </div>
            <div class="card-body">
                <h5 class="card-title">Voucher Code: {{ $voucher->code }}</h5>
                <p class="card-text"><strong>Description:</strong> {{ $voucher->description }}</p>
                <p class="card-text"><strong>Discount Percentage:</strong> {{ $voucher->discount_percentage }}%</p>
                <p class="card-text"><strong>Valid From:</strong> {{ optional($voucher->valid_from)->format('d M Y') }}</p>
                <p class="card-text"><strong>Valid Until:</strong> {{ optional($voucher->valid_until)->format('d M Y') }}</p>
                
                <a href="{{ route('v_voucher.index') }}" class="btn btn-primary">Back to All Vouchers</a>
            </div>
        </div>
    </div>
</body>
</html>
