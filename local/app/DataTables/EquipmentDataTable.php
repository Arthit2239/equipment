<?php

namespace App\DataTables;

use App\Models\Equipment;
use App\Models\Oder;
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

class EquipmentDataTable extends DataTable
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
                return View::make("components.input-text", $result)->render() . $data->rownum;
            })
            // ->editColumn('equ_id', function ($data) {
            //     $result["type"] = 'text';
            //     $result["class"] = 'form-control edit';
            //     $result["name"] = 'equ_id[]';
            //     $result["id"] = 'equ_id';
            //     $result["value"] = $data->equ_id;
            //     $result["readonly"] = 'readonly';
            //     return View::make("components.input-text", $result)->render();
            // })
            ->editColumn('equ_name', function ($data) {
                $result["type"] = 'text';
                $result["class"] = 'form-control edit';
                $result["name"] = 'equ_name[]';
                $result["id"] = 'equ_name';
                $result["value"] = $data->equ_name;
                $result["readonly"] = 'readonly';
                return View::make("components.input-text", $result)->render();
            })
            ->editColumn('equ_details', function ($data) {
                $result["type"] = 'text';
                $result["class"] = 'form-control edit';
                $result["name"] = 'equ_details[]';
                $result["id"] = 'equ_details';
                $result["value"] = $data->equ_details;
                $result["readonly"] = 'readonly';
                return View::make("components.input-text", $result)->render();
            })
            ->editColumn('quantity', function ($data) {
                if ($data->quantity <= 0) {
                    return '<input type="number" name="quantity[]" id="quantity" class="form-control edit" value="0" readonly>';
                } else {
                    $result["type"] = 'number';
                    $result["class"] = 'form-control edit';
                    $result["name"] = 'quantity[]';
                    $result["id"] = 'quantity';
                    $result["value"] = $data->quantity;
                    $result["readonly"] = 'readonly';
                    return View::make("components.input-text", $result)->render();
                }
            })
            ->addColumn('oder_status', function ($data) {
                //$oder = Oder::where("equ_id", "=", $data->id)->orderBy('id', 'desc')->first();

                //if (Helper::guard("member", "id") == Helper::CheckValue($oder, 'm_id')) {
                if ($data->quantity <= 0) {
                    return "<p class='text-danger'>????????????????????????????????????</p>";
                } else {
                    return "<p class='text-success'>???????????????????????????</p>";
                    // switch (Helper::CheckValue($oder, 'oder_status')) {
                    //     case 'Y':
                    //         return "<p class='text-success'>?????????????????????</p>";
                    //         break;
                    //     case 'N':
                    //         return "<p class='text-danger'>??????????????????????????????</p>";
                    //         break;
                    //     case 'W':
                    //         return "<p class='text-warning'>???????????????????????????</p>";
                    //         break;
                    // }
                }
                //} else {
                return "<p class='text-primary'>??????????????????</p>";
                //}
            })
            ->editColumn('picture', function ($data) {
                if (!empty($data->picture)) {
                    $result["file"] = "$data->path$data->picture";
                    return View::make("components.column-image", $result)->render();
                } else {
                    return '<i class="fa fa-picture-o" aria-hidden="true"></i>';
                }
            })
            ->addColumn('action', function ($data) {
                if (Helper::guard('member', 'status') == "admin") {
                    $data["url_edit"] = route('equipment.edit', $data->id);
                    $data["url_copy"] = "#";
                    $data["url_option"] = route('equipment.copy', $data->id);
                    $data["url_delete"] = "equipment/" . $data->id;
                } else {
                    if ($data->quantity > 0) {
                        $data["url_text"] = "????????????";
                        $data["url_modal"] = route('equipment.modal', $data->id);
                    }
                }
                return View::make("components.column-action", $data)->render();
            })
            ->rawColumns(['id', 'equ_id', 'equ_name', 'equ_details', 'quantity', 'picture', 'oder_status', 'action']);
    }

    public function query(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        return Equipment::selectRaw('*,@rownum  := @rownum  + 1 AS rownum');
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
            ['data' => 'picture', 'className' => 'text-center', 'title' => '?????????'],
            ['data' => 'equ_id', 'className' => 'text-center', 'title' => '????????????'],
            ['data' => 'equ_name', 'className' => 'text-center', 'title' => '?????????????????????????????????'],
            ['data' => 'equ_details', 'className' => 'text-center', 'title' => '???????????????????????????????????????????????????'],
            ['data' => 'quantity', 'className' => 'text-center', 'title' => '?????????????????????'],
            ['data' => 'oder_status', 'className' => 'text-center', 'title' => '???????????????'],
            ['data' => 'action', 'className' => 'text-center', "width" => 150, 'title' => '??????????????????'],
        ];
    }

    protected function filename(): string
    {
        return 'Equipment_' . date('YmdHis');
    }
}
