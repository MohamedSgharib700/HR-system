<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Services\ImportUserTransactionInterface;
use Illuminate\Routing\Redirector as RedirectorAlias;
use View;
use Illuminate\Http\Request;

class UsersImportController extends BaseController
{

    protected $importFromFile;

    public function __construct(ImportUserTransactionInterface $importFromFile)
    {
        $this->importFromFile = $importFromFile;
    }


    /**
     * Show the form for creating a new resource.
     * @param User $user
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {

        return View::make('admin.users.import.create', []);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|RedirectorAlias
     */
    public function store(Request $request)
    {
        $this->importFromFile->process($request);
        return redirect()->back()->with('success', trans('item_deleted_successfully'));

    }

}
