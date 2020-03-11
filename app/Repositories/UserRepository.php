<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class UserRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $users = User::orderByDesc("id")
            ->when($request->has('type'), function ($users) use ($request) {
                return $users->where('type', '=', (int)$request->get('type'));
            })
            ->when($request->get('name'), function ($users) use ($request) {
                return $users->where('name', 'like', '%' . $request->query->get('name') . '%');
            })
            ->when($request->get('machine_code'), function ($users) use ($request) {
                return $users->where('machine_code', '=', $request->query->get('machine_code'));
            })
            ->when($request->get('mobile_number'), function ($users) use ($request) {
                return $users->where('mobile_number', 'like', '%' . $request->query->get('mobile_number') . '%');
            });
        if ($request->filled('active')) {
            $users->where('active', $request->query->get('active'));
        }


        return $users;
    }

}
