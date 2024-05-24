<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
    <style>
        .img-thumbnail {
            width: 94px; /* Adjust based on your preference */
            height: auto; /* Maintain aspect ratio */
        }
    </style>
</head>
<body style="background-color: #FFF7E8;">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFF7E8;">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('image/loginlogo.png') }}" alt="" style="width: 160px;">
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
                    <!-- Shopping cart icon -->
                    <a style="color: #3B2621;" href="#"><i class="fas fa-shopping-cart profile-icon me-2"></i></a>
                    <!-- Profile icon and name -->
                    <a style="color: #3B2621;" href="#"><i class="fas fa-user-circle profile-icon"></i></a>
                    <span class="profile-name ms-2">{{ $user->name }}</span>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset($menu->photo_hot) }}" alt="{{ $menu->name }}" class="img-fluid" style="width: 500px;">
                <div class="d-flex mt-3">
                    <!-- Small images, assumed to be thumbnails for the main product image -->
                    <img src="{{ asset($menu->photo_hot) }}" alt="Thumbnail" class="img-thumbnail me-2">
                    <img src="{{ asset($menu->photo_hot) }}" alt="Thumbnail" class="img-thumbnail me-2">
                    <img src="{{ asset($menu->photo_hot) }}" alt="Thumbnail" class="img-thumbnail me-2">
                    <img src="{{ asset($menu->photo_hot) }}" alt="Thumbnail" class="img-thumbnail me-2">
                    <img src="{{ asset($menu->photo_hot) }}" alt="Thumbnail" class="img-thumbnail">
                </div>
            </div>
            <div class="col-md-6">
                <h2>{{ $menu->name }}</h2>
                @if($menu->variant == 'both')
                    <p class="text-muted">Hot: Rp{{ number_format($menu->price_hot, 0, ',', '.') }} - Ice: Rp{{ number_format($menu->price_ice, 0, ',', '.') }}</p>
                @elseif($menu->variant == 'hot')
                    <p class="text-muted">Rp{{ number_format($menu->price_hot, 0, ',', '.') }}</p>
                @elseif($menu->variant == 'ice')
                    <p class="text-muted">Rp{{ number_format($menu->price_ice, 0, ',', '.') }}</p>
                @endif
                <p>{{ $menu->description }}</p>
                <p><strong>Ukuran</strong></p>
                <select class="form-select mb-3">
                    <option selected>Pilih ukuran</option>
                    <option value="1">Small</option>
                    <option value="2">Medium</option>
                    <option value="3">Large</option>
                </select>
                <p><strong>Catatan</strong></p>
                <textarea class="form-control mb-3" rows="3" placeholder="Masukkan catatan Anda"></textarea>
                <p><strong>{{ $menu->stock }} in stock</strong></p>
                <div class="d-flex mb-3">
                    <input type="number" class="form-control w-auto me-2" value="1">
                    <button class="btn btn-dark">Tambah Ke Keranjang</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="text">
            <div class="card-body">
                <h5 class="card-title">Deskripsi</h5>
                <p class="card-text">{{ $menu->description }}</p>
                
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                </ul>
    
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum!</p>
            </div>
        </div>
    </div>

    <div class="container mt-4 mb-4">
        <h2 class="mb-3">Produk Terkait</h2>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <!-- First product card -->
            <div class="col">
                <div class="card">
                    <img src="{{ asset('image/bean1.png') }}" class="card-img-top" alt="Espresso Single">
                    <div class="card-body">
                        <h5 class="card-title">Espresso Single</h5>
                        <p class="card-text">Rp 35.000 - Rp 40.000</p>
                    </div>
                </div>
            </div>
            <!-- Second product card -->
            <div class="col">
                <div class="card">
                    <img src="{{ asset('image/bean1.png') }}" class="card-img-top" alt="Espresso Single">
                    <div class="card-body">
                        <h5 class="card-title">Espresso Single</h5>
                        <p class="card-text">Rp 35.000 - Rp 40.000</p>
                    </div>
                </div>
            </div>
            <!-- Third product card -->
            <div class="col">
                <div class="card">
                    <img src="{{ asset('image/bean1.png') }}" class="card-img-top" alt="Espresso Single">
                    <div class="card-body">
                        <h5 class="card-title">Espresso Single</h5>
                        <p class="card-text">Rp 35.000 - Rp 40.000</p>
                    </div>
                </div>
            </div>
            <!-- Fourth product card -->
            <div class="col">
                <div class="card">
                    <img src="{{ asset('image/bean1.png') }}" class="card-img-top" alt="Espresso Single">
                    <div class="card-body">
                        <h5 class="card-title">Espresso Single</h5>
                        <p class="card-text">Rp 35.000 - Rp 40.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- footer -->
    <footer class="footer text-white p-3" style="background-color: #001804;">
        <div class="container">
            <div class="row" style="padding-left: 90px;">
                <div class="col-md-4 px-5">
                    <div class="footer-logo">
                        <img src="{{ asset('image/Logofooter.png') }}" alt="feelectric Logo" class="img-fluid">
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
