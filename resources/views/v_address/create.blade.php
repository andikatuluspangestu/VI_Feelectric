@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Alamat Baru</h2>
    <form method="POST" action="{{ route('addresses.store') }}">
    @csrf
    <label for="address_type">Alamat Tipe:</label>
    <select name="address_type" id="address_type">
        <option value="home">Rumah</option>
        <option value="office">Kantor</option>
    </select>

    <label for="is_primary">Atur sebagai Alamat Utama:</label>
    <input type="checkbox" name="is_primary" id="is_primary" value="1">

    <label for="province">Provinsi:</label>
    <select name="province" id="province"></select>

    <label for="city">Kota:</label>
    <select name="city" id="city"></select>

    <label for="district">Kelurahan:</label>
    <select name="district" id="district"></select>

    <label for="street">Jalan:</label>
    <input type="text" name="street" id="street">

    <button type="button" onclick="getCurrentLocation()">Gunakan Lokasi Saat Ini</button>

    <button type="submit">Simpan Alamat</button>
</form>

</div>

<script>
document.getElementById('province').addEventListener('change', function() {
    fetch('/api/cities?province=' + this.value)
        .then(response => response.json())
        .then(data => {
            let citySelect = document.getElementById('city');
            citySelect.innerHTML = '';
            data.forEach(city => {
                citySelect.options.add(new Option(city.name, city.name));
            });
        });
});

// Ulangi untuk city -> district


function getCurrentLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            let latitude = position.coords.latitude;
            let longitude = position.coords.longitude;

            // Gunakan API untuk mendapatkan alamat dari latitude dan longitude
            fetch('/api/address-from-coords?lat=' + latitude + '&lng=' + longitude)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('province').value = data.province;
                    document.getElementById('city').value = data.city;
                    document.getElementById('district').value = data.district;
                    document.getElementById('street').value = data.street;
                });
        });
    } else {
        alert('Geolocation is not supported by this browser.');
    }
}

</script>
@endsection
