<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feelectric | Coffee + Electric Bicycle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        crossorigin="anonymous" />
    <link rel="shortcut icon" href="asset/image/favicon.svg" type="image/x-icon">
    <script src="https://kit.fontawesome.com/18b04d2726.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="asset/css/style.css">
    <script src="asset/js/index.js"></script>
    <style>
      body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
            color: #3C2A21;
        }
        .container-fluid {
            display: flex;
            height: 100vh;
        }
        .image-form {
            flex: 0 0 600px;
            height: 100%;
            margin: 0;
        }
        .image-form img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .form-login {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 5px;
        }
        input {
            height: 36px;
        }
        .form-group {
            position: relative;
        }
        .form-control-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #3C2A21;
            z-index: 2;
        }
        .form-control {
            padding-right: 40px;
            border: 2px solid #3C2A21;
        }
    </style>
</head>
<body>
    <div class="container-fluid px-0 d-flex" style="background-color: #FFF7E7;">
        <div class="image-form m-0">
            <img src="asset/image/loginimg.png" alt="" style="width: 600px; height: 585px;">
        </div>
        <div class="form-login py-4" style="flex-grow: 1; margin: 0; padding:160px; width: 462px;">
            <form action="{{ route('register.post') }}" method="post">
                
                @csrf <!-- CSRF Token untuk keamanan -->
                <div class="img m-0 p-2 text-center">
                    <img src="asset/image/loginlogo.png" alt="" style="width: 150px;">
                </div>
                <h1 class="text-center fs-3 p-1">Daftar</h1>
                <p class="text-center " style="line-height: 1; font-size: 15px;">Welcome to Feelectric Coffee Shop! To unlock exclusive offers and rewards, please register an account. Let's brew up some great moments together!</p>
                <div class="form-group mb-1">
                    <label for="inputEmail" class="form-label float-start p-0">Email</label>
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="example@gmail.com" required>
                </div>
                <div class="form-group mb-1">
                    <label for="inputUsername" class="form-label float-start">Username</label>
                    <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group mb-1 position-relative">
                    <label for="inputPassword" class="form-label float-start">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                    <i class="fas fa-eye form-control-icon" style="padding-top: 30px;" onclick="togglePasswordVisibility('inputPassword')"></i>
                </div>
                <div class="form-group mb-2 position-relative">
                    <label for="inputConfirmPassword" class="form-label float-start">Confirm Password</label>
                    <input type="password" id="inputConfirmPassword" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                    <i class="fas fa-eye form-control-icon" style="padding-top: 30px;" onclick="togglePasswordVisibility('inputConfirmPassword')"></i>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-dark" style="width: 100%; background-color: #3C2A21;">Register</button>
                </div>
                <div class="text-center">
                    <p class="m-0">Sudah memiliki akun?</p> 
                    <a href="{{route('login')}}" class="text-decoration-none fw-semibold" style="color: #073220;">Login here</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
