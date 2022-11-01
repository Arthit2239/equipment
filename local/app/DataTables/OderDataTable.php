<?php

namespace App\DataTables;

use App\Models\Oder;
use App\Models\Equipment;
use App\Models\Member;
use App\Util\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OderDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->editColumn('id', function ($data) {
                $result["type"] = 'hidden';
                $result["name"] = 'id[]';
                $result["id"] = 'id';
                $result["value"] = $data->id;
                return View::make("components.input-text", $result)->render() . $data->id;
            })
            ->editColumn('equ_id', function ($data) {
                $query = Equipment::where("id", "=", $data->equ_id)->first();

                $result["type"] = 'hidden';
                $result["name"] = 'equ_id[]';
                $result["id"] = 'equ_id';
                $result["value"] = $data->equ_id;

                return View::make("components.input-text", $result)->render() . $query->equ_name;
            })
            ->editColumn('m_id', function ($data) {
                $query = Member::where("id", "=", $data->m_id)->first();
                return $query->m_username;
            })
            ->editColumn('oder_total', function ($data) {
                $query = Equipment::where("id", "=", $data->equ_id)->first();
                $result["type"] = 'hidden';
                $result["name"] = 'oder_total[]';
                $result["id"] = 'oder_total';
                $result["value"] = $data->oder_total;

                $result2["type"] = 'hidden';
                $result2["name"] = 'quantity[]';
                $result2["id"] = 'quantity';
                $result2["value"] = $query->quantity;

                $output = '';
                $output .= View::make("components.input-text", $result)->render();
                $output .= View::make("components.input-text", $result2)->render();
                $output .= $data->oder_total;

                return $output;
            })
            ->editColumn('oder_status', function ($data) {
                if (Helper::guard('member', 'status') == "admin") {
                    $result["class"] = 'form-control edit';
                    $result["name"] = 'oder_status[]';
                    $result["id"] = 'oder_status';
                    $result["option"] = '<option value="Y" ' . ($data->oder_status == "Y" ? "selected" : "") . '>อนุมัติ</option>
                    <option value="N" ' . ($data->oder_status == "N" ? "selected" : "") . '>ไม่อนุมัติ</option>
                    <option value="W" ' . ($data->oder_status == "W" ? "selected" : "") . '>รออนุมัติ</option>';
                    $result["readonly"] = 'readonly';
                    $output = View::make("components.select-option", $result)->render();
                } else {
                    switch (Helper::CheckValue($data, 'oder_status')) {
                        case 'Y':
                            $output = "<p class='text-success'>อนุมัติ</p>";
                            break;
                        case 'N':
                            $output = "<p class='text-danger'>ไม่อนุมัติ</p>";
                            break;
                        case 'W':
                            $output = "<p class='text-warning'>รออนุมัติ</p>";
                            break;
                    }
                }

                return $output;
            })
            ->editColumn('picture', function ($data) {
                $query = Equipment::find($data->equ_id);
                if (!empty($query->picture)) {
                    $result["file"] = "$query->path$query->picture";
                    return View::make("components.column-image", $result)->render();
                } else {
                    return '<i class="fa fa-picture-o" aria-hidden="true"></i>';
                }
            })
            ->editColumn('oder_date', function ($data) {
                return date("d/m/Y H:i:s", strtotime($data->created_at)) . " น.";
            })
            ->addColumn('action', function ($data) {
                $data["url_edit"] = route('oder.edit', $data->id);
                $data["url_option"] = route('oder.copy', $data->id);
                $data["url_delete"] = "oder/" . $data->id;
                return View::make("components.column-action", $data)->render();
            })
            ->rawColumns(['id', 'oder_id', 'equ_id', 'm_id', 'oder_total', 'oder_status', 'oder_date', 'picture', 'action']);
    }

    public function query(Request $request)
    {
        if (Helper::guard('member', 'status') == "admin") {
            return Oder::selectRaw('*');
        } else {
            return Oder::selectRaw('*')->where("m_id", Helper::guard('member', 'id'));
        }
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('data-table')
            ->columns($this->getColumns());
    }

    protected function getColumns()
    {
        return [
            ['data' => 'id', 'className' => 'text-center', 'title' => '#'],
            ['data' => 'oder_id', 'className' => 'text-center', 'title' => 'รหัสการเบิก'],
            ['data' => 'equ_id', 'className' => 'text-center', 'title' => 'ชื่ออุปกรณ์'],
            ['data' => 'picture', 'className' => 'text-center', 'title' => 'รูป'],
            ['data' => 'oder_total', 'className' => 'text-center', 'title' => 'จำนวน'],
            ['data' => 'm_id', 'className' => 'text-center', 'title' => 'คนที่เบิก'],
            ['data' => 'oder_date', 'className' => 'text-center', 'title' => 'วันที่-เวลา'],
            ['data' => 'oder_status', 'className' => 'text-center', 'title' => 'สถานะ'],
            ['data' => 'action', 'className' => 'text-center', "width" => 150, 'title' => 'จัดการ'],
        ];
    }

    protected function filename(): string
    {
        return 'Oder_' . date('YmdHis');
    }
}
