<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/18b04d2726.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .img-fluid {
            object-fit: cover;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFF7E8;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('image/loginlogo.png') }}" alt="" style="width: 160px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto fw-semibold gap-4">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route ('v_menu.index')}}">Menu</a>
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
                    <a href="{{ route('user.profile', ['id' => $user->id]) }}" class="d-flex align-items-center profile-link">
                <i class="fas fa-user-circle profile-icon"></i>
                <span class="profile-name ms-2">{{ $user->name }}</span>
            </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- Cart items on the left -->
            <div class="col-md-8">
                <h3>Keranjang</h3>
                <hr>
                <div class="card p-2 shadow-sm border-0">
                    <ul class="list-group list-group-flush">
                        @foreach ($cartItems as $item)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('asset/image/beans.png') }}" class="rounded img-fluid"
                                            style="width: 100px; height: 100px; margin-right: 15px;"
                                            alt="Espresso Double">
                                        <div>
                                            <h5 class="mb-1">{{ $item->product->name }}</h5>

                                            {{-- Quantity Badge --}}
                                            <span class="badge bg-secondary rounded">{{ $item->quantity }}
                                                Item Dipesan</span>

                                            <span class="badge bg-primary rounded">{{ $item->temperature }}</span>

                                            <span class="badge bg-warning rounded">{{ $item->size }}</span>

                                            <br><br>

                                            <p class="mb-0">Catatan: {{ $item->notes }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <button class="btn btn-secondary btn-sm m-2" data-bs-toggle="modal"
                                                data-bs-target="#productModal" data-id="{{ $item->id }}"
                                                data-name="{{ $item->product->name }}"
                                                data-quantity="{{ $item->quantity }}" data-size="{{ $item->size }}"
                                                data-temperature="{{ $item->temperature }}"
                                                data-price="{{ $item->product->price }}"
                                                data-notes="{{ $item->notes }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>


                                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                        <div class="text-dark fw-bold mt-2">
                                            Rp{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Additional content on the right -->
            <div class="col-md-4">
                <h3 class="card-title ms-3">Pengambilan</h3>
                <hr>
                <div class="card p-3 shadow-sm border-0">
                    <div class="mb-3">
                        <label for="pickupType" class="form-label">Minum di Tempat/Bawa Pulang</label>
                        <select class="form-select" id="pickupType">
                            <option selected>Minum di Tempat</option>
                            <option>Bawa Pulang</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pickupTime" class="form-label">Tanggal dan Jam Pengambilan</label>
                        <div class="input-group">
                        <input type="datetime-local" class="form-control" id="pickupTime" name="pickup_time" value="2024-05-21T18:00">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"></button>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Rincian Pembayaran</h5>
                        <p>Sub total: Rp{{ number_format($total, 0, ',', '.') }}</p>
                        <p>Biaya kemasan: Rp0</p>
                        <p>Total: Rp{{ number_format($total, 0, ',', '.') }}</p>
                        <div class="d-grid gap-2">
                            <form id="checkoutForm">
                                <input type="hidden" name="pickup_type" id="pickupTypeInput">
                                <input type="hidden" name="pickup_time" id="pickupTimeInput">
                                <input type="hidden" name="subtotal" value="{{ $total }}">
                                <input type="hidden" name="packaging_fee" value="0">
                                <input type="hidden" name="total" value="{{ $total }}">
                                <button class="btn text-light" type="button" style="background-color: #3B2621;" id="checkoutButton">Lanjutkan ke Pembayaran</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateCartItemForm" method="POST" action="{{ route('cart.update', ':id') }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="product-id" name="id">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('asset/image/beans.png') }}" class="rounded img-fluid"
                                style="width: 100px; height: 100px; margin-right: 15px;" alt="Espresso Double">
                            <strong>
                                <h5 class="modal-title"></h5>
                            </strong>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="temperature" class="form-label">Dingin/Panas</label>
                                <select class="form-select" id="temperature" name="temperature">
                                    <option value="hot">Panas +500</option>
                                    <option value="cold">Dingin</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="size" class="form-label">Ukuran</label>
                                <select class="form-select" id="size" name="size">
                                    <option value="kecil">Kecil</option>
                                    <option value="sedang">Sedang</option>
                                    <option value="besar">Besar</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">Catatan</label>
                            <textarea class="form-control" id="notes" name="notes"></textarea>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold"></span>
                            <div class="input-group" style="width: 120px;">
                                <button class="btn btn-outline-secondary btn-minus" type="button"><i
                                        class="fas fa-minus"></i></button>
                                <input type="text" class="form-control text-center" id="quantity" name="quantity"
                                    value="1" aria-label="Quantity">
                                <button class="btn btn-outline-secondary btn-plus" type="button"><i
                                        class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark w-100">Ubah Pesanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-white p-3" style="background-color: #001804;">
        <div class="container">
            <div class="row" style="padding-left: 90px;">
                <div class="col-md-4 px-5">
                    <div class="footer-logo">
                        <img src="{{ asset('asset/image/Logofooter.png') }}" alt="feelectric Logo"
                            class="img-fluid">
                        <p>A combination of Indonesia's authentic coffee with electric bicycle.</p>
                    </div>
                </div>
                <div class="col-md-4 px-5">
                    <h3>Office</h3>
                    <p>Jl. BSD Green Office Park, BSD<br>Kecamatan Tangerang, Banten<br>15345 Indonesia</p>
                </div>
                <div class="col-md-4 px-10">
                    <h3>Contact Us</h3>
                    <p><i class="fab fa-whatsapp"></i> +6281388881111<br><i class="fab fa-instagram"></i>
                        info@feelectric.com<br><i class="fa-regular fa-envelope"></i> feelectric@gmail.com</p>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <p class="text-center">©2024 feelectric. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var productModal = document.getElementById('productModal');
            productModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var name = button.getAttribute('data-name');
                var quantity = button.getAttribute('data-quantity');
                var notes = button.getAttribute('data-notes');
                var size = button.getAttribute('data-size');
                var temperature = button.getAttribute('data-temperature');
                var price = button.getAttribute('data-price');

                var modal = this;
                modal.querySelector('.modal-title').textContent = name;
                modal.querySelector('#quantity').value = quantity;
                modal.querySelector('#notes').value = notes;
                modal.querySelector('#size').value = size;
                modal.querySelector('#temperature').value = temperature;
                modal.querySelector('.fw-bold').textContent = 'Rp' + (price * quantity).toLocaleString();
                modal.querySelector('#product-id').value = id;
            });

            productModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var form = document.getElementById('updateCartItemForm');
                form.action = form.action.replace(':id', id);

                // Reset the form
                form.reset();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const minusButtons = document.querySelectorAll('.btn-minus');
            const plusButtons = document.querySelectorAll('.btn-plus');

            minusButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.nextElementSibling;
                    let value = parseInt(input.value);
                    if (value > 1) {
                        input.value = value - 1;
                    }
                });
            });

            plusButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.previousElementSibling;
                    let value = parseInt(input.value);
                    input.value = value + 1;
                });
            });

            document.getElementById('checkoutButton').addEventListener('click', function() {
    const pickupType = document.getElementById('pickupType').value;
    const pickupTime = document.getElementById('pickupTime').value;

    document.getElementById('pickupTypeInput').value = pickupType;
    document.getElementById('pickupTimeInput').value = pickupTime;

    const formData = new FormData(document.getElementById('checkoutForm'));

    for (var pair of formData.entries()) {
        console.log(pair[0]+ ': ' + pair[1]); 
    }

    fetch('/orders', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            alert(data.message);
            window.location.href = '/';  // Redirect to homepage or another page
        }
    })
    .catch(error => console.error('Error:', error));
});
        });
    </script>
</body>

</html>
