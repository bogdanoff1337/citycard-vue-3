<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CityResource::collection(City::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request)
    {
        $city = City::create($request->validated());

        return new CityResource($city);
    }

    /**
     * Display the specified resource.
     * @param \App\Models\City $city
     */
    public function show(City $city)
    {
        return new CityRequest($city);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityRequest $request, City $city)
    {
        $city->update($request->validate());

        return new CityResource($city);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();

        return response()->noContent();
    }
}
