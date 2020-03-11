<?php

namespace App\Repositories;

use App\Models\Vacation;
use App\Constants\VacationStatus;
use Symfony\Component\HttpFoundation\Request;

class VacationRepository
{
    public function searchFromRequest($request)
    {

        $vacations = Vacation::orderByDesc("id")
            ->when($request->get('user_id'), function ($vacations) use ($request) {
                return $vacations->where('user_id', '=',  $request->query->get('user_id'));
            })
            ->when($request->get('name'), function ($vacations) use ($request) {
                $vacations->whereHas('user', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->query->get('name') . '%');
                });
            })
            ->when($request->get('machine_code'), function ($vacations) use ($request) {
                $vacations->whereHas('user', function ($query) use ($request) {
                    $query->where('machine_code', 'like', '%' . $request->query->get('machine_code') . '%');
                });
            })
            ->when($request->get('phone'), function ($vacations) use ($request) {
                return $vacations->where('phone', 'like', '%' . $request->query->get('phone') . '%');
            })
            ->when($request->get('status'), function ($vacations) use ($request) {
                return $vacations->where('hr_approve', $request->query->get('status'));
            });

        return $vacations;
    }

    public function vacationsBalance($user)
    {
        $requestData = [
            'user_id' => $user->id,
            'status' => VacationStatus::APPROVE
        ];
        request()->request->add($requestData);

        $remainingVacations = $user->annual_vacation_balance - $this->searchFromRequest(request())->count();

    }

}
