<?php

namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMyPlanController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       return view('modules.myplan.index');
    }
}
