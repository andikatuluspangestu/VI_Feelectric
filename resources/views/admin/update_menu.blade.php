<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('asset/css/style_admin.css') }}" rel="stylesheet">
</head>
<body>
<form method="POST" action="{{ route('menu.update', $menu->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container mt-5 mb-3">
        <div class="col-lg-8 offset-lg-2">
            <!-- Product Name -->
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName" name="productName" placeholder="Add product name here" value="{{ $menu->name }}">
            </div>
            <!-- Product Description -->
            <div class="mb-3">
                <label for="productDescription" class="form-label">Product Description</label>
                <textarea class="form-control" id="productDescription" name="productDescription" rows="3">{{ $menu->description }}</textarea>
            </div>
            <!-- Product Category -->
            <div class="mb-3">
                <label for="productCategory" class="form-label">Product Category</label>
                <select class="form-select" id="productCategory" name="productCategory">
                    <option value="Ordinary Coffee" {{ $menu->category == 'Ordinary Coffee' ? 'selected' : '' }}>Ordinary Coffee</option>
                    <option value="Manual Brew" {{ $menu->category == 'Manual Brew' ? 'selected' : '' }}>Manual Brew</option>
                    <option value="Latte Non Coffee" {{ $menu->category == 'Latte Non Coffee' ? 'selected' : '' }}>Latte Non Coffee</option>
                    <option value="Feel The Signature" {{ $menu->category == 'Feel The Signature' ? 'selected' : '' }}>Feel The Signature</option>
                </select>
            </div>
            <!-- Variant -->
            <div class="mb-3">
                    <label class="form-label">Variant</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="variant" id="hot" value="hot" {{ $menu->variant == 'hot' ? 'checked' : '' }} onchange="handleVariantChange()">
                        <label class="form-check-label" for="hot">Hot</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="variant" id="ice" value="ice" {{ $menu->variant == 'ice' ? 'checked' : '' }} onchange="handleVariantChange()">
                        <label class="form-check-label" for="ice">Ice</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="variant" id="both" value="both" {{ $menu->variant == 'both' ? 'checked' : '' }} onchange="handleVariantChange()">
                        <label class="form-check-label" for="both">Both</label>
                    </div>
                </div>

                <!-- Price Hot and Ice -->
                <div class="row mb-3">
                    <div class="col">
                        <label for="priceHot" class="form-label">Price Hot</label>
                        <input type="text" class="form-control" id="priceHot" name="priceHot" placeholder="IDR 0" value="{{ $menu->price_hot }}">
                    </div>
                    <div class="col">
                        <label for="priceIce" class="form-label">Price Ice</label>
                        <input type="text" class="form-control" id="priceIce" name="priceIce" placeholder="IDR 0" value="{{ $menu->price_ice }}">
                    </div>
                </div>

            <!-- Product Stock -->
            <div class="mb-3">
                <label for="productStock" class="form-label">Product Stock</label>
                <input type="number" class="form-control" id="productStock" name="productStock" value="{{ $menu->stock }}">
            </div>
            <!-- Product Photos -->
            <div class="mb-4">
                <label class="form-label">Product Photos</label>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="photoHot" class="form-label">Hot</label>
                            <input class="form-control" type="file" id="photoHot" name="photoHot">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="photoIce" class="form-label">Ice</label>
                            <input class="form-control" type="file" id="photoIce" name="photoIce">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Buttons -->
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-secondary" type="button" onclick="window.history.back();">Cancel</button>
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </div>
        <!-- Script to handle the variant changes -->
        <script>
                    function handleVariantChange() {
                        var variant = document.querySelector('input[name="variant"]:checked').value;
                        var priceHotInput = document.getElementById('priceHot');
                        var priceIceInput = document.getElementById('priceIce');

                        switch (variant) {
                            case 'hot':
                                priceHotInput.disabled = false;
                                priceIceInput.disabled = true;
                                priceIceInput.value = ''; // Clear value
                                break;
                            case 'ice':
                                priceHotInput.disabled = true;
                                priceHotInput.value = ''; // Clear value
                                priceIceInput.disabled = false;
                                break;
                            case 'both':
                                priceHotInput.disabled = false;
                                priceIceInput.disabled = false;
                                break;
                        }
                    }

                    // Initialize to set correct state on page load based on existing variant value
                    document.addEventListener('DOMContentLoaded', function() {
                        handleVariantChange();
                    });
                </script>

                <!-- Remaining form content and script for Bootstrap -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</form>
</body>
</html>
