
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('asset/image/favicon.svg')}}" type="image/x-icon">
    <title>Feelectric | Coffee + Electric Bicycle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/cs/style.css">
    <script src="https://kit.fontawesome.com/18b04d2726.js" crossorigin="anonymous"></script>
    <script src="asset/js/index.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container mt-5 mb-5">
        <h3>Voucher</h3>
        <hr>
        @foreach ($vouchers as $voucher)
            <div class="card mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">{{ $voucher->description }}</h5>
                        <p class="card-text">Min. Pembelian: Rp{{ number_format($voucher->min_purchase, 0, ',', '.') }}</p>
                        <p class="card-text">Berlaku Hingga: {{ \Carbon\Carbon::parse($voucher->expiry_date)->format('d M Y') }}</p>
                    </div>
                    <button class="btn btn-success apply-voucher" data-code="{{ $voucher->code }}">Pakai</button>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.apply-voucher').forEach(button => {
                button.addEventListener('click', function() {
                    const code = this.getAttribute('data-code');

                    fetch("{{ route('vouchers.apply') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            code: code
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            alert(data.message);
                            window.location.href = "{{ route('v_cart.index') }}"; // Redirect to cart page
                        }
                    })
                    .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
</body>

</html>
