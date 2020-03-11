<?php

namespace App\Repositories;

use App\Models\Location;
use Symfony\Component\HttpFoundation\Request;

class LocationRepository
{
    public function searchFromRequest($request)
    {

        $location = Location::orderBy('id', 'DESC')
            ->when($request->has('parent'), function ($location) use ($request) {
                return $location->where('parent_id', '=', (int)$request->get('parent'));
            }, function ($location) use ($request) {
                return $location->where('parent_id', '=', NULL);
            })
            ->when($request->filled('name'), function ($location) use ($request) {
                $location->where('name', 'like', '%' . $request->query->get('name') . '%');
            })
            ->when($request->filled('active'), function ($location) use ($request) {
                return $location->where('active', 1);
            });

        return $location;
    }

}
