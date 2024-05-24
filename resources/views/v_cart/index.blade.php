<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
</head>
<body style="background-color: #FFF7E8;">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFF7E8;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="image/loginlogo.png" alt="" style="width: 160px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto fw-semibold gap-4">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('v_menu.index') }}">Menu</a>
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
                    <a style="color: #3B2621;" href="{{ route('v_cart.index') }}"><i class="fas fa-shopping-cart profile-icon me-2"></i></a>
                    <a style="color: #3B2621;" href="#"><i class="fas fa-user-circle profile-icon"></i></a>
                    <a href="{{ route('user.profile', ['id' => $user->id]) }}" class="d-flex align-items-center profile-link">
                        <i class="fas fa-user-circle profile-icon"></i>
                        <span class="profile-name ms-2">{{ $user->name }}</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Your Cart</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                <tr>
                    <td>{{ $cart->menu->name }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td>Rp{{ number_format($cart->menu->price_hot, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($cart->quantity * $cart->menu->price_hot, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
