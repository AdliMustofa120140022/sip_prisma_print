<?php

namespace App\Http\Controllers\helper;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class getOngkirController extends Controller
{
    public function index(Request $request)
    {
        $weight = $request->query('weight', 5000);

        $alamat = Alamat::where('user_id', Auth::id())->where('is_default', 1)->first();
        $responseCity = Http::withHeaders([
            'key' => config('app.rajaongkir.api_key'),
        ])->get('https://api.rajaongkir.com/starter/city');

        if ($responseCity->failed()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to get data from RajaOngkir'
            ], 500);
        }
        $data = $responseCity->json();

        $listCity = $data['rajaongkir']['results'];

        $filteredCity = array_filter($listCity, function ($city) use ($alamat) {
            $kabupatenName = str_replace('Kabupaten', '', $alamat->kabupaten);
            return strtolower($city['city_name']) == strtolower(trim($kabupatenName));
        });

        $cityId = null;

        if (!empty($filteredCity)) {
            $city = reset($filteredCity);
            $cityId = $city['city_id'];
        }
        $responseCost = Http::withHeaders([
            'key' => config('app.rajaongkir.api_key'),
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => config('app.rajaongkir.origin_city_id'),
            'destination' => $cityId,
            'weight' => $weight,
            'courier' => 'jne',
        ]);
        $costData = $responseCost->json();
        $shippingCosts = $costData['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];

        return response()->json([
            'status' => 'success',
            'data' => $shippingCosts
        ]);
    }
}
