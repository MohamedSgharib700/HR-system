<?php

namespace App\Http\Services;

use App\Models\Position;
use Symfony\Component\HttpFoundation\Request;

class PositionService
{
    public function fillFromRequest(Request $request, $position = null)
    {

        if (!$position) {
            $position = new Position();
        }

        $position->fill($request->request->all());
        $position->active = $request->request->get('active', 0);
        $position->save();
        return $position;
    }
}
