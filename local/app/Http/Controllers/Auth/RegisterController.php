<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Util\Helper;

class RegisterController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:member');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $image_name = Helper::uploadImage($request, 'profile');

        $_array = array(
            'm_name' => $request->input("name"),
            'm_username' => $request->input("username"),
            'email' => $request->input("email"),
            'password' => Hash::make($request->input("password")),
            'status' => 'user'
        );

        if (!empty($image_name)) {
            $array = array_merge($_array, ["image" => $image_name]);
        } else {
            $array = $_array;
        }

        $check_insert = Helper::CheckInsert(Member::class, 'm_username', $request->input('username'), null);

        if ($check_insert == 'error') {
            return Redirect::back()->withError('Username ' . $request->input('username') . ' มีผู้ใช้แล้ว กรุณาใช้ Username อื่น!');
        } else {
            return Helper::Insert(Member::class, $array, "สมัครสมาชิกสำเร็จ ยินดีตอนรับเข้าสู่ระบบเบิกอุปกรณ์ของ บริษัท บิซโพเทนเชียล");
        }
    }
}
