<?php
namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $addresses = Address::all(); // Mendapatkan semua alamat dari database
        return view('v_address.index', compact('user','addresses')); // Mengembalikan ke view dengan data alamat
    }

    public function store(Request $request)
    {
        $request->validate([
            'address_type' => 'required',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'street' => 'required',
        ]);

        $address = new Address($request->all());
        $address->user_id = auth()->id();
        $address->is_primary = $request->has('is_primary');
        $address->save();

        return redirect()->back()->with('success', 'Alamat berhasil disimpan!');
    }

    public function getCitiesByProvince($province)
    {
        // Ambil data kota berdasarkan provinsi dari database atau API
        $cities = City::where('province', $province)->get();
        return response()->json($cities);
    }

    public function getDistrictsByCity($city)
    {
        // Ambil data kelurahan berdasarkan kota dari database atau API
        $districts = District::where('city', $city)->get();
        return response()->json($districts);
    }

    public function getAddressFromCoordinates(Request $request)
    {
        $latitude = $request->latitude;
        $longitude = $request->longitude;

        // Gunakan API eksternal untuk mengonversi koordinat ke alamat, misalnya Google Maps API
        $addressDetails = $this->convertCoordinatesToAddress($latitude, $longitude);
        return response()->json($addressDetails);
    }

    protected function convertCoordinatesToAddress($latitude, $longitude)
    {
        // Logika untuk mengonversi koordinat menjadi alamat
        // Ini adalah placeholder, anda perlu menggunakan API sebenarnya untuk implementasi ini
        return [
            'province' => 'Contoh Provinsi',
            'city' => 'Contoh Kota',
            'district' => 'Contoh Kelurahan',
            'street' => 'Contoh Jalan',
        ];
    }
}
