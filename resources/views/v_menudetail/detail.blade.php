<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFF7E8;">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="{{ asset('asset/image/loginlogo.png') }}" alt="" style="width: 160px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto fw-semibold gap-4">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Pesan Antar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Kursus Barista</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Booking Meja</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <a style="color: #3B2621;" href="#"><i class="fas fa-shopping-cart profile-icon me-2"></i></a>
                <a style="color: #3B2621;" href="#"><i class="fas fa-user-circle profile-icon"></i></a>
                <span class="profile-name ms-2">{{ $user->name }}</span>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('asset/image/beans.png')}}" alt="{{ $product->name }}" class="img-fluid" style="width: 500px;">
            <div class="d-flex mt-3">
                <!-- Thumbnail images here -->
            </div>
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p class="text-muted">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
            <p>{{ $product->detailed_description }}</p>
            <p><strong>Temperature</strong></p>
            <select class="form-select mb-3" name="temperature">
                <option selected>Pilih Temperature</option>
                <option value="hot">Hot</option>
                <option value="cold">Cold</option>
            </select>
            <p><strong>Ukuran</strong></p>
            <select class="form-select mb-3" name="size">
                <option selected>Pilih Ukuran</option>
                <option value="kecil">Kecil</option>
                <option value="sedang">Sedang</option>
                <option value="besar">Besar</option>
            </select>
          
            <p><strong>Catatan</strong></p>
            <textarea class="form-control mb-3" rows="3" placeholder="Tambahkan catatan"></textarea>
            <p><strong>{{ $product->stock }} in stock</strong></p>
            <div class="d-flex mb-3">
                <input type="number" class="form-control w-auto me-2" value="1">
                <button class="btn btn-dark" onclick="addToCart({{ $product->id }})">Tambah Ke Keranjang</button>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="text">
        <div class="card-body">
            <h5 class="card-title">Deskripsi</h5>
            <p class="card-text">{{ $product->description }}</p>
        </div>
    </div>
</div>

<div class="container mt-4 mb-4">
    <h2 class="mb-3">Produk Terkait</h2>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($relatedProducts as $relatedProduct)
        <div class="col">
            <div class="card">
                <img src="{{ asset($relatedProduct->image) }}" class="card-img-top" alt="{{ $relatedProduct->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                    <p class="card-text">Rp{{ number_format($relatedProduct->price, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- footer -->
<footer class="footer text-white p-3" style="background-color: #001804;">
    <div class="container">
        <div class="row" style="padding-left: 90px;">
            <div class="col-md-4 px-5">
                <div class="footer-logo">
                    <img src="{{ asset('asset/image/Logofooter.png') }}" alt="feelectric Logo" class="img-fluid">
                    <p>A combination of Indonesia's authentic coffee with electric bicycle.</p>
                </div>
            </div>
            <div class="col-md-4 px-5">
                <h3>Office</h3>
                <p>Jl. BSD Green Office Park, BSD<br>Kecamatan Tangerang, Banten<br>15345 Indonesia</p>
            </div>
            <div class="col-md-4 px-10">
                <h3>Contact Us</h3>
                <p><i class="fab fa-whatsapp"></i> +6281388881111<br><i class="fab fa-instagram"></i> info@feelectric.com<br><i class="fa-regular fa-envelope"></i> feelectric@gmail.com</p>
            </div>
        </div>
    </div>
    <hr class="my-4">
    <p class="text-center">©2024 feelectric. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
<script>
    function addToCart(productId) {
        const quantity = document.querySelector('input[type="number"]').value;
        const notes = document.querySelector('textarea').value;
        const temperature = document.querySelector('select[name="temperature"]').value;
        const size = document.querySelector('select[name="size"]').value;


        fetch(`/cart/add/${productId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                quantity: quantity,
                notes: notes,
                size: size,
                temperature: temperature
            })
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => {
                    throw new Error(err.error || 'Network response was not ok');
                });
            }
            return response.json();
        })
        .then(data => {
            alert(data.message);
            window.location.href = '/cart';
        })
        .catch(error => {
            alert('An error occurred: ' + error.message);
        });
    }
</script>

</body>
</html>
