<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Auth;


class DashboardController extends Controller
{
	protected $category;
    public function __construct(Category $category)
    {
    	$this->category = $category;
    }

    public function index()
    {
   		$user = Auth::user();
   		$categories = $this->category->all();
   		$data = [
   			'user' => $user,
   			'categoryCount' => $categories->count()
   		];
    	return view('backend.dashboard')->with($data);
    }
}
