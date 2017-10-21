<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;


class DashboardController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
   		$user = Auth::user();
   		$data = ['user' => $user];
    	return view('backend.dashboard')->with($data);
    }
}
