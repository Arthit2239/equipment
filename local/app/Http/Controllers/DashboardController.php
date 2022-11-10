<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Util\Helper;
use App\Models\Anime;
use App\Models\AnimeSub;
use App\Models\Female;
use App\Models\Male;
use App\Models\Ranking;
use App\Models\Dashbord;
use App\Models\Watching;

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
        $oder = Helper::QueryCountTable('oder', [["m_id", Helper::guard("member", "id")]]);

        $data["count"] = array(
            "members" => number_format($members),
            "equipment" => number_format($equipment),
            "oder" => number_format($oder),
            "report" => number_format($oder)
        );

        $data["dashboard"] = Dashbord::all();

        return view('dashboard.index', $data);
    }
}
