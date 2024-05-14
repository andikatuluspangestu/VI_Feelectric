<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="image/favicon.svg" type="image/x-icon">
  <title>Feelectric | Coffee + Electric Bicycle</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="asset/css/style.css">
  <script src="https://kit.fontawesome.com/18b04d2726.js" crossorigin="anonymous"></script>
  <script src="asset/js/index.js"></script>
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
          <i class="fas fa-user-circle profile-icon"></i>
          <span class="profile-name ms-2">{{ $user->name }}</span>
      </div>
      </div>
    </div>
  </nav>
<!-- card 1 -->
<div class="main-content">
  <div class="container-bio d-flex mx-3 my-2">
    <div class="container-bio1 mx-4 " style="border: 3px solid #3B2621; border-radius: 5px;height: 400px;">
      <div class="nama d-flex p-2 align-items-center">
        <img src="asset/image/profilebio.png" alt="">
        <p class="text-start align-items-center p-3">{{ $user->name }}</p>
      </div>
      <div class="container-bio1-content p-2">
        <div class="bebas-ongkir p-2" style="border: 3px solid #3B2621; border-radius: 5px;">
          <img src="asset/image/Logo.png" alt="">
          <h4>Nikmatin bebas ongkir tanpa batas</h4>
          <p>Min. Belanja Rp0, bebas biaya aplikasi</p>
        </div>
      </div>
      <div class="pembayaran p-2">
        <div class="gopay d-flex align-items-center">
            <img src="asset/image/pembayaran1.png" alt="Gopay">
            <p class="mb-0">Gopay</p>
            <p class="ms-auto mb-0">Aktifkan</p>
        </div>

        <div class="member d-flex align-items-center">
            <img src="asset/image/pembayaran2.png" alt="Member Card">
            <p class="mb-0">Member card</p>
            <p class="ms-auto mb-0">Aktifkan</p>
        </div>

        <div class="saldo d-flex align-items-center">
            <img src="asset/image/pembayaran3.png" alt="Saldo">
            <p class="mb-0">Saldo</p>
            <p class="ms-auto mb-0">Rp.0</p>
        </div>
    </div>
    </div>
<!-- card 2 -->
    <div class="container-bio2 mx-2 pb-5" style="border: 3px solid #3B2621; border-radius: 5px;">
    <!-- navbar 2 -->
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid mx-1">
          <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav justify-content-between " style="width:800px;">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" style="color: #001804;" href="{{route('v_user.index')}}">Biodata Diri</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('v_address.index')}}">Daftar Alamat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('v_pesanan.index')}}">Pesanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('v_voucher.index')}}">Voucher</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('v_notif.index')}}">Notifikasi</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<!-- pesanan -->
      <hr>
      <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Flex container with centering -->
                <div class="d-flex flex-column align-items-center justify-content-center" style="height: 200px; padding-top: 100px;"> <!-- Adjust height as needed -->
                    <img src="asset/image/pesanan.png" alt="Belum ada pesanan" class="img-fluid">
                    <p>Belum ada pesanan</p>
                </div>
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
    

</body>

</html>
