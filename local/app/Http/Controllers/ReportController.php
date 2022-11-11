<?php

namespace App\Http\Controllers;

use App\Models\Oder;
use App\Models\Equipment;
use App\Models\Member;
use App\Models\User;
use App\Util\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        $query = Equipment::orderBy('id', 'desc')->get();
        $data['equipment'] = '';
        $data['equipment'] .= '<option value="">เลือกอุปกรณ์</option>';
        foreach ($query as $value) {
            $data['equipment'] .= '<option value="' . $value->id . '">' . $value->equ_name . '</option>';
        }

        return view('report.index', $data);
    }

    public function genpdf(Request $request)
    {
        $order = Oder::selectRaw('*');
        if ($request->equ_id) {
            $order = $order->where('equ_id', $request->equ_id);
        }

        if ($request->oder_status) {
            $order = $order->where('oder_status', $request->oder_status);
        }

        if ($request->oder_date) {
            $order = $order->where('oder_date', $request->oder_date);
        }

        $order = $order->orderBy('created_at','desc')->get();
        $pdf = PDF::loadView('report.genpdf', ['order' => $order]);
        return $pdf->download('รายงานเบิกอุปกรณ์.pdf');
    }

    public function genexcel()
    {
        return '';
    }
}
