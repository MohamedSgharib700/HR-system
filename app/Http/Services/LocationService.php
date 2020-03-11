<?php

namespace App\Http\Services;

use App\Models\Location;
use Symfony\Component\HttpFoundation\Request;

class LocationService
{
    public function fillFromRequest(Request $request, $location = null)
    {

        if (!$location) {
            $location = new Location();
        }

        $location->fill($request->request->all());
        $location->active = $request->request->get('active', 0);
        $location->save();
        return $location;
    }
}
