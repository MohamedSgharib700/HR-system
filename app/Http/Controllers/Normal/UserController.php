<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Services\UserService;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Response;
use View;
use Illuminate\Http\Request;

class UserController extends BaseController
{

    protected $userService;
    protected $userRepository;

    public function __construct(UserService $userService, UserRepository $userRepository)
    {
        $this->authorizeResource(User::class, "user");
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $this->authorize("index", User::class);
        $list = $this->userRepository->getNormalUsers(request())->paginate(10);
        $list->appends(request()->all());
        return View::make('normal.staff.index', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $normals = normal::where('active', 1)->get();
        return View::make('normal.staff.create', ['normals' => $normals]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $this->userService->fillFromRequest($request);
        return redirect(route('normal.staff.index'))->with('success', trans('item_added_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        $normals = normal::where('active', 1)->get();
        return View::make('normal.staff.edit', ['user' => $user, 'normals' => $normals]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return Response
     */
    public function update(UserRequest $request, User $user)
    {
        $this->userService->fillFromRequest($request, $user);

        return redirect(route('normal.staff.index'))->with('success', trans('item_updated_successfully'));
    }

    /**
     *
     * @param User $user
     * @return Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Item Deleted Successfully');
    }

}
