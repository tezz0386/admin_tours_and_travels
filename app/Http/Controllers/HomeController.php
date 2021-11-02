<?php

namespace App\Http\Controllers;

use App\Models\Admin\Destination\Destination;
use App\Models\Admin\Package\Package;
use App\Models\Admin\Package\PackageCategory;
use App\Models\Admin\Page\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;
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
        $countPackage = Package::all()->count();
        $thisMonth = DB::table('shetabit_visits')->whereMonth('created_at', date('m'))
                        ->whereYear('created_at', date('Y'))
                        ->get()->count();
        return view('admin.home', [
            'activePage'=>'dashboard',
            'countPage'=>$countPage,
            'countDestination'=>$countDestination,
            'countCategories'=>$countCategories,
            'countPackage'=>$countPackage,
            'countVisitors'=>$thisMonth,
            'data'=>$this->getYearsData(),
        ]);
    }
    public function getYearsData()
    {
        $jan = DB::table('shetabit_visits')->whereMonth('created_at', 1)
                        ->whereYear('created_at', date('Y'))
                        ->get()->count();
        $feb = DB::table('shetabit_visits')->whereMonth('created_at', 2)
                        ->whereYear('created_at', date('Y'))
                        ->get()->count();
        $mar = DB::table('shetabit_visits')->whereMonth('created_at', 3)
                        ->whereYear('created_at', date('Y'))
                        ->get()->count();
        $apr = DB::table('shetabit_visits')->whereMonth('created_at', 4)
                        ->whereYear('created_at', date('Y'))
                        ->get()->count();
        $may = DB::table('shetabit_visits')->whereMonth('created_at', 5)
                        ->whereYear('created_at', date('Y'))
                        ->get()->count();
        $jun = DB::table('shetabit_visits')->whereMonth('created_at', 6)
                        ->whereYear('created_at', date('Y'))
                        ->get()->count();

        $jul = DB::table('shetabit_visits')->whereMonth('created_at', 7)
                        ->whereYear('created_at', date('Y'))
                        ->get()->count();
        $aug = DB::table('shetabit_visits')->whereMonth('created_at', 8)
                        ->whereYear('created_at', date('Y'))
                        ->get()->count();
        $sep = DB::table('shetabit_visits')->whereMonth('created_at', 9)
                        ->whereYear('created_at', date('Y'))
                        ->get()->count();
        $oct = DB::table('shetabit_visits')->whereMonth('created_at', 10)
                        ->whereYear('created_at', date('Y'))
                        ->get()->count();
        $nov = DB::table('shetabit_visits')->whereMonth('created_at', 11)
                        ->whereYear('created_at', date('Y'))
                        ->get()->count();
        $dec = DB::table('shetabit_visits')->whereMonth('created_at', 12)
                        ->whereYear('created_at', date('Y'))
                        ->get()->count();
        $data = [$jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec];
        return $data;
    }
    public function getTest()
    {
        return view('admin.test', [
            'activePage'=>'',
            'page'=>'',
        ]);
    }
    public function postTest(Request $request)
    {
        $date = $request->date;
        echo $request->date."<br>";
        echo date('Y-m-d', strtotime($date. ' + 1 days'));


    }
}
