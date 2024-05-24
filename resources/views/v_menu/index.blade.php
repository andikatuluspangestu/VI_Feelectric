<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #FFF7E8;
        }
        .nav-pills .nav-link {
            margin-right: 5px;
            border-radius: 0;
            background-color: #f8f9fa;
            border: 1px solid #3B2621;
        }
        .nav-pills .nav-link.active {
            color: #fff;
            background-color: #343a40;
        }
        .input-group-text {
            border: 1px solid #3B2621;
            background-color: #f8f9fa;
            border-right: none;
        }
        .form-control {
            border-left: none;
            border-color: #3B2621;
        }
        .product-card img {
            height: 200px;
            object-fit: cover;
        }
        .price-button {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .price-button p, .price-button a {
            flex: 1;
            min-width: 100px;
        }
        .btn-dark {
            padding: 0.375rem 0.75rem;
            white-space: nowrap;
        }
        .card-title, .card-text {
            color: #3B2621;
        }
    </style>
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
                    <a class="nav-link active" aria-current="page" href="{{route('v_menu.index')}}">Menu</a>
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
                <a href="{{ route('user.profile', ['id' => $user->id]) }}" class="d-flex align-items-center profile-link">
                <i class="fas fa-user-circle profile-icon"></i>
                <a href="{{ route('user.profile', ['id' => $user->id]) }}" class="d-flex align-items-center profile-link">
                <i class="fas fa-user-circle profile-icon"></i>
                <span class="profile-name ms-2">{{ $user->name }}</span>
            </a>
            </a>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <div class="input-group w-auto">
            <span class="input-group-text" style="background-color: white;"><a href="#"><i class="fas fa-search" style="color: #3B2621;" ></i></a></span>
            <input type="text" class="form-control" placeholder="Mau minum apa hari ini..." aria-label="Search">
        </div>
        <ul class="nav nav-pills gap-3">
            <li class="nav-item">
                <a class="nav-link active rounded-pill" style="background-color: #3B2621;" href="#">Semua</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill border-2" style="background-color: #FFF7E8; color: #3B2621;" href="#">Ordinary Coffee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  rounded-pill border-2" style="background-color: #FFF7E8; color: #3B2621;" href="#">Manual Brew</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  rounded-pill border-2" style="background-color: #FFF7E8; color: #3B2621;" href="#">Latte Non Coffee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  rounded-pill border-2" style="background-color: #FFF7E8; color: #3B2621;" href="#">Feel The Signature</a>
            </li>
        </ul>
    </div>
</div>

<div class="container mt-5">
    <h2 class="mb-4">Ordinary Coffee</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        @foreach ($menus as $menu)
        <div class="col">
            <div class="card product-card" style="color: #3B2621;">
                <img src="{{ asset($menu->photo_hot)}}" class="card-img-top" alt="{{ $menu->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $menu->name }}</h5>
                    <p class="card-text">{{ $menu->description }}</p>
                    <div class="price-button">
                        @if($menu->variant == 'both')
                            <p class="card-price fw-bold mb-0">Hot: Rp{{ number_format($menu->price_hot, 0, ',', '.') }}</p>
                            <p class="card-price fw-bold mb-0">Ice: Rp{{ number_format($menu->price_ice, 0, ',', '.') }}</p>
                        @elseif($menu->variant == 'hot')
                            <p class="card-price fw-bold mb-0">Rp{{ number_format($menu->price_hot, 0, ',', '.') }}</p>
                        @elseif($menu->variant == 'ice')
                            <p class="card-price fw-bold mb-0">Rp{{ number_format($menu->price_ice, 0, ',', '.') }}</p>
                        @endif
                        <a href="{{ route ('v_menudetail.detail')}}" class="btn text-light" style="background-color: #3B2621;">Pesan</a>
                    </div>
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
</body>
</html>
