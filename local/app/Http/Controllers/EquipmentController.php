<?php

namespace App\Http\Controllers;

use App\DataTables\EquipmentDataTable;
use App\Models\Equipment;
use App\Util\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class EquipmentController extends Controller
{
    public function index(EquipmentDataTable $dataTable)
    {
        return $dataTable->render('equipment.index');
    }

    public function create(Request $request)
    {
        $data = array();
        $data["user_id"] = Helper::guard('member', 'id');
        $data["data"] = Equipment::orderBy('id', 'desc')->first();
        $data["equ_id"] = Str::random(10);
        return view('equipment.create', $data);
    }

    public function store(Request $request)
    {
        $image_name = Helper::uploadImage($request, 'equipment');
        $_array = $request->all();
        unset($_array["_token"]);
        unset($_array["update"]);
        unset($_array["image"]);

        if (!empty($image_name)) {
            $array = array_merge($_array, ["picture" => $image_name]);
        } else {
            $array = $_array;
        }

        if (Helper::CheckInsert('equipment', 'equ_name', $request->equ_name) == "error") {
            return Redirect::back()->withError('ข้อมูล ' . $request->equ_name . ' มีอยู่แล้ว กรุณาเพิ่มข้อมูลใหม่อีกครั้ง!');
        }

        return Helper::Insert('equipment', $array, 'เพิ่มข้อมูลสำเร็จ');
    }

    public function show($id)
    {
        $data["data"] = Equipment::find($id);
        return view('equipment.detail', $data);
    }

    public function edit($id)
    {
        $data["data"] = Equipment::find($id);
        return view('equipment.edit', $data);
    }

    public function update($id, Request $request)
    {
        $image_name = Helper::uploadImage($request, 'equipment');
        $_array = $request->all();
        unset($_array["_token"]);
        unset($_array["update"]);
        unset($_array["_method"]);
        unset($_array["image"]);

        if (!empty($image_name)) {
            $array = array_merge($_array, ["picture" => $image_name]);
        } else {
            $array = $_array;
        }

        return Helper::Update('equipment', 'id', $id, $array, 'อัพเดตข้อมูลสำเร็จ');
    }

    public function updatearray(Request $request)
    {
        for ($i = 0; $i < count($request->id); $i++) {
            Equipment::where('id', $request->id[$i])
                ->update([
                    'equ_name' => $request->equ_name[$i],
                    'equ_details' => $request->equ_details[$i],
                    'quantity' => $request->quantity[$i],
                ]);
        }

        return Response::json([
            'status' => "success",
            "message" => "แก้ไขข้อมูลเรียบร้อย"
        ]);
    }

    public function getmodal(Request $request)
    {
        $data = Equipment::find($request->id);

        $title = 'จำนวนอุปกรณ์ที่ต้องการเบิก';

        $detail = '';
        $detail .= '<div class="form-group row">
            <div class="col-sm-12">
                <input type="hidden" name="Flag" id="Flag" value="insertOder">
                <input type="hidden" name="oder_id" id="oder_id" value="' . Str::random(12) . '">
                <input type="hidden" name="equ_id" id="equ_id" value="' . $data->id . '">
                <input type="hidden" name="m_id" id="m_id" value="' . Helper::guard('member', 'id') . '">
                <input type="hidden" name="oder_date" id="oder_date" value="' . date("Y-m-d") . '">
                <input type="number" class="form-control" name="oder_total" id="oder_total">
            </div>';

        return Response::json([
            'status' => "success",
            "message" => "เรียกข้อมูลสำเร็จ",
            "title" => $title,
            "detail" => $detail,
        ]);
    }

    public function savemodal(Request $request)
    {
        $array = $request->all();
        unset($array["_token"]);
        unset($array["update"]);
        unset($array["_method"]);

        if ($request->Flag == "insertOder") {
            unset($array["Flag"]);
            $equ = Equipment::find($request->equ_id);

            if ((int)$equ->quantity - (int)$request->oder_total < 0) {
                return Redirect::back()->withError('จำนวนอุปกรณ์คงเหลือไม่พอ กรุณาเลือกใหม่อีกครั้ง');
            } else {
                //$array2 = array();
                //$array2["quantity"] = (int)$request->quantity - (int)$equ->oder_total;

                //if (Helper::Update('equipment', 'id', $equ->id, $array2) == "success") {
                    return Helper::Insert('oder', $array, 'เบิกอุปกรณ์สำเร็จ โปรดรอการอนุมัติจากแอดมิน');
                //} else {
                    //eturn Redirect::back()->withError('เกิดข้อผิดพลาด กรุณาแจ้งผู้ดูแลระบบ');
                //}
            }
        }
    }

    public function copy($id)
    {
        $clone = Helper::QueryFirstTable('equipment', '*', array(['id', $id]));
        return Helper::Copy('equipment', $clone, 'คัดลอกข้อมูลสำเร็จ');
    }

    public function destroy($id)
    {
        return Helper::Delete('equipment', $id, 'ลบข้อมูลสำเสร็จ');
    }
}
