<?php

namespace App\Http\Services;

use App\Models\Vacation;
use App\Models\User;
use App\Constants\VacationStatus;
use Symfony\Component\HttpFoundation\Request;
use App\Notifications\NotificationClass ;

class VacationService
{


    public function fillFromRequest(Request $request, $vacation = null)
    {
        if (!$vacation) {
            $vacation = new Vacation();
        }
        $user = User::where('id', $request->get('user_id'))->first();

        $vacation->fill($request->request->all());
        $vacation->save();

        if ($request->get('hr_approve') == VacationStatus::APPROVE) {
            $user->annual_vacation_balance -= 1;
            $user->save();
        }
        if(auth()->user()->type != 2){

            auth()->user()->notify(new NotificationClass($user ,$vacation));

        }
        return $vacation;
    }

}
