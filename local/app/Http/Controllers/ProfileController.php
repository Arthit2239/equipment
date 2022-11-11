<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Util\Helper;
use App\Models\User;
use App\Models\Member;

class ProfileController extends Controller
{
    public function index()
    {
        $data["data"] = Member::where('id',  Auth::guard('member')->user()->id)->first();
        return view('profile.index', $data);
    }

    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        if (empty($request->input("password"))) {
            $password = $request->input("password_old");
        } else {
            switch (Helper::ConfirmData($request->input("password"), $request->input("password_confirmation"))) {
                case 'error':
                    return Redirect::back()->withError('รหัสผ่านใหม่ไม่ตรงกัน กรุณายืนยันรหัสผ่านใหม่อีกครั้ง!');
                    break;
                case 'success':
                    $password = Hash::make($request->input("password"));
                    break;
            }
        }

        $image_name = Helper::uploadImage($request, 'profile');

        $_array = array(
            'm_name' => $request->input("name"),
            'm_username' => $request->input("username"),
            'email' => $request->input("email"),
            'password' => $password
        );

        if (!empty($image_name)) {
            $array = array_merge($_array, ["image" => $image_name]);
        } else {
            $array = $_array;
        }

        if (Helper::CheckInsert('members', 'm_username', $request->input('username')) == "error") {
            return Redirect::back()->withError('Username ' . $request->input('username') . ' มีผู้ใช้แล้ว กรุณาใช้ Username อื่น!');
        }

        if (Helper::CheckInsert('members', 'email', $request->input('email')) == "error") {
            return Redirect::back()->withError('Email ' . $request->input('email') . ' มีผู้ใช้แล้ว กรุณาใช้ Email อื่น!');
        }

        return Helper::Insert('members', $array, "สมัครสมาชิกสำเร็จ ยินดีตอนรับเข้าสู่ Anicho");
    }

    public function show($id)
    {
        $data["data"] = Member::where('id', $id)->first();
        return view('profile.show', $data);
    }

    public function edit($id)
    {
        $data["data"] = Member::where('id', $id)->first();
        return view('profile.edit', $data);
    }

    public function update(Request $request, $id)
    {
        if (empty($request->input("password"))) {
            $password = $request->input("password_old");
        } else {
            if (Helper::ConfirmData($request->input("password"), $request->input("password_confirmation")) == "error") {
                return Redirect::back()->withError('รหัสผ่านไม่ตรงกัน กรุณากรอกข้อมูลใหม่อีกครั้ง!');
            }
            $password = Hash::make($request->input("password"));
        }

        $image_name = Helper::uploadImage($request, 'profile');

        $_array = array(
            'm_name' => $request->input("name"),
            'm_username' => $request->input("username"),
            'email' => $request->input("email"),
            'password' => $password
        );

        if (!empty($image_name)) {
            $array = array_merge($_array, ["image" => $image_name]);
        } else {
            $array = $_array;
        }

        // if (Helper::CheckUpdate('members', 'm_username', $request->input('username')) == "error") {
        //     return Redirect::back()->withError('Username ' . $request->input('username') . ' มีผู้ใช้แล้ว กรุณาใช้ Username อื่น!');
        // }

        // if (Helper::CheckUpdate('members', 'email', $request->input('email')) == "error") {
        //     return Redirect::back()->withError('Email ' . $request->input('email') . ' มีผู้ใช้แล้ว กรุณาใช้ Email อื่น!');
        // }

        return Helper::Update('members', 'id', $id, $array, "อัพเดตข้อมูลสำเร็จ");
    }

    public function copy($id)
    {
        $clone = Helper::QueryFirstTable('members', '*', array(['id', $id]));
        return Helper::Copy('members', $clone, 'คัดลอกข้อมูลสำเร็จ');
    }

    public function destroy($id)
    {
        return Helper::Delete('members', $id, 'ลบข้อมูลสำเสร็จ');
    }
}
