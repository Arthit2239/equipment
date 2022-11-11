<?php

namespace App\Util;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Schema;

class Helper
{
    //ฟังก์ชันแปลง string table => Models
    public static function tables($table)
    {
        if (class_exists($table)) {
            return $table;
        } else {
            return config('table-models')['tables'][$table];
        }
    }

    //ฟังก์ชันเช็คค่าฟิลที่แสดงผล
    public static function echoField($value, $field)
    {
        if (!empty($field)) {
            if (!empty($value)) {
                return $value->$field;
            }
        } else {
            return $value;
        }
    }

    //ฟังก์ชัน Query ข้อมูล 1 Row
    public static function QueryFirstTable($table, $select, $where = null, $orderby = null, $limit = null, $groupby = null)
    {
        $data = Helper::tables($table)::selectRaw($select);

        if (!empty($where)) {
            $data = $data->where($where);
        }

        if (!empty($orderby)) {
            $data = $data->orderbyRaw($orderby);
        }

        if (!empty($limit)) {
            $data = $data->limit($limit);
        }

        if (!empty($groupby)) {
            $data = $data->groupByRaw($groupby);
        } else {
            $data = $data->first();
        }

        return $data;
    }

    //ฟังก์ชัน Query Find และ เลือกฟิลที่จะแสดงข้อมูล
    public static function QueryFindTable($table, $id, $field = null)
    {
        return Helper::echoField(Helper::tables($table)::find($id), $field);
    }

    //ฟังก์ชัน Query ข้อมูล 1 Row และ เลือกฟิลที่จะแสดงข้อมูล
    public static function QueryWhereTable($table, $where, $id, $field = null)
    {
        return Helper::echoField(Helper::tables($table)::where($where, $id)->first(), $field);
    }

    //ฟังก์ชัน Query ข้อมูลทั้งหมด
    public static function QueryAllTable($table, $select, $where = null, $orderby = null, $limit = null, $groupby = null)
    {
        $data = Helper::tables($table)::selectRaw($select);

        if (!empty($where)) {
            $data = $data->where($where);
        }

        if (!empty($orderby)) {
            $data = $data->orderbyRaw($orderby);
        }

        if (!empty($limit)) {
            $data = $data->limit($limit);
        }

        if (!empty($groupby)) {
            $data = $data->groupByRaw($groupby);
        }

        $data = $data->get();

        return $data;
    }

    //ฟังก์ชันนับจำนวนข้อมูล
    public static function QueryCountTable($table, $where = null, $field = null)
    {
        if (!empty($where)) {
            return Helper::tables($table)::where($where)->count();
        } elseif (!empty($where) && !empty($field)) {
            return Helper::tables($table)::where($where)->count($field);
        } else {
            return Helper::tables($table)::count();
        }
    }

    //ฟังก์ชัน sum ผลรวมข้อมูล
    public static function QuerySumTable($table, $where = null, $field = null)
    {
        if (!empty($where) && !empty($field)) {
            return Helper::tables($table)::where($where)->sum($field);
        } else {
            return Helper::tables($table)::sum($field);
        }
    }

    //ฟังก์ชัน Query ฟิลข้อมูล
    public static function Getdata($table, $where, $idwhere, $field)
    {
        $result = Helper::tables($table)::where($where, $field)->get();
        foreach ($result as $objResult) {
            $re = $objResult->{$field};
        }

        return $re;
    }

    //ฟังก์ชัน Query ฟิลข้อมูลทั้งหมด
    public static function Getalldata($table, $field, $where, $sql = null)
    {
        if (!empty($sql)) {
            $data = Helper::fetchArray(DB::select($sql));
        } else {
            $data = Helper::fetchArray(Helper::tables($table)::where($field, $where)->get());
        }

        return $data;
    }

    //ฟังก์ชันเช็คคอลัมณ์ฟิลตาราง
    public static function CheckColumns($dArray, $table)
    {
        $fields = (DB::getSchemaBuilder()->getColumnListing($table));
        foreach ($dArray as $key => $value) {
            return in_array($key, $fields);
        }
    }

    //ฟังก์ชันแปลง Oject เป็น Array แบบมี index
    public static function fetchArray($result)
    {
        return $result = array_map(function ($value) {
            return (array) $value;
        }, $result);
    }

    //ฟังก์ชันแปลง Oject เป็น Array แบบไม่มี index
    public static function fetchOfArray($array)
    {
        foreach ($array as $object) {
            $arrays = (array) $object;
        }

        return $arrays;
    }

    //ฟังก์ชันแปลง Array เป็น Oject
    public static function fetchObject($array)
    {
        foreach ($array as $key => $value) {
            return $value;
        }
    }

    //ฟังก์ชันแสดง Index Table
    public static function GetDataIndex($op)
    {
        $strSQL = $op["strSql"];
        $objQuery = DB::select($strSQL) or die("Error Query [" . $op["strSql"] . "]");
        foreach ($objQuery as $objResult) {
            $objResult = (array) $objResult;
            $re[$objResult[$op["ID"]]] = $objResult[$op["fName"]];
        }

        return $re;
    }

    //ฟังก์ชันแสดงนับจำนวนแถวของตาราง
    public static function GetNumRow($table, $where, $idwhere, $mysql)
    {
        $c = 0;
        if ($mysql == null) {
            $strSQL = "SELECT * FROM $table WHERE $where = '$idwhere' ;";
        } else {
            $strSQL = $mysql;
        }
        $objQuery = DB::select(($strSQL));
        $num = count($objQuery);

        return $num;
    }

    //ฟังก์ชันเช็คค่าว่างข้อมูล ก่อนทำ str_replace
    public static function CheckReplace($replaceOld, $replaceNew, $data)
    {
        if (!empty($data)) {
            return str_replace($replaceOld, $replaceNew, $data);
        }
    }

    //ฟังก์ชันเช็คค่าว่างข้อมูล ก่อนทำ number_format
    public static function CheckNumberFormat($data)
    {
        if (empty($data) || gettype($data) == 'string') {
            $total = number_format(0);
        } else {
            $total = number_format($data);
        }

        return $total;
    }

    //ฟังก์ชันเช็คข้อมูลวันที่ 0000-00-00 และ 0000-00-00 00:00:00
    public static function CheckDate($array)
    {
        $checkArray = array_replace(
            $array,
            array_fill_keys(
                array_keys($array, '0000-00-00'),
                null,
            ),
            array_fill_keys(
                array_keys($array, '0000-00-00 00:00:00'),
                null,
            )
        );
        return $checkArray;
    }

    //ฟังก์ชันเช็คค่าว่างตัวแปร ไม่มี Object
    public static function CheckVal($val)
    {
        if (!empty($val)) {

            return $val;
        }
    }

    //ฟังก์ชันเช็คค่าว่างตัวแปร Object
    public static function CheckValue($value, $val)
    {
        if (!empty($value)) {

            return $value->$val;
        }
    }

    //ฟังก์ชันเช็คค่าว่างตัวแปร 2 Object
    public static function CheckWithValue($value, $val, $v)
    {
        if (!empty($value->$val)) {

            return $value->$val->$v;
        }
    }

    //ฟังก์ชันแปลงวันที่เวลา และ เช็คค่าว่างตัวแปร Object
    public static function ObjectDate($shortdate = null, $convert = null, $value = null, $val = null, $v = null)
    {
        if (empty($value)) {
            $data = null;
        } elseif (empty($value->$val)) {
            $data = null;
        } elseif (!empty($value) && empty($val) && empty($v)) {
            $data = date($shortdate, strtotime($value));
        } elseif (!empty($value) && !empty($val) && empty($v)) {
            $data = date($shortdate, strtotime($value->$val));
        } elseif (!empty($value) && !empty($val) && !empty($v)) {
            $data = date($shortdate, strtotime($value->$val->$v));
        }

        $date = Helper::DateTimeThai(date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $data))));

        if ($data == '01/01/1970' || empty($data)) {
            return null;
        } elseif (!empty($convert) && $data != '01/01/1970') {
            return $date[$convert];
        } else {
            return $data;
        }
    }

    //ฟังก์ชันเช็คค่าว่างตัวแปร Array
    public static function CheckArray($value, $val)
    {
        if (!empty($value[$val])) {

            return $value[$val];
        }
    }

    //ฟังก์ชันแปลงวันที่เวลา และ เช็คค่าว่างตัวแปร Array
    public static function ArrayDate($shortdate = null, $convert = null, $value = null, $val = null)
    {
        if (empty($value)) {
            $data = null;
        } elseif (empty($value[$val])) {
            $data = null;
        } elseif (!empty($value[$val])) {
            $data = date($shortdate, strtotime($value[$val]));
        }

        $date = Helper::DateTimeThai(date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $data))));

        if ($data == '01/01/1970' || empty($data)) {
            return null;
        } elseif (!empty($convert) && $data != '01/01/1970') {
            return $date[$convert];
        } else {
            return $data;
        }
    }

    //ฟังก์ชันเช็คชนิดตัวแปรเช็คค่าว่าง ก่อน explode
    public static function ArrayExplode($value, $c)
    {
        if (empty($value) or strstr($value, $c) == "false") {
            return [$value];
        } else {
            return explode($c, $value);
        }
    }

    //ฟังก์ชันเช็คชนิดตัวแปรเช็คค่าว่าง โดยใช้ข้อมูล Array ก่อน sum ผลรวมของ Array
    public static function ArraySum($array)
    {
        if (empty($array) or strstr($array, ',') == "false") {
            $data = [$array];
        } else {
            $data_array = Helper::ArrayExplode($array, ",");
            foreach ($data_array as $val) {
                $Darray[] = $val;
            }
            $data = array_sum($Darray);
        }

        return $data;
    }

    //ฟังก์ชันกรุุ๊ปข้อมูล 1 Array
    public static function GroupOneArray($table, $select, $where, $valuegroup)
    {
        $group = '';

        $array = Helper::QueryAllTable($table, $select, $where);
        foreach ($array as $value) {
            $group .= $value->$valuegroup . ",";
            $rtrim_data = rtrim($group, ',');
        }

        return $rtrim_data;
    }

    //ฟังก์ชันกรุุ๊ปข้อมูล 2 Array โดย Where เงื่อนไข จาก Array แรก
    public static function GroupTwoArray($table1, $select1, $table2, $select2, $where2, $field1, $value2group1, $value2group2)
    {
        $array1 = Helper::QueryAllTable($table1, $select1);

        foreach ($array1 as $value1) {
            $group = '';
            $array2 = Helper::QueryAllTable($table2, $select2, [[$where2, $value1->$field1]]);
            foreach ($array2 as $value2) {
                if (!empty($value2group1)) {
                    $group .= $value2->$value2group1 . "-" . $value2->$value2group2 . ",";
                } else {
                    $group .= $value2->$value2group2 . ",";
                }
            }

            $rtrim_data = rtrim($group, ',');
            $data[] = $rtrim_data;
        }

        return $data;
    }

    //ฟังก์ชันแสดง ID ล่าสุดของ Table
    public static function MaxId($table, $field)
    {
        $data = Helper::tables($table)::max($field);
        return $data + 1;
    }

    //ฟังก์ชันยืนยันข้อมูลว่าตรงกันไหม
    public static function ConfirmData($value1, $value2, $message = null)
    {
        if ($value1 != $value2) {
            return Helper::messageError($message);
        } else {
            return Helper::messageSuccess($message);
        }
    }

    //ฟังก์ชันเช็คข้อมูลซ้ำก่อน Insert
    public static function CheckInsert($table, $field, $data, $message = null)
    {
        $count = Helper::tables($table)::where($field, $data)->count();

        if ($count > 0) {
            return Helper::messageError($message);
        } else {
            return Helper::messageSuccess($message);
        }
    }

    //ฟังก์ชันเช็คข้อมูลเหมือนกันก่อน Update
    public static function CheckUpdate($table, $field, $data = null, $message = null)
    {
        //where("id", "!=", Helper::guard("member", 'id'))->
        if($data){
            $count = Helper::tables($table)::where($field, $data)->count();
        }else{
            $count = Helper::tables($table)::where($field)->count();
        }
        

        if ($count > 0) {
            return Helper::messageError($message);
        } else {
            return Helper::messageSuccess($message);
        }
    }

    //ฟังก์ชันเพิ่มข้อมูลโดยใช้ตัวแปร Array รูปแบบ SQL
    public static function AddData($Darray, $table)
    {
        $count = count($Darray);
        $i = 0;
        $j = 0;

        $strSQL = "INSERT INTO $table ";
        $strSQL .= "(";
        foreach ($Darray as $key => $value) {
            if (!empty($value) && $value != '0000-00-00' && $value != '0000-00-00 00:00:00' && $value != "0.00") {
                if ($i != 0) {
                    $strSQL .= ",";
                }
                $strSQL .= $key;
                $i++;
            }
        }
        $strSQL .= ")";
        $strSQL .= " VALUES ";
        $strSQL .= "(";
        foreach ($Darray as $key => $value) {
            if (!empty($value) && $value != '0000-00-00' && $value != '0000-00-00 00:00:00' && $value != "0.00") {
                if ($j != 0) {
                    $strSQL .= ",";
                }
                $strSQL .= "'" . trim($value) . "'";
                $j++;
            }
        }
        $strSQL .= ")";
        $objQuery = DB::statement($strSQL);
        if ($objQuery) {
            return true;
        } else {
            return false;
            $error = "ERROR [$strSQL] <br>";
            foreach ($Darray as $key => $value) {
                $error .= "$key => $value <br>";
            }
            echo $error;
        }
    }

    //ฟังก์ชันเพิ่มข้อมูลโดยใช้ตัวแปร Array รูปแบบ SQL และสร้าง AutoMaxId
    public static function AddDataAutoMaxId($Darray, $table, $fildMaxid)
    {
        $count = count($Darray);
        $i = 0;
        $j = 0;

        $strSQL = "INSERT INTO $table ";
        $strSQL .= "(";
        $strSQL .= " " . $fildMaxid . ", ";
        foreach ($Darray as $key => $value) {

            if (!empty($value) && $value != '0000-00-00' && $value != '0000-00-00 00:00:00' && $value != "0.00") {
                if ($i != 0) {
                    $strSQL .= ",";
                }
                $strSQL .= $key;
                $i++;
            }
        }
        $strSQL .= ")";
        $strSQL .= " select ";
        $strSQL .= " COALESCE(max(" . $fildMaxid . "),0)+1 ,";
        $strSQL .= "";
        foreach ($Darray as $key => $value) {
            if (!empty($value) && $value != '0000-00-00' && $value != '0000-00-00 00:00:00' && $value != "0.00") {
                if ($j != 0) {
                    $strSQL .= ",";
                }
                $strSQL .= "'" . $value . "'";
                $valcheck[$j] = $value;
                $j++;
            }
        }
        $strSQL .= " From " . $table;
        $objQuery = DB::statement($strSQL);

        if ($objQuery) {
            return true;
        } else {
            return false;
            $error = "ERROR [$strSQL] <br>";
            foreach ($Darray as $key => $value) {
                $error .= "$key => $value <br>";
            }
            echo $error;
        }
    }

    //ฟังก์ชันเพิ่มข้อมูลโดยใช้ตัวแปร Array
    public static function Insert($table, $array, $message = null)
    {
        try {
            DB::transaction(function () use ($table, $array) {
                $checkArray = Helper::CheckDate($array);
                Helper::tables($table)::insert($checkArray);
            });
            return Helper::messageSuccess($message);
        } catch (\Exception $exception) {
            return $exception->getMessage();
            return Helper::messageError($message);
        }
    }

    //ฟังก์ชันเพิ่มข้อมูลโดยใช้ตัวแปร Array คืนค่ากลับเป็นข้อมูลล่าสุด
    public static function InsertBackLastData($table, $array, $fieldLastData = null)
    {
        try {
            DB::transaction(function () use ($table, $array) {
                $checkArray = Helper::CheckDate($array);
                if (class_exists($table) == true) {
                    $data = $table::create($checkArray);
                } else {
                    DB::table($table)->insert($checkArray);
                    $data = DB::table($table)->latest()->first();
                }

                if (!empty($fieldLastData)) {
                    return $data->$fieldLastData;
                } else {
                    return "success";
                }
            });
        } catch (\Exception $exception) {
            //return $exception->getMessage();
            return "error";
        }
    }

    //ฟังก์ชันอัพเดตข้อมูลโดยใช้ตัวแปร Array
    public static function Update($table, $where, $id, $array, $message = null)
    {
        try {
            DB::transaction(function () use ($table, $where, $id, $array) {
                $checkArray = Helper::CheckDate($array);
                Helper::tables($table)::where($where, $id)->update($checkArray);
            });
            return Helper::messageSuccess($message);
        } catch (\Exception $exception) {
            //return $exception->getMessage();
            return Helper::messageError($message);
        }
    }

    //ฟังก์ชันอัพเดตข้อมูล Where 2 เงื่อนไข โดยใช้ตัวแปร Array
    public static function OrUpdate($table, $where, $orWhere, $array, $message = null)
    {
        try {
            DB::transaction(function () use ($table, $where, $orWhere, $array) {
                $checkArray = Helper::CheckDate($array);
                if (class_exists($table) == true) {
                    $table::where($where)->orWhere($orWhere)->update($checkArray);
                } else {
                    DB::table($table)->where($where)->orWhere($orWhere)->update($checkArray);
                }
            });
            return Helper::messageSuccess($message);
        } catch (\Exception $exception) {
            //return $exception->getMessage();
            return Helper::messageError($message);
        }
    }

    //ฟังก์ชันอัพเดตข้อมูลโดยใช้ตัวแปร Array แบบหลายเงื่อนไข
    public static function CaseUpdate($table, $where, $array, $message = null)
    {
        try {
            DB::transaction(function () use ($table, $where, $array) {
                $checkArray = Helper::CheckDate($array);
                Helper::tables($table)::where($where)->update($checkArray);
            });
            return Helper::messageSuccess($message);
        } catch (\Exception $exception) {
            //return $exception->getMessage();
            return Helper::messageError($message);
        }
    }

    //ฟังก์ชันคัดลอกข้อมูลโดยใช้ตัวแปร Object
    public static function Copy($table, $request, $message = null)
    {
        try {
            DB::transaction(function () use ($table, $request) {
                $array = $request->ToArray();
                unset($array["id"]);
                unset($array["created_at"]);
                unset($array["updated_at"]);
                if (Helper::CheckArray($array, 'image') != '') {
                    unset($array["image"]);
                    $old_path = public_path('image/' . $request->path . '' . $request->image . '');
                    $file_extension = File::extension($old_path);
                    $image_name = time() . '.' . $file_extension;
                    $new_path = public_path('image/' . $request->path . '' . $image_name . '');
                    if (File::copy($old_path, $new_path)) {
                        $data_array = array_merge($array, ["image" => $image_name]);
                    }
                } else {
                    $data_array = $array;
                }
                Helper::tables($table)::insert($data_array);
            });
            return Helper::messageSuccess($message);
        } catch (\Exception $exception) {
            //return $exception->getMessage();
            return Helper::messageError($message);
        }
    }

    //ฟังก์ลบข้อมูลโดยใช้ Id
    public static function Delete($table, $id, $message = null)
    {
        try {
            DB::transaction(function () use ($table, $id) {
                Helper::tables($table)::find($id)->delete();
            });
            return Helper::messageJsonSuccess($message);
        } catch (\Exception $exception) {
            //return $exception->getMessage();
            return Helper::messageJsonError($message);
        }
    }

    //ฟังก์ลบข้อมูลโดยใช้ Id มีเงื่อนไขก่อนลบ
    public static function CaseDelete($table, $where, $id, $message = null)
    {
        try {
            DB::transaction(function () use ($table, $where, $id) {
                Helper::tables($table)::where($where, $id)->delete();
            });
            return Helper::messageJsonSuccess($message);
        } catch (\Exception $exception) {
            //return $exception->getMessage();
            return Helper::messageJsonError($message);
        }
    }

    //ฟังก์เช็คค่าว่างปี พ.ศ. และ แปลงเป็น พ.ศ. ไทยได้
    public static function CaseDate($date, $short, $addYears = null, $format = null)
    {
        if (!empty($date) && strlen($date) == 4) {
            $data = Carbon::createFromFormat($short, $date);
            if (!empty($addYears)) {
                $data = $data->addYears($addYears);
            }

            if (!empty($format)) {
                $data = $data->format($format);
            }
            return $data;
        }
    }

    //ฟังก์แปลงวันที่เป็น พ.ศ.ไทย
    public static function DateShort($date)
    {
        if ($date != "" && $date != "0000-00-00 00:00:00") {
            return Carbon::createFromFormat('Y-m-d H:i:s', $date)->addYears(543)->format('d/m/y');
        }
    }

    //ฟังก์แปลงวันที่เป็น พ.ศ.ไทย แบบมีเวลา
    public static function DateThai1($date)
    {
        if ($date != "" && $date != "0000-00-00 00:00:00") {
            return Carbon::createFromFormat('Y-m-d H:i:s', $date)->addYears(543)->format('d/m/y H:i');
        }
    }

    //ฟังก์แปลงวันที่เป็น พ.ศ.ไทย แบบไม่มีเวลา
    public static function DateThai2($date)
    {
        if ($date != "" && $date != "0000-00-00 00:00:00") {
            return Carbon::createFromFormat('Y-m-d H:i:s', $date)->addYears(543)->format('d/m/y');
        }
    }

    //ฟังก์แปลงวันที่เป็น พ.ศ.ไทย มีเงื่อนไข แบบที่ 1
    public static function dateFormat($date, bool $withTime = true, bool $createWithTime = true): String
    {
        if ($date == "0000-00-00 " . $createWithTime ? '00:00:00' : '' || empty($date)) {
            return '';
        }

        try {
            return Carbon::createFromFormat('Y-m-d H:i:s', $date)
                ->addYear(543)
                ->format('d/m/Y' . ($withTime == true ? ' H:i' : ''));
        } catch (\Throwable $th) {
            return '';
        }
    }

    //ฟังก์แปลงวันที่เป็น พ.ศ.ไทย มีเงื่อนไข แบบที่ 2
    public static function DateTimeThai($data)
    {
        if (!empty($data) && $data != "0000-00-00 00:00:00" && $data != "0000-00-00") {
            $a = explode(" ", $data);
            $b = explode("-", $a[0]);
            $c = explode(":", $a[1]);
            switch ($b[1]) {
                case "01":
                    $mThai = 'มกราคม';
                    $ms = 'ม.ค.';
                    break;
                case "02":
                    $mThai = 'กุมภาพันธ์';
                    $ms = 'ก.พ.';
                    break;
                case "03":
                    $mThai = 'มีนาคม';
                    $ms = 'มี.ค.';
                    break;
                case "04":
                    $mThai = 'เมษายน';
                    $ms = 'เม.ย.';
                    break;
                case "05":
                    $mThai = 'พฤษภาคม';
                    $ms = 'พ.ค.';
                    break;
                case "06":
                    $mThai = 'มิถุนายน';
                    $ms = 'มิ.ย.';
                    break;
                case "07":
                    $mThai = 'กรกฎาคม';
                    $ms = 'ก.ค.';
                    break;
                case "08":
                    $mThai = 'สิงหาคม';
                    $ms = 'ส.ค.';
                    break;
                case "09":
                    $mThai = 'กันยายน';
                    $ms = 'ก.ย.';
                    break;
                case "10":
                    $mThai = 'ตุลาคม';
                    $ms = 'ต.ค.';
                    break;
                case "11":
                    $mThai = 'พฤศจิกายน';
                    $ms = 'พ.ย.';
                    break;
                case "12":
                    $mThai = 'ธันวาคม';
                    $ms = 'ธ.ค.';
                    break;
            }
            $array = array(
                "Date" => $b[2] . '/' . $b[1] . '/' . ($b[0] + 543),
                "Time" => $c[0] . ":" . $c[1],
                "DateThai" => $b[2] . ' ' . $mThai . ' ' . ($b[0] + 543),
                "DateThaiShot" => $b[2] . ' ' . $ms . ' ' . ($b[0] + 543),
                "D" => $b[2],
                "MT" => $mThai,
                "MTs" => $ms,
                "YT" => ($b[0] + 543),
            );
            return $array;
        }
    }

    //ฟังก์ชันอัพโหลดรูปภาพ
    public static function uploadImage($request, $path)
    {
        if ($request->hasFile('image') == true) {
            $request->validate(
                [
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ],
                [
                    'image.required' => 'ไฟล์รูปภาพของคุณไม่ถูกต้อง กรุณาอัพโหลดใหม่อีกครั้ง!',
                ]
            );

            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image/' . $path . ''), $image_name);
            return $image_name;
        }
    }

    //ฟังก์ชันอัพโหลดหลายรูปภาพ
    public static function uploadImageArray($request, $path, $table, $message)
    {
        if ($request->hasFile('image') == true) {
            $request->validate(
                [
                    'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ],
                [
                    'image.required' => 'ไฟล์รูปภาพของคุณไม่ถูกต้อง กรุณาอัพโหลดใหม่อีกครั้ง!',
                ]
            );

            if ($files = $request->file('image')) {
                foreach ($files as $file) {
                    $name = time() . '.' . $file->getClientOriginalName();
                    $file->move(public_path('image/' . $path . ''), $name);
                    $data = new $table;
                    $data->album_id = $request->input('album_id');
                    $data->image = $name;
                    $data->save();
                }
            }
            return Redirect::back()->withSuccess($message);
        }
    }

    //ฟังก์ชันอัพโหลดไฟล์
    public static function uploadFile($request, $path)
    {
        if ($request->hasFile('file') == true) {
            $request->validate(
                [
                    'file' => 'required|mimes:pdf,xlx,csv|max:500000',
                ],
                [
                    'file.required' => 'ไฟล์ของคุณไม่ถูกต้อง กรุณาอัพโหลดใหม่อีกครั้ง!',
                ]
            );
            $filename = time() . '.' . $request->file->extension();
            $request->file->move(public_path('image/' . $path . ''), $filename);
            return $filename;
        }
    }

    //ฟังก์ชันอัพโหลดหลายไฟล์
    public static function uploadFileArray($request, $path, $table, $message)
    {
        if ($request->hasFile('file') == true) {
            $request->validate(
                [
                    'file.*' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:500000',
                ],
                [
                    'file.required' => 'ไฟล์รูปภาพของคุณไม่ถูกต้อง กรุณาอัพโหลดใหม่อีกครั้ง!',
                ]
            );

            if ($files = $request->file('file')) {
                foreach ($files as $file) {
                    $name = time() . '.' . $file->getClientOriginalName();
                    $file->move(public_path('image/' . $path . ''), $name);
                    $data = new $table;
                    $data->image = $name;
                    $data->save();
                }
            }
            return Redirect::back()->withSuccess($message);
        }
    }

    //ฟังก์ชันอัพโหลดรูปภาพรีไซน์
    public static function uploadWithResize($file, $path, $dimension)
    {
        $input['imagename'] = Str::random(5) . time() . '.' . $file->getClientOriginalExtension();
        $img = Image::make($file->getRealPath());
        $full_path = $path . '/' . $input['imagename'];
        $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save($full_path);

        return $full_path;
    }

    //ฟังก์ชันแสดงผล Select Option
    public static function selectOption($table, $where = null, $idwhere = null)
    {
        $output = '';
        if (!empty($where) && !empty($idwhere)) {
            $query = Helper::tables($table)::where($where, $idwhere)->first();
            $query_loop = Helper::tables($table)::where($where, '!=', $idwhere)->get();
            $output .= '<option value="' . $query->id . '">' . $query->name . '</option>';
        } else {
            $query_loop = Helper::tables($table)::all();
        }

        foreach ($query_loop as $value) {
            $output .= '<option value="' . $value->id . '">' . $value->name . '</option>';
        }

        return $output;
    }

    //ฟังก์ชันแสดงผล Select Option Loop
    public static function LoopSelectOption($data)
    {
        $output = '';
        foreach ($data as $value) {
            $output .= '<option value="' . $value->id . '">' . $value->name . '</option>';
        }

        return $output;
    }

    //ฟังก์ชั่นสุ่มตัวอักษร
    public static function randText($range)
    {
        $char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIGKLMNOPQRSTUVWXYZ';
        $start = rand(1, (strlen($char) - $range));
        $shuffled = str_shuffle($char);
        return substr($shuffled, $start, $range);
    }

    //ฟังก์ชันแปลงตัวเลขเป็นภาษาไทย
    public static function intBathToThai($number)
    {
        $txtnum1 = array("ศูนย์", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า", "สิบ");
        $txtnum2 = array("", "สิบ", "ร้อย", "พัน", "หมื่น", "แสน", "ล้าน");
        $number = str_replace(",", "", $number);
        $number = str_replace(" ", "", $number);
        $number = str_replace("บาท", "", $number);
        //ถ้าไม่ . จะ Error
        $chkdot = strrpos($number, ".");

        if (!$chkdot) {
            $number .= ".00";
        }

        $number = explode(".", $number);

        if (sizeof($number) > 2) {
            return "ทศนิยมหลายตัว";
            exit;
        }

        $strlen = strlen($number[0]);
        $convert = "";
        for ($i = 0; $i < $strlen; $i++) {
            $n = substr($number[0], $i, 1);
            if ($n != 0) {
                if ($i == ($strlen - 1) and $n == 1) {
                    $convert .= "เอ็ด";
                } elseif ($i == ($strlen - 2) and $n == 2) {
                    $convert .= "ยี่";
                } elseif ($i == ($strlen - 2) and $n == 1) {
                    $convert .= "";
                } else {
                    $convert .= $txtnum1[$n];
                }
                $convert .= $txtnum2[$strlen - $i - 1];
            }
        }
        $convert .= "บาท";

        if (($number[1] == "0") || ($number[1] == "00") || ($number[1] == "")) {
            $convert .= "ถ้วน";
        } else {
            $strlen = strlen($number[1]);
            for ($i = 0; $i < $strlen; $i++) {
                $n = substr($number[1], $i, 1);
                if ($n != 0) {
                    if ($i == ($strlen - 1) and $n == 1) {
                        $convert .= "เอ็ด";
                    } elseif ($i == ($strlen - 2) and $n == 2) {
                        $convert .= "ยี่";
                    } elseif ($i == ($strlen - 2) and $n == 1) {
                        $convert .= "";
                    } else {
                        $convert .= $txtnum1[$n];
                    }
                    $convert .= $txtnum2[$strlen - $i - 1];
                }
            }
            $convert .= "สตางค์";
        }

        return $convert;
    }

    //ฟังก์ชัน option loop วันที่
    public static function optionDay($condition = null, $length = null)
    {
        $output = '<option value="" selected="selected">วัน</option>';

        for ($i = 1; $i < 32; $i++) {

            if ($condition == sprintf('%02d', $i)) {
                $selected = 'selected';
            } else {
                $selected = null;
            }

            $output .= '<option value="' . sprintf('%02d', $i) . '" ' . $selected . '>' . sprintf('%02d', $i) . '</option>';
        }

        return $output;
    }

    //ฟังก์ชัน option loop เดือนภาษาไทย
    public static function optionMonth($condition = null)
    {
        $mArr = array(
            "01" => "มกราคม", "02" => "กุมภาพันธ์", "03" => "มีนาคม", "04" => "เมษายน", "05" => "พฤษภาคม", "06" => "มิถุนายน",
            "07" => "กรกฎาคม", "08" => "สิงหาคม", "09" => "กันยายน", "10" => "ตุลาคม", "11" => "พฤษจิกายน", "12" => "ธันวาคม",
        );

        $output = '';
        $output .= '<option value="">เดือน</option>';
        foreach ($mArr as $key => $value) {

            if ($condition == $key) {
                $selected = 'selected';
            } else {
                $selected = null;
            }

            $output .= '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
        }

        return $output;
    }

    //ฟังก์ชัน option loop เดือนภาษาไทยตัวย่อ
    public static function optionMonthShort($condition = null)
    {
        $mot = array(
            "ม.ค." => "01", "ก.พ." => "02", "มี.ค." => "03", "เม.ย." => "04", "พ.ค." => "05", "มิ.ย." => "06", "ก.ค." => "07",
            "ส.ค." => "08", "ก.ย." => "09", "ต.ค." => "10", "พ.ย." => "11", "ธ.ค." => "12",
        );

        $output = '';
        $output .= '<option value="">เดือน</option>';
        foreach ($mot as $key => $value) {

            if ($condition == $key) {
                $selected = 'selected';
            } else {
                $selected = null;
            }

            $output .= '<option value="' . $value . '" ' . $selected . '>' . $key . '</option>';
        }

        return $output;
    }

    //ฟังก์ชัน option loop พ.ศ.ไทย
    public static function optionYear($condition = null, $length = null)
    {
        $output = '';
        $output .= '<option value="">ปี</option>';
        for ($i = 0; $i < (empty($length) ? 80 : $length); $i++) {

            if ($condition == date('Y') - $i) {
                $selected = 'selected';
            } else {
                $selected = null;
            }

            $output .= '<option value="' . date('Y') - $i . '" ' . $selected . '>' . date('Y') + 543 - $i . '</option>';
        }

        return $output;
    }

    //ฟังก์ชัน option loop พ.ศ.ไทย => แสดง ค.ศ. - พ.ศ.
    public static function optionYear2($condition = null, $length = null)
    {
        $output = '';
        $output .= '<option value="">ปี</option>';
        for ($i = 0; $i < (empty($length) ? 30 : $length); $i++) {

            if ($condition == date('Y') - $i) {
                $selected = 'selected';
            } else {
                $selected = null;
            }

            $output .= '<option value="' . date('Y') - $i . '" ' . $selected . '>' . date('Y') - $i . ' - ' . date('Y') - $i + 543 . '</option>';
        }

        return $output;
    }

    //ฟังก์ชัน option loop พ.ศ.ไทย => ย้อนหลัง 5 ปี ปัจจุบัน + 7 ปี
    public static function optionYear3($condition = null, $fori = null, $length = null)
    {
        $output = '';
        $output .= '<option value="">ปี</option>';
        for ($i = (empty($fori) ? -5 : $fori); $i < (empty($length) ? 7 : $length); $i++) {

            if ($condition == date('Y') + $i) {
                $selected = 'selected';
            } else {
                $selected = null;
            }

            $output .= '<option value="' . date('Y') - $i . '" ' . $selected . '>' . date('Y') + 543 + $i . '</option>';
        }

        return $output;
    }

    //ฟังก์ชัน return message success
    public static function messageSuccess($message)
    {
        if (empty($message)) {
            return 'success';
        } else {
            return Redirect::back()->withSuccess($message);
        }
    }

    //ฟังก์ชัน return message error
    public static function messageError($message)
    {
        if (empty($message)) {
            return 'error';
        } else {
            return Redirect::back()->withError('Error');
        }
    }

    //ฟังก์ชัน return message json success
    public static function messageJsonSuccess($message)
    {
        if (empty($message)) {
            return 'success';
        } else {
            return Response::json(['message' => $message]);
        }
    }

    //ฟังก์ชัน return message json error
    public static function messageJsonError($message)
    {
        if (empty($message)) {
            return 'error';
        } else {
            return Response::json(['message' => 'Error']);
        }
    }

    //ฟังก์ชันเช็คนามสกุลไฟล์ก่อนเข้าถึง
    public function accFile(Request $request)
    {
        $pathFile = asset("doc/" . $request->pathFile);

        $filename1 = realpath($pathFile);
        $file_extension = strtolower(substr(strrchr($filename1, "."), 1));
        switch ($file_extension) {
            case "pdf":
                $ctype = "application/pdf";
                break;
            case "exe":
                $ctype = "application/octet-stream";
                break;
            case "zip":
                $ctype = "application/zip";
                break;
            case "doc":
                $ctype = "application/msword";
                break;
            case "xls":
                $ctype = "application/vnd.ms-excel";
                break;
            case "ppt":
                $ctype = "application/vnd.ms-powerpoint";
                break;
            case "gif":
                $ctype = "image/gif";
                break;
            case "png":
                $ctype = "image/png";
                break;
            case "PNG":
                $ctype = "image/png";
                break;
            case "jpe":
            case "jpeg":
            case "jpg":
                $ctype = "image/jpg";
                break;
            default:
                $ctype = "application/force-download";
        }

        $url = redirect('doc/' . $request->pathFile . '');

        if (strpos($_SERVER["HTTP_USER_AGENT"], 'WebKit') !== false || strpos($_SERVER["HTTP_USER_AGENT"], 'Firefox') !== false) {
            header("Content-Type: " . $ctype);
            header('Pragma: no-cache');
        } else {
            header('Content-Type: application/octet-stream');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
        }

        header('Expires: 0');

        if (strpos($ctype, 'image') !== false) {
        } else {
            header("Content-Description: File Transfer");
        }

        header("Content-Transfer-Encoding: binary");
        header("Content-Length: " . filesize($filename1));

        return $url;
    }

    //ฟังก์ชันส่งเมล์แบบที่ 1
    public static function Sendmail($to, $form, $title, $msg, $arrFiles)
    {
        $strTo = $to;
        $strSubject = "=?utf-8?B?" . base64_encode($title) . "?=";
        $strMessage = $msg;

        $strSid = md5(uniqid(time()));

        $strHeader = "";
        $strHeader .= "From: <$form>\nReply-To: $form\n";

        $strHeader .= "MIME-Version: 1.0\n";
        $strHeader .= "Content-Type: multipart/mixed; boundary=\"" . $strSid . "\"\n\n";
        $strHeader .= "This is a multi-part message in MIME format.\n";

        $strHeader .= "--" . $strSid . "\n";
        $strHeader .= "Content-type: text/html; charset=UTF-8\n";
        $strHeader .= "Content-Transfer-Encoding: 7bit\n\n";
        $strHeader .= $strMessage . "\n\n";

        for ($i = 0; $i < count($arrFiles); $i++) {
            if (trim($arrFiles[$i]) != "") {
                $strFilesName = $arrFiles[$i];
                $strContent = chunk_split(base64_encode(file_get_contents($strFilesName)));

                $strHeader .= "--" . $strSid . "\n";
                $strHeader .= "Content-Type: application/octet-stream; name=\"" . $strFilesName . "\"\n";
                $strHeader .= "Content-Transfer-Encoding: base64\n";
                $strHeader .= "Content-Disposition: attachment; filename=\"" . $strFilesName . "\"\n\n";
                $strHeader .= $strContent . "\n\n";
            }
        }

        $flgSend = @mail($strTo, $strSubject, "", $strHeader);

        if ($flgSend) {
            return true;
        } else {
            return false;
        }
    }

    //ฟังก์ชันส่งเมล์แบบที่ 2
    public static function staticSendmailCC($to, $ccArr, $form, $title, $msg, $arrFiles)
    {
        $strTo = $to;
        $strSubject = "=?utf-8?B?" . base64_encode($title) . "?=";
        $strMessage = $msg;

        $strSid = md5(uniqid(time()));

        $strHeader = "";
        $strHeader .= "From: <$form>\nReply-To: $form\n";

        for ($i = 0; $i < count($ccArr); $i++) {
            if ($i == 0) {
                $strHeader .= "Cc: ";
            }

            if ($i > 0) {
                $strHeader .= ",";
            }

            $strHeader .= $ccArr[$i];
            if ($i == (count($ccArr) - 1)) {
                $strHeader .= "\n";
            }
        }

        $strHeader .= "MIME-Version: 1.0\n";
        $strHeader .= "Content-Type: multipart/mixed; boundary=\"" . $strSid . "\"\n\n";
        $strHeader .= "This is a multi-part message in MIME format.\n";

        $strHeader .= "--" . $strSid . "\n";
        $strHeader .= "Content-type: text/html; charset=UTF-8\n";
        $strHeader .= "Content-Transfer-Encoding: 7bit\n\n";
        $strHeader .= $strMessage . "\n\n";

        for ($i = 0; $i < count($arrFiles); $i++) {
            if (!empty(trim($arrFiles[$i]))) {
                $strFilesName = $arrFiles[$i];
                $strContent = chunk_split(base64_encode(file_get_contents($strFilesName)));

                $strHeader .= "--" . $strSid . "\n";
                $strHeader .= "Content-Type: application/octet-stream; name=\"" . $strFilesName . "\"\n";
                $strHeader .= "Content-Transfer-Encoding: base64\n";
                $strHeader .= "Content-Disposition: attachment; filename=\"" . $strFilesName . "\"\n\n";
                $strHeader .= $strContent . "\n\n";
            }
        }

        $flgSend = @mail($strTo, $strSubject, "", $strHeader);

        if ($flgSend) {
            return true;
        } else {
            return false;
        }
    }

    //ฟังก์ชันส่ง SMS
    public static function sendSMS($to, $message, $username, $password)
    {
        $phoneNumber = "";

        //Set format number
        $phoneNumber = str_replace(" ", "", $to);
        $phoneNumber = str_replace("-", "", $phoneNumber);

        if (strlen($phoneNumber) == "10") {
            $params = array(
                "username" => $username,
                "password" => $password,
                "msisdn" => $phoneNumber,
                "message" => $message,
                "sender" => "KAWNA",
            );

            $result = simplexml_load_file("http://www.thaibulksms.com/sms_api.php?" . http_build_query($params));
            $status = $result->Status;
            $detail = $result->Detail;

            switch ($status) {
                case "0":
                    return false;
                    break;
                case "1":
                    return true;
                    break;
                default:
                    return true;
                    break;
            }
        }

        return false;
    }

    //ฟังก์ชันแสดงชื่อบราวเซอร์ที่เข้าใช้งานเว็บไซต์
    public static function getBrowser()
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version = "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        } elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }

        // Next get the name of the useragent yes seperately and for good reason
        if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        } elseif (preg_match('/Firefox/i', $u_agent)) {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        } elseif (preg_match('/Chrome/i', $u_agent)) {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        } elseif (preg_match('/Safari/i', $u_agent)) {
            $bname = 'Apple Safari';
            $ub = "Safari";
        } elseif (preg_match('/Opera/i', $u_agent)) {
            $bname = 'Opera';
            $ub = "Opera";
        } elseif (preg_match('/Netscape/i', $u_agent)) {
            $bname = 'Netscape';
            $ub = "Netscape";
        }

        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
            ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }

        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
                $version = $matches['version'][0];
            } else {
                $version = $matches['version'][1];
            }
        } else {
            $version = $matches['version'][0];
        }

        // check if we have a number
        if ($version == null || $version == "") {
            $version = "?";
        }

        return array(
            'userAgent' => $u_agent,
            'name' => $bname,
            'version' => $version,
            'platform' => $platform,
            'pattern' => $pattern,
        );
    }

    //ฟังก์ชันเช็คค่าว่างของมูล คืนค่ากลับเป็น JSON สำหรับเว็บ API
    public static function checkEmpty($field, $fieldName = "ฟิลด์", $headerText = null)
    {
        if (empty($field)) {
            $result = array(
                "header" => $headerText,
                "status" => "error",
                "message" => "ไม่มีข้อมูล (" . $fieldName . ")",
                "total" => "0",
                "data" => array(),
            );
            return Response::json($result);
        }
    }

    //ฟังก์ชันเช็ครูปแบบ Email ที่ถูกต้องคืนค่ากลับเป็น JSON สำหรับเว็บ API
    public static function checkEmail($field, $fieldName = "อีเมล์", $headerText = null)
    {
        if (!Helper::checkValidateEmail($field)) {
            $result = array(
                "header" => $headerText,
                "status" => "error",
                "message" => "รูปแบบอีเมล์ไม่ถูกต้อง ",
                "total" => "0",
                "data" => array(),
            );
            return Response::json($result);
        }
    }

    //ฟังก์ชันเช็ครูปแบบ Email ที่ถูกต้องคืนค่ากลับเป็น true หรือ false
    public static function checkValidateEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    //ฟังก์ชันเช็ครูปแบบเบอร์โทรศัพท์ที่ถูกต้องคืนค่ากลับเป็น JSON สำหรับเว็บ API
    public static function checkMobile($field, $fieldName = "เบอร์โทรศัพท์", $headerText = null)
    {
        if (!Helper::checkValidateMobile($field)) {
            $result = array(
                "header" => $headerText,
                "status" => "error",
                "message" => "รูปแบบเบอร์โทรศัพท์ไม่ถูกต้อง",
                "total" => "0",
                "data" => array(),
            );
            return Response::json($result);
        }
    }

    //ฟังก์ชันเช็ครูปแบบเบอร์โทรศัพท์ที่ถูกต้องคืนค่ากลับเป็น true หรือ false
    public static function checkValidateMobile($mobile)
    {
        $regExp = "/^0[0-9]{9}$/i";
        return preg_match($regExp, $mobile);
    }

    //ฟังก์ชันเช็ครูปแบบบัตรประชาชนที่ถูกต้องคืนค่ากลับเป็น JSON สำหรับเว็บ API
    public static function checkCitizenId($field, $fieldName = "หมายเลขบัตรประชาชน", $headerText = null)
    {
        if (!Helper::checkValidateCitizenId($field)) {
            $result = array(
                "header" => $headerText,
                "status" => "error",
                "message" => "หมายเลขบัตรประชาชนไม่ถูกต้อง ",
                "total" => "0",
                "data" => array(),
            );
            return Response::json($result);
        }
    }

    //ฟังก์ชันเช็ครูปแบบบัตรประชาชนที่ถูกต้องคืนค่ากลับเป็น true หรือ false
    public static function checkValidateCitizenId($pid)
    {
        if (strlen($pid) != 13) {
            return false;
        }

        for ($i = 0, $sum = 0; $i < 12; $i++) {
            $sum += (int) ($pid[$i]) * (13 - $i);
        }

        if ((11 - ($sum % 11)) % 10 == (int) ($pid[12])) {
            return true;
        }

        return false;
    }

    //ฟังก์ชันเช็คจำนวนตัวอักษรคืนค่ากลับเป็น JSON สำหรับเว็บ API
    public static function checkStrLen($str, $len, $fieldName = "ฟิลด์", $headerText = "")
    {
        if (strlen($str, "UTF-8") > $len) {
            $result = array(
                "header" => $headerText,
                "status" => "error",
                "message" => "จำนวนตัวอักษรของ " . $fieldName . " ต้องน้อยกว่า " . $len,
                "total" => "0",
                "data" => array(),
            );
            return Response::json($result);
        }
    }

    //ฟังก์ชันเช็คค่าว่าง Route
    public static function route($route)
    {
        try {
            return route($route);
        } catch (\Exception $ex) {
            return url('/');
        }
    }

    //ฟังก์ชันย่อการเขียน guard
    public static function guard($table, $field)
    {
        return Auth::guard($table)->user()->$field;
    }

    //ฟังก์ชันเช็คเมื่อไม่สามารถเข้าถึงเว็บไซต์ได้
    public static function AccessDeny($table, $field)
    {
        if (Helper::guard($table, $field)) {
            return "<h1><font color=\"#FF0000\">Access Deny!</font></h1>";
        }
    }

    //ฟังก์ชันเข้าถึง UrlAccFile
    public static function urlAccFile($pathFile, $fileName, $isNull = null)
    {
        if (!empty($pathFile)) {
            return '<a href="' . route('accFile') . '?pathFile=' . $pathFile . '">' . $fileName . '</a>';
        } else {
            return ($isNull == "NULL" ? null : $fileName);
        }
    }

    //ฟังก์ชันแปลงรูปภาพเป็น Base64
    public static function imageBase64($path)
    {
        $path = public_path($path);
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $src = file_get_contents($path);
        return 'data:image/' . $type . ';base64,' . base64_encode($src);
    }

    //ฟังก์ชันปิดใช้งาน dd หากไม่ได้ Debug
    public static function dd($prop)
    {
        if (env('APP_DEBUG', false) === true) {
            return dd($prop);
        }
    }

    //ฟังก์ชันเช็คตารางในฐานข้อมูล
    public static function checkTable($table)
    {
        $check_table = Schema::hasTable($table);

        if ($check_table == false) {
            $check = false;
            $text = "ไม่พบตาราง {$table} อยู่ในฐานข้อมูล";
        } else {
            $query = Helper::fetchObject(DB::select("SHOW KEYS FROM {$table} WHERE Key_name = 'PRIMARY'"));
            $check = true;

            if (empty($query)) {
                $text = "ตาราง {$table} ไม่มี Primary Key";
            } else {
                $text = "พบตาราง {$table} || Primary Key คือ " . $query->Column_name;
            }
        }

        return array(
            "check" => $check,
            "text" => $text,
        );
    }

    //ฟังก์ชันเช็ครหัสผ่านเข้าใช้งาน API
    public static function checkKey($key_decrypt)
    {
        $data = DB::table('tb_api')->where('key_decrypt', $key_decrypt)->first();
        $key_encrypt = (!empty($data) ? $data->key_encrypt : null);

        if (!Hash::check($key_decrypt, $key_encrypt)) {
            $result = array(
                "header" => "ตรวจสอบ Key",
                "status" => "error",
                "message" => "api key ไม่ถูกต้อง ไม่มีสิทธิ์เข้าใช้งาน Web Service",
                "total" => "0",
                "data" => array(),
            );
            return Response::json($result);
        }
    }

    //ฟังก์ชันเข้ารหัสข้อมูล
    public static function hash($data)
    {
        return Hash::make($data);
    }
}
