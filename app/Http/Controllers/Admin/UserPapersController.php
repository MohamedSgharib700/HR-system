<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Services\UploaderService;
use App\Http\Services\UserPaperService;
use App\Models\User;
use App\Models\UserPaper;
use App\Repositories\UserPaperRepository;
use Illuminate\Routing\Redirector as RedirectorAlias;
use View;
use Illuminate\Http\Request;

class UserPapersController extends BaseController
{

    protected $userPaperService;
    private $userPaperRepository;
    private $uploaderService;

    public function __construct(UserPaperService $userPaperService, UserPaperRepository $userPaperRepository, UploaderService $uploaderService)
    {
        $this->userPaperService = $userPaperService;
        $this->userPaperRepository = $userPaperRepository;
        $this->uploaderService = $uploaderService;
    }


    /**
     * Display a listing of the resource.
     * @param User $user
     * @return \Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(User $user)
    {
        $list = $user->papers;
        return View::make('admin.users.papers.index', ['list' => $list, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     * @param User $user
     * @return \Illuminate\Contracts\View\View
     */
    public function create(User $user)
    {

        return View::make('admin.users.papers.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|RedirectorAlias
     */
    public function store(Request $request, User $user)
    {
        $this->userPaperService->fillFromRequest($request, $user);
        return redirect(route('admin.user.papers.index', ['user' => $user->id]))
            ->with('success', trans('item_added_successfully'));
    }


    /**
     * @param User $user
     * @param Paper $paper
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user, UserPaper $paper)
    {
        $this->uploaderService->deleteFile($paper->image);
        $paper->delete();
        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }
}
