<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Services\UploaderService;
use App\Models\User;
use App\Constants\UserTypes;
use App\Http\Services\UserService;
use App\Repositories\DepartmentRepository;
use App\Repositories\LocationRepository;
use App\Repositories\PositionRepository;
use App\Repositories\VacationRepository;
use App\Repositories\UserRepository;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Http\Request;
use View;


class UserController extends BaseController
{
    protected $userService;
    protected $userRepository;
    protected $vacationRepository;
    private $locationRepository;
    private $departmentRepository;
    private $positionRepository;
    private $uploaderService;

    public function __construct(UserService $userService, UserRepository $userRepository, LocationRepository $locationRepository, DepartmentRepository $departmentRepository, PositionRepository $positionRepository, UploaderService $uploaderService, VacationRepository $vacationRepository)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
        $this->locationRepository = $locationRepository;
        $this->departmentRepository = $departmentRepository;
        $this->positionRepository = $positionRepository;
        $this->uploaderService = $uploaderService;
        $this->vacationRepository = $vacationRepository;
    }

    public function index(Request $request)
    {
//        request()->query->set('type', UserTypes::ADMIN);
        $list = $this->userRepository->search(request())->paginate(30);
        $list->appends(request()->all());
        return View::make('admin.users.index', ['list' => $list]);
    }

    public function create(User $user)
    {
        request()->query->set('active', 1);
        request()->query->set('parent', 1);
        $locations = $this->locationRepository->searchFromRequest(request())->get();
        $departments = $this->departmentRepository->searchFromRequest(request())->get();
        $positions = $this->positionRepository->searchFromRequest(request())->get();

        return View::make('admin.users.create', ['locations' => $locations, 'departments' => $departments, 'positions' => $positions]);
    }

    public function store(UserRequest $request)
    {
        $users = $this->userService->fillFromRequest($request);
        return redirect(route('admin.users.index'))->with('success', trans('item_added_successfully'));
    }

    public function edit(User $user)
    {
        request()->query->set('active', 1);
        request()->query->set('parent', 1);
        $locations = $this->locationRepository->searchFromRequest(request())->get();
        $departments = $this->departmentRepository->searchFromRequest(request())->get();
        $positions = $this->positionRepository->searchFromRequest(request())->get();
        return View::make('admin.users.edit', ['user' => $user, 'locations' => $locations, 'departments' => $departments, 'positions' => $positions]);
    }

    public function update(UserRequest $request, User $user)
    {
        $this->userService->fillFromRequest($request, $user);
        return redirect(route('admin.users.index'))->with('success', trans('item_updated_successfully'));

    }

    public function destroy(User $user)
    {
        $this->uploaderService->deleteFile($user->image);
        $user->delete();
        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }

    public function calendar()
    {
        return view('admin.calendar');
    }

    public function vacationsBalance(User $user)
    {
        $this->vacationRepository->vacationsBalance($user);
    }
}
