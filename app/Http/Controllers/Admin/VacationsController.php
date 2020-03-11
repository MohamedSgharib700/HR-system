<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\VacationRequest;
use App\Http\Controllers\BaseController;
use App\Http\Services\VacationService;
use App\Models\User;
use App\Models\Vacation;
use App\Repositories\VacationRepository;
use App\Notifications\NotificationClass ;
use Illuminate\Http\Request;
use View;

class VacationsController extends BaseController
{

    protected $vacationService;
    private $vacationRepository;

    /**
     * VacationsController constructor.
     * @param VacationService $vacationService
     * @param VacationRepository $vacationRepository
     */
    public function __construct(VacationService $vacationService, VacationRepository $vacationRepository)
    {
        $this->vacationService = $vacationService;
        $this->vacationRepository = $vacationRepository;
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\View
     */
    public function index(User $user)
    {
        request()->query->set('user_id', $user->id);
        $list = $this->vacationRepository->searchFromRequest(request());
        $list = $list->paginate(10);
        $list->appends(request()->all());
        return View::make('admin.users.vacations.index', ['list' => $list, 'user' => $user]);
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\View
     */
    public function create(User $user)
    {
        return View::make('admin.users.vacations.create', ['user' => $user]);
    }

    /**
     * @param VacationRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(VacationRequest $request, User $user)
    {
        if ($request->duration > $user->annual_vacation_balance) {

            return back()->with('message' , 'There are no vacations');
        }else{

        $this->vacationService->fillFromRequest($request);

        return redirect(route('admin.user.vacations.index', ['user' => $user->id]))->with('success', trans('item_added_successfully'));
        }
    }

    /**
     * @param User $user
     * @param Vacation $vacation
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user, Vacation $vacation)
    {
        return view('admin.users.vacations.show', ['vacation' => $vacation]);
    }

    /**
     * @param User $user
     * @param Vacation $vacation
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user, Vacation $vacation)
    {
        return view('admin.users.vacations.edit', ['vacation' => $vacation]);
    }

    /**
     * @param VacationRequest $request
     * @param User $user
     * @param Vacation $vacation
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(VacationRequest $request, User $user, Vacation $vacation)
    {
        $this->vacationService->fillFromRequest($request, $vacation);

        auth()->user()->notify(new NotificationClass($user , $vacation));

        return redirect(route('admin.user.vacations.index', ['user' => $user->id]))->with('success', trans('item_updated_successfully'));
    }

    /**
     * @param User $user
     * @param Vacation $vacation
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user, Vacation $vacation)
    {
        $vacation->delete();

        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }


}
