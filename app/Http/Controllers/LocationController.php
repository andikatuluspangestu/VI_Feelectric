<?php
namespace App\Http\Controllers;
use App\Models\Province;
use Illuminate\Http\Request;

class LocationController extends Controller
{

public function getCitiesByProvince($province_id)
{
    $cities = City::where('province_id', $province_id)->get();
    return response()->json($cities);
}
// Dalam LocationController
public function getAddressFromCoords(Request $request) {
    $latitude = $request->lat;
    $longitude = $request->lng;
    return response()->json(['address' => $this->geocode($latitude, $longitude)]);
}

// Fungsi geocode di atas dijadikan method di dalam LocationController

function geocode($latitude, $longitude) {
    $apiKey = 'b67eb4b1aa52488ebc89ce15b8014c07';  // Ganti dengan API key OpenCage Anda
    $url = "https://api.opencagedata.com/geocode/v1/json?q={$latitude}+{$longitude}&key={$apiKey}";

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if (!empty($data['results'])) {
        return $data['results'][0]['formatted']; // Mengembalikan alamat terformat
    } else {
        return "No results found.";
    }
}
public function showForm()
    {
        $provinces = Province::all();
        dd($provinces);  // Ini akan memunculkan dump data provinsi, periksa apakah data ada
        return view('address.create', compact('provinces'));
    }
    


}
