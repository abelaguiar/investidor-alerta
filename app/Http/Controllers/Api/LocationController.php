<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Models\State;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function getState($name, State $state)
    {
        return response()->json(
            $state->where('uf', $name)->first()
        );
    }

    public function getCity($name, City $city)
    {
        return response()->json(
            $city->where('name', $name)->first()
        );
    }

    public function getStates(State $state)
    {
        return response()->json(
            $state->pluck('name', 'id')
        );
    }

    public function getCitiesByState(State $state)
    {
        return response()->json(
            $state->cities->pluck('name', 'id')
        );
    }
}
