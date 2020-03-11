<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\BaseController;
use Illuminate\Routing\Controller;
use View;

class HomeController extends BaseController
{
    public function index()
    {
        return View::make('normal.home.index');
    }
    
}
