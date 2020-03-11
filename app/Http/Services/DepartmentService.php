<?php

namespace App\Http\Services;

use App\Models\Department;
use Symfony\Component\HttpFoundation\Request;

class DepartmentService
{
    public function fillFromRequest(Request $request, $department = null)
    {

        if (!$department) {
            $department = new Department();
        }

        $department->fill($request->request->all());
        $department->active = $request->request->get('active', 0);
        $department->save();
        return $department;
    }
}
