<?php

namespace App\Http\Controllers;

use App\Models\Admin\Destination\Destination;
use App\Models\Admin\Package\PackageCategory;
use App\Models\Admin\Page\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countPage = Page::all()->count();
        $countDestination = Destination::all()->count();
        $countCategories = PackageCategory::all()->count();
        return view('admin.home', [
            'activePage'=>'dashboard',
            'countPage'=>$countPage,
            'countDestination'=>$countDestination,
            'countCategories'=>$countCategories,
        ]);
    }
}
