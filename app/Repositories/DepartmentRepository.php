<?php

namespace App\Repositories;

use App\Models\Department;
use Symfony\Component\HttpFoundation\Request;

class DepartmentRepository
{
    public function searchFromRequest($request)
    {

        $department = Department::orderBy('id', 'DESC')
            ->when($request->filled('name'), function ($department) use ($request) {
                $department->where('name', 'like', '%' . $request->query->get('name') . '%');
            })
            ->when($request->filled('active'), function ($department) use ($request) {
                return $department->where('active', 1);
            });

        return $department;
    }

}
