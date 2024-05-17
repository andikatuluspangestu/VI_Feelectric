<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="asset/image/favicon.svg" type="image/x-icon">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="https://kit.fontawesome.com/18b04d2726.js" crossorigin="anonymous"></script>
  <script src="{{ asset('js/index.js') }}"></script>
</head>

<body>
      <!-- navbar -->
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
       
          <img src="{{ asset('image/profilebio.png') }}" alt="">
          <p class="text-start align-items-center p-3">{{ $user->name }}</p>
        </div>
        <div class="container-bio1-content p-2">
          <div class="bebas-ongkir p-2" style="border: 3px solid #3B2621; border-radius: 5px;">
            <img src="{{ asset('image/Logo.png') }}" alt="">
            <h4>Nikmatin bebas ongkir tanpa batas</h4>
            <p>Min. Belanja Rp0, bebas biaya aplikasi</p>
          </div>
        </div>
        <div class="pembayaran p-2">
          <div class="gopay d-flex align-items-center">
          
            <img src="{{ asset('image/pembayaran1.png') }}" alt="Gopay">
            <p class="mb-0">Gopay</p>
            <p class="ms-auto mb-0">Aktifkan</p>
          </div>

          <div class="member d-flex align-items-center">
            <img src="{{ asset('image/pembayaran2.png') }}" alt="Member Card">
            <p class="mb-0">Member card</p>
            <p class="ms-auto mb-0">Aktifkan</p>
          </div>

          <div class="saldo d-flex align-items-center">
            <img src="{{asset('image/pembayaran3.png')}}" alt="Saldo">
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
                  <a class="nav-link active" aria-current="page" style="color: #001804;"
                    href="{{ route('v_user.index') }}">Biodata Diri</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('v_address.index') }}">Daftar Alamat</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('v_pesanan.index') }}">Pesanan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('v_voucher.index') }}">Voucher</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('v_notif.index') }}">Notifikasi</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Profile Picture
                    </div>
                    <div class="card-body text-center">
                        <img id="profilePreview" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://via.placeholder.com/150' }}" alt="Profile Picture" class="img-fluid mb-3">
                        <input type="file" class="form-control" name="profile_picture" id="profilePictureInput" accept="image/*">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Edit Profile
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="date_of_birth" class="form-label">Date of Birth:</label>
                                <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}">
                                @error('date_of_birth')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender:</label>
                                <select class="form-control" name="gender">
                                    <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('gender')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
    <label for="phone" class="form-label">Phone Number:</label>
    <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">
    @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('profilePictureInput').addEventListener('change', function(event) {
            var file = event.target.files[0];
            if (file.size > 2 * 1024 * 1024) { 
                alert('The file is too large. Please select a file less than 2MB.');
                this.value = ''; 
            } else {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profilePreview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
