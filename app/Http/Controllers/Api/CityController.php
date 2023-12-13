<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function show()
    {
        $cities = City::all();
        dd($cities);
    }

    public function store(City $request)
    {
        $city = City::create();
        return new City($city);
    }

    public function update(Request $request, City $city)
    {
        $city->update($request->all());
        return redirect()->route('cities.index');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index');
    }
}
