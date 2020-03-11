<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Repositories\UserRepository;

use Illuminate\Http\Request;
use View;
class HomeController extends BaseController
{

    protected $userRepository;



    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

    }

    public function index()
    {

        
        return View::make('admin.home.index', [ ]);
    }
}
