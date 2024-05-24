<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/18b04d2726.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body style="background-color: #FFF7E8;">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFF7E8;">
        <div class="container">
          <a class="navbar-brand" href="index.html">
            <img src="image/loginlogo.png" alt="" style="width: 160px;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto fw-semibold gap-4">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="menu.html">Menu</a>
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
              <a style="color: #3B2621;" href="keranjang.html"><i class="fas fa-shopping-cart profile-icon me-2"></i></a>
              <a href="bio.html" style="color: #3B2621; text-decoration: none; display: flex; align-items: center;">
                <i class="fas fa-user-circle profile-icon"></i>
                <span class="profile-name ms-2">Alexandro</span>
              </a>
            </div>
          </div>
        </div>
      </nav>
    
<!-- Foto Profil -->
<div class="main-content m-5" style=" background-color: #FFFCF5; border: 3px solid #3B2621; border-radius: 5px; color: #3B2621;">
    <div class="container-bio d-flex m-5">
        <div class="col-4 container-foto mx-2 m-2" style=" width: 22%; height: 25%; border: 3px solid #3B2621; border-radius: 5px;">
          <img src="image/bioimg.png" alt="" class="p-2" style="width: 100%">
          <button type="button" class="btn btn-light text-light mx-1" style="background-color: #3B2621; width: 95%;">Login/Register</button>
          <p class="m-2">Besar file: maksimum 10.000.000 bytes (10 Megabytes). Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG</p>
        </div>

<!-- Form Edit -->
        <div class="card-body m-2 p-1 px-4" style="color: #3B2621; ">
            <h4 class="card-title mb-4">Ubah Biodata Diri</h4>
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama disini" value="{{ $user->name }}" style="border: 2px solid #3B2621;">
                </div>
                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
                    <div class="row">
                        <div class="col">
                            <input type="number" class="form-control" name="day" placeholder="Hari" min="1" max="31" value="{{ \Carbon\Carbon::parse($user->date_of_birth)->format('d') }}" style="border: 2px solid #3B2621;">
                        </div>
                        <div class="col">
                            <select class="form-select" name="month" style="border: 2px solid #3B2621;">
                                @foreach(range(1, 12) as $month)
                                    <option value="{{ $month }}" {{ \Carbon\Carbon::parse($user->date_of_birth)->format('m') == $month ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::create()->month($month)->translatedFormat('F') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="year" placeholder="Tahun" min="1900" max="{{ date('Y') }}" value="{{ \Carbon\Carbon::parse($user->date_of_birth)->format('Y') }}" style="border: 2px solid #3B2621;">
                        </div>
                    </div>
                </div>
                <fieldset class="mb-3">
                    <legend class="col-form-label pt-0">Jenis Kelamin</legend>
                    <div class="container d-flex gap-5">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="pria" value="Pria" {{ $user->gender == 'Pria' ? 'checked' : '' }} style="border: 2px solid #3B2621;">
                            <label class="form-check-label" for="pria">Pria</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="wanita" value="Wanita" {{ $user->gender == 'Wanita' ? 'checked' : '' }} style="border: 2px solid #3B2621;">
                            <label class="form-check-label" for="wanita">Wanita</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="tidakMenyebutkan" value="Tidak menyebutkan" {{ $user->gender == 'Tidak menyebutkan' ? 'checked' : '' }} style="border: 2px solid #3B2621;">
                            <label class="form-check-label" for="tidakMenyebutkan">Tidak ingin menyebutkan</label>
                        </div>
                    </div>
                </fieldset>
                <h5>Ubah Kontak</h5>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email disini" value="{{ $user->email }}" style="border: 2px solid #3B2621;">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor telepon</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="+62 Masukkan nomor telepon disini" value="{{ $user->phone }}" style="border: 2px solid #3B2621;">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn" onclick="window.history.back();" style="width: 35%; border: 2px solid #3B2621;">Batal</button>
                    <button type="submit" class="btn text-light" style="width: 35%; border: 2px solid #3B2621; background-color: #3B2621;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
