<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Feelectric | Coffee + Electric Bicycle</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="asset/image/favicon.svg" type="image/x-icon">
    <script src="https://kit.fontawesome.com/18b04d2726.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFF7E8;">
        <div class="container">
          <a class="navbar-brand" href="index.html">
            <img src="asset/image/loginlogo.png" alt="" style="width: 160px;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto fw-normal gap-4">
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
            <a href="{{ route('user.profile', ['id' => $user->id]) }}" class="d-flex align-items-center profile-link">
                <i class="fas fa-user-circle profile-icon"></i>
                <span class="profile-name ms-2">{{ $user->name }}</span>
            </a>


          </div>
        </div>
    </nav>

  <div class="container mt-4">
        <h1>Menu List</h1>
        <div class="row">
    @foreach ($menus as $menu)
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="card h-100">
        <img src="{{ asset('storage/' . substr($menu->photo_hot, 7)) }}" class="card-img-top" alt="Product Image">
            <div class="card-body">
                <h5 class="card-title">{{ $menu->name }}</h5>
                <p class="card-text">{{ $menu->description }}</p>
                <ul class="list-unstyled">
                    <li>Harga Panas: Rp{{ number_format($menu->price_hot, 2) }}</li>
                    <li>Harga Dingin: Rp{{ number_format($menu->price_ice, 2) }}</li>
                    <li>Kategori: {{ $menu->category }}</li>
                </ul>
            </div>
            <div class="card-footer">
                <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                <button class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $menu->id }}').submit();">Delete</button>
                <form id="delete-form-{{ $menu->id }}" action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
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
                    <img src="asset/image/Logofooter.png" alt="feelectric Logo" class="img-fluid">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    </body>
    </html>
    
