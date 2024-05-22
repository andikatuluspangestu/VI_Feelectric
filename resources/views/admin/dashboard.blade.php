<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('asset/css/style_admin.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <img src="{{asset('asset/image/img/Logo.png')}}" alt="" class="mb-5 ps-4">
                    <ul class="nav flex-column mb-5">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <i class="fas fa-user fa-icons"></i> User management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-chart-line fa-icons"></i> Statistics
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-cog fa-icons"></i> Settings
                            </a>
                        </li>
                    </ul>
                    <div class="btnlogout">
                        <form action="{{ route('logout') }}" method="POST">
                        @csrf <!-- CSRF token untuk keamanan -->
                        <button class="btn btn-dark mt-5"><i class="fas fa-sign-out-alt fa-icons"></i> Logout</button>
                        </form>
                    </div>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard Overview</h1>
                    <div class="btn-toolbar mb-2 mb-md-0 align-items-center">
                        <div class="input-group me-5">
                            <input type="text" class="form-control" placeholder="Search all...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <a href="#" class="nav-link me-3">Help Guides</a>
                        <a href="#" class="nav-link me-3">Inbox <i class="fa-solid fa-inbox"></i></a>
                        
                        <img src="img/profile.png" alt="">
                    </div>

                </div>

                <!-- Table -->
                <div class="table-responsive" style="height: 100%;">
                    <nav class="navbar navbar-expand">
                        <div class="container-fluid ">
                            <a class="navbar-brand" href="#">Feelectric Catalogue</a>
                            <div class="ms-auto d-flex flex-row justify-content-around align-items-center">
                                <div class="dropdown me-3">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Select column
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">Option 1</a></li>
                                        <li><a class="dropdown-item" href="#">Option 2</a></li>
                                        <li><a class="dropdown-item" href="#">Option 3</a></li>
                                    </ul>
                                </div>
                                <div class="input-group me-3">
                                    <input type="text" class="form-control" placeholder="Search list...">
                                    <button class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
                                </div>
                                <button class="btn"><i class="fa-solid fa-arrow-down-wide-short"></i></button>
                                <a href="{{ route('add.menu') }}" style="width: 50%;">
                                    <button class="btn btn-dark" type="button">Add new</button>
                                </a>
                            </div>
                        </div>
                    </nav>
                    <div class="row">
                        @foreach ($menus as $menu)
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="card h-100">
                            <img src="{{ asset('storage/' . $menu->photo_hot) }}" class="card-img-top" alt="Product Image">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $menu->name }}</h5>
                                    <p class="card-text">{{ $menu->description }}</p>
                                    <ul class="list-unstyled">
                                        <li>Harga Panas: Rp{{ number_format($menu->price_hot, 2) }}</li>
                                        <li>Harga Dingin: Rp{{ number_format($menu->price_ice, 2) }}</li>
                                        <li>Stok: {{ $menu->stock }}</li>
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
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
