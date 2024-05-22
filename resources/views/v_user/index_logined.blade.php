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
              <a class="nav-link active" aria-current="page" href="{{ route('user.menu') }}">Menu</a>
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
  </nav>

 <!-- banner -->
 <div class="d-flex img-fluid" style="background-image: url(asset/image/banner.jpeg);">
        <div class="banner_text mx-5 p-5 text-light">
          <h3>Premium</h3>
          <h1 class="fw-bold col-7">FEELECTRIC COFFEE SHOP</h1>
          <h3>Limited Time</h3>
          <p class="col-8">More Than Just Coffe, Enjoy Feelectric's signature coffe and discover your coffee flavor adventure here</p>
          <h4 class="fw-bold col-5">SHOP YOUR COFFEE ONLINE!</h4>
          <button type="button" class="btn btn-warning rounded-pill">Order Now!</button>
        </div>
        <div class="m-3">
          <img src="asset/image/Gelas.png" alt="foto gelas" style="width: 500px; padding-right: 30px;">
        </div>
      </div>

  <!-- card kopi & mesin kopi -->
  <div class="container my-5">
        <h1>Coffe Beans</h1>
        <!-- First row of product cards -->
        <div class="row row-cols-1 row-cols-md-4 g-4" id="productContainer1"></div>
        <!-- Pagination for the first row -->
        <nav>
            <ul class="pagination" id="pagination1"></ul>
        </nav>

        <h1>Coffe Machine</h1>
        <!-- Second row of product cards -->
        <div class="row row-cols-1 row-cols-md-4 g-4" id="productContainer2"></div>
        <!-- Pagination for the second row -->
        <nav>
            <ul class="pagination" id="pagination2"></ul>
        </nav>
    </div>

<!-- banner -->
    <div class="d-flex align-items-center bg-image"
    style="background-image: url(asset/image/Banner2.png); height: 500px; background-size: cover;">
    <div class="banner_text2 text-left text-light m-4 p-5">
        <h1 class="col-7">Get a chance to have an Amazing morning</h1>
      <p class="fs-5 col-6">see how making coffe makes your day happy</p>
    </div>
  </div>
<!-- ulasan -->
<div class="container my-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
      <h1>Ulasan</h1>
      <!-- Carousel controls -->
      <div>
          <a class="btn btn-secondary rounded-circle" href="#testimonialCarousel" role="button" data-bs-slide="prev" style="background-color: #001804;">
              <i class="fas fa-chevron-left text-light"></i>
          </a>
          <a class="btn btn-secondary rounded-circle" href="#testimonialCarousel" role="button" data-bs-slide="next" style="background-color: #001804;">
              <i class="fas fa-chevron-right text-light"></i>
          </a>
      </div>
  </div>
    <!-- Carousel -->
    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
          <!-- First set of testimonials -->
          <div class="carousel-item active">
              <div class="ulasan-box-container">
                  <!-- First four boxes -->
                  <!-- Repeat this structure for each box in the first set -->
                  <div class="ulasan-box">
                      <div class="profile">
                          <div class="profile-img p-2">
                              <img src="asset/image/Ulasan1.png" alt="User Name">
                          </div>
                          <div>
                              <strong>Sarah Putri</strong>
                              <div class="reviews">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="far fa-star"></i> <!-- Half-filled star -->
                              </div>
                          </div>
                      </div>
                      <p class="lh-1">Kopi di Feelectric selalu mencerahkan hariku dengan rasa yang kaya, lezat, dan aroma yang memikat.</p>
                  </div>
                  <div class="ulasan-box">
                      <div class="profile">
                          <div class="profile-img p-2">
                              <img src="asset/image/Ulasan2.png" alt="User Name">
                          </div>
                          <div>
                              <strong>Adi Wijaya</strong>
                              <div class="reviews">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                   <!-- Half-filled star -->
                              </div>
                          </div>
                      </div>
                      <p class="lh-1">Kualitas kopi di Feelectric tidak pernah mengecewakan, selalu memberikan kesegaran dan kepuasan pada setiap cangkirnya.</p>
                  </div>
                  <div class="ulasan-box">
                      <div class="profile">
                          <div class="profile-img p-2">
                              <img src="asset/image/Ulasan3.png" alt="User Name">
                          </div>
                          <div>
                              <strong>Maya Sari</strong>
                              <div class="reviews">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i> <!-- Half-filled star -->
                              </div>
                          </div>
                      </div>
                      <p class="lh-1">Feelectric adalah tempat favorit saya untuk minum kopi karena beragam pilihan kopi mereka dan suasana yang nyaman.</p>
                  </div>
                  <div class="ulasan-box">
                      <div class="profile">
                          <div class="profile-img p-2">
                              <img src="asset/image/Ulasan4.png" alt="User Name">
                          </div>
                          <div>
                              <strong>Ahmad Ridwan</strong>
                              <div class="reviews">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="far fa-star"></i> <!-- Half-filled star -->
                              </div>
                          </div>
                      </div>
                      <p class="lh-1">Saya selalu kembali ke Feelectric untuk kopi mereka yang selalu membuat pengalaman membeli kopi menjadi menyenangkan.</p>
                  </div>
                  <!-- Additional boxes for the first set here -->
              </div>
          </div>
          <!-- Second set of testimonials -->
          <div class="carousel-item">
              <div class="ulasan-box-container">
                  <!-- Boxes for the second set -->
                  <!-- Repeat this structure for each box in the second set -->
                  <div class="ulasan-box">
                      <div class="profile">
                          <div class="profile-img p-2">
                              <img src="asset/image/Ulasan1.png" alt="User Name">
                          </div>
                          <div>
                              <strong>Sarah Putri</strong>
                              <div class="reviews">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="far fa-star"></i> <!-- Half-filled star -->
                              </div>
                          </div>
                      </div>
                      <p class="lh-1">Kopi di Feelectric selalu mencerahkan hariku dengan rasa yang kaya, lezat, dan aroma yang memikat.</p>
                  </div>
                  <div class="ulasan-box">
                      <div class="profile">
                          <div class="profile-img p-2">
                              <img src="asset/image/Ulasan2.png" alt="User Name">
                          </div>
                          <div>
                              <strong>Adi Wijaya</strong>
                              <div class="reviews">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                   <!-- Half-filled star -->
                              </div>
                          </div>
                      </div>
                      <p class="lh-1">Kualitas kopi di Feelectric tidak pernah mengecewakan, selalu memberikan kesegaran dan kepuasan pada setiap cangkirnya.</p>
                  </div>
                  <div class="ulasan-box">
                      <div class="profile">
                          <div class="profile-img p-2">
                              <img src="asset/image/Ulasan3.png" alt="User Name">
                          </div>
                          <div>
                              <strong>Maya Sari</strong>
                              <div class="reviews">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i> <!-- Half-filled star -->
                              </div>
                          </div>
                      </div>
                      <p class="lh-1">Feelectric adalah tempat favorit saya untuk minum kopi karena beragam pilihan kopi mereka dan suasana yang nyaman.</p>
                  </div>
                  <div class="ulasan-box">
                      <div class="profile">
                          <div class="profile-img p-2">
                              <img src="asset/image/Ulasan4.png" alt="User Name">
                          </div>
                          <div>
                              <strong>Ahmad Ridwan</strong>
                              <div class="reviews">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="far fa-star"></i> <!-- Half-filled star -->
                              </div>
                          </div>
                      </div>
                      <p class="lh-1">Saya selalu kembali ke Feelectric untuk kopi mereka yang selalu membuat pengalaman membeli kopi menjadi menyenangkan.</p>
                  </div>
                  <!-- Additional boxes for the second set here -->
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
    
