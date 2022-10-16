<?php

namespace App\Http\Controllers;

use App\DataTables\OderDataTable;
use App\Models\Oder;
use App\Models\Equipment;
use App\Models\Member;
use App\Util\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class OderController extends Controller
{
    public function index(OderDataTable $dataTable)
    {
        return $dataTable->render('oder.index');
    }

    public function create(Request $request)
    {
        $data = array();
        $data["user_id"] = Helper::guard('member', 'id');
        $data["oder_id"] = Str::random(12);
        return view('oder.create', $data);
    }

    public function store(Request $request)
    {
        $array = $request->all();
        unset($array["_token"]);
        unset($array["update"]);

        if (Helper::CheckInsert('oder', 'oder_id', $request->oder_id) == "error") {
            return Redirect::back()->withError('ข้อมูล ' . $request->oder_id . ' มีอยู่แล้ว กรุณาเพิ่มข้อมูลใหม่อีกครั้ง!');
        }

        return Helper::Insert('oder', $array, 'เพิ่มข้อมูลสำเร็จ');
    }

    public function show($id)
    {
        $data["data"] = Oder::find($id);
        return view('oder.detail', $data);
    }

    public function edit($id)
    {
        $data["data"] = Oder::find($id);
        $data["equ"] = Equipment::where('id', $data["data"]->equ_id)->first();
        $data["member"] = Member::where("id", "=", $data["data"]->m_id)->first();

        $data["oder_date"] = date('d/m/Y', strtotime($data["data"]->oder_date));
        $data["status_y"] = $data["data"]->status = "Y" ? "selected" : "";
        $data["status_n"] = $data["data"]->status = "N" ? "selected" : "";
        $data["status_w"] = $data["data"]->status = "W" ? "selected" : "";

        return view('oder.edit', $data);
    }

    public function update($id, Request $request)
    {
        $array = $request->all();
        unset($array["_token"]);
        unset($array["update"]);
        unset($array["_method"]);

        if ($request->oder_status == "N") {
            $array2 = array();
            $array2["quantity"] = (int)$request->quantity + (int)$request->oder_total;
            Helper::Update('equipment', 'id', $request->equ_id, $array2);
        }

        if ($request->oder_status == "Y") {
            $array2 = array();
            $array2["quantity"] = (int)$request->quantity - (int)$request->oder_total;
            Helper::Update('equipment', 'id', $request->equ_id, $array2);
        }

        return Helper::Update('oder', 'id', $id, $array, 'อัพเดตข้อมูลสำเร็จ');
    }

    public function updatearray(Request $request)
    {
        for ($i = 0; $i < count($request->id); $i++) {
            Oder::where('id', $request->id[$i])
                ->update([
                    'oder_total' => $request->oder_total[$i],
                    'oder_status' => $request->oder_status[$i]
                ]);

            if ($request->oder_status[$i] == "Y") {
                Equipment::where('id',  $request->equ_id[$i])
                    ->update([
                        'quantity' => (int)$request->quantity[$i] - (int)$request->oder_total[$i]
                    ]);
            }

            if ($request->oder_status[$i] == "N") {
                Equipment::where('id',  $request->equ_id[$i])
                    ->update([
                        'quantity' => (int)$request->quantity[$i] + (int)$request->oder_total[$i]
                    ]);
            }
        }

        return Response::json([
            'status' => "success",
            "message" => "แก้ไขข้อมูลเรียบร้อย"
        ]);
    }

    public function copy($id)
    {
        $clone = Helper::QueryFirstTable('oder', '*', array(['id', $id]));
        return Helper::Copy('oder', $clone, 'คัดลอกข้อมูลสำเร็จ');
    }

    public function destroy($id)
    {
        return Helper::Delete('oder', $id, 'ลบข้อมูลสำเสร็จ');
    }
}
