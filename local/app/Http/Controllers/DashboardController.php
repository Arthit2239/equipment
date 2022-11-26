<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Util\Helper;
use App\Models\Dashbord;
use App\Models\Report;
class DashboardController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('guest');
        //$this->middleware('guest:member');
    }

    public function index()
    {
        //$this->middleware('auth');

        $members = Helper::QueryCountTable('members');
        $equipment = Helper::QueryCountTable('equipment');
        $oder = Helper::QueryCountTable('oder');
        $report = Helper::QueryCountTable('report');

        $data["count"] = array(
            "members" => number_format($members),
            "equipment" => number_format($equipment),
            "oder" => number_format($oder),
            "report" => number_format($report)
        );

        $data["dashboard"] = Dashbord::all();

        return view('dashboard.index', $data);
    }
}
