<?php

namespace App\Repositories;

use App\Models\Position;
use Symfony\Component\HttpFoundation\Request;

class PositionRepository
{
    public function searchFromRequest($request)
    {

        $position = Position::orderBy('id', 'DESC')
            ->when($request->filled('name'), function ($position) use ($request) {
                $position->where('name', 'like', '%' . $request->query->get('name') . '%');
            })
            ->when($request->filled('active'), function ($position) use ($request) {
                return $position->where('active', 1);
            });

        return $position;
    }

}
