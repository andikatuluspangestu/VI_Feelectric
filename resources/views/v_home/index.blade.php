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
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFF7E8;">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="asset/image/Logonavbar.png" alt="" style="width: 160px;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">contact</a>
          </li>
          <li class="nav-item">
    <a href="{{ route('login') }}" class="btn btn-light text-light" style="background-color: #001804;">Login/Register</a>
</li>

        </ul>
      </div>
    </div>
  </nav>

  <div class="d-flex img-fluid" style="background-image: url(asset/image/banner.jpeg);">
    <div class="banner_text m-5 p-5 text-light">
      <h3>Premium</h3>
      <h1>FEELECTRIC COFFE SHOP</h1>
      <h3>Limited Time</h3>
      <p>More Than Just Coffe, Enjoy Feelectric's signature coffe and discover your coffe</p>
      <h4>SHOP YOUR COFFEE ONLINE!</h4>
      <button type="button" class="btn btn-success">Order Now!</button>
    </div>
    <div class="m-3">
      <img src="asset/image/Gelas.png" alt="foto gelas" style="width: 500px;">
    </div>
  </div>

  <div class="d-flex align-items-center bg-image"
    style="background-image: url(asset/image/Banner2.png); height: 500px; background-size: cover;">
    <div class="banner_text2 text-left text-light m-4">
      <h3>Premium</h3>
      <h1>FEELECTRIC COFFE SHOP</h1>
        <a href="https://www.youtube.com/" class="text-light" style="text-decoration: none;"> <i class="fa-regular fa-circle-play"></i> Watch Video</a>
    </div>
    
  </div>


  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-3 m-5">
        <div class="card">
          <img src="asset/image/kopi1.png" class="card-img-top" alt="..." style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title text-center">Card title</h5>
            <button type="button" class="btn text-light rounded-pill btn-lg"
              style="background-color: #3B2621; width: 100%;">See More</button>
          </div>
        </div>
      </div>
      <div class="col-md-3 m-5">
        <div class="card">
          <img src="asset/image/kopi1.png" class="card-img-top" alt="..." style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title text-center">Card title</h5>
            <button type="button" class="btn text-light rounded-pill btn-lg"
              style="background-color: #3B2621; width: 100%;">See More</button>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-3 m-5">
        <div class="card">
          <img src="asset/image/kopi1.png" class="card-img-top" alt="..." style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title text-center">Card title</h5>
            <button type="button" class="btn text-light rounded-pill btn-lg"
              style="background-color: #3B2621; width: 100%;">See More</button>
          </div>
        </div>
      </div>
      <div class="col-md-3 m-5">
        <div class="card">
          <img src="asset/image/kopi1.png" class="card-img-top" alt="..." style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title text-center">Card title</h5>
            <button type="button" class="btn text-light rounded-pill btn-lg"
              style="background-color: #3B2621; width: 100%;">See More</button>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="ulasan-box d-flex">
                <div class="box-top">
                    <div class="profile">
                        <div class="profile-img me-3">
                            <img src="asset/image/Ulasan1.png" alt="">
                        </div>
                        <div class="name-user">
                            <strong>Sarah Putri</strong>
                            <div class="reviews">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="netizen-comment">
                    <p>The coffee at Feelectric always brightens my day with its rich, indulgent flavor and captivating aroma.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="ulasan-box d-flex">
                <div class="box-top">
                    <div class="profile">
                        <div class="profile-img me-3">
                            <img src="asset/image/Ulasan2.png" alt="">
                        </div>
                        <div class="name-user">
                            <strong>Adi Wijaya</strong>
                            <div class="reviews">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="netizen-comment">
                    <p>The coffee at Feelectric always brightens my day with its rich, indulgent flavor and captivating aroma.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="ulasan-box d-flex">
                <div class="box-top">
                    <div class="profile">
                        <div class="profile-img me-3">
                            <img src="asset/image/Ulasan3.png" alt="">
                        </div>
                        <div class="name-user">
                            <strong>Maya Sari</strong>
                            <div class="reviews">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="netizen-comment">
                    <p>The quality of coffee at Feelectric never disappoints, consistently bringing freshness, and satisfaction to every cup.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="ulasan-box d-flex">
                <div class="box-top">
                    <div class="profile">
                        <div class="profile-img me-3">
                            <img src="asset/image/Ulasan4.png" alt="">
                        </div>
                        <div class="name-user">
                            <strong>Ahmad Ridwan</strong>
                            <div class="reviews">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="netizen-comment">
                    <p>Feelectric is my favorite place for coffee because of their wide variety of coffee choices and comfortable atmosphere.</p>
                </div>
            </div>
        </div>
    </div>
  </div>


  <footer class="d-flex mx-5">

  </footer>











  <!-- script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>