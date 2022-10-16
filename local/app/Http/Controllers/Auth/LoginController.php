<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('guest');
        $this->middleware('guest:member');
    }

    public function postlogin(Request $request)
    {
        $input = $request->all();

        //เช็คข้อมูล password ห้ามเป็นค่าว่าง
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        //เช็คข้อมูลที่ส่งมาเป็น username หรือ email
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'm_username';

        //เช็คติ๊กถูก = true ไม่ใช่ = false
        $remember = $request->filled('remember_me');

        //เช็ค username หรือ email และ password ตรงกับดาต้าเบสไม่? || เช็คฟิลดิ์ remembe_token ในดาต้าเบสให้จดจำการ Login
        if (Auth::guard('member')->attempt(array($fieldType => $input['username'], 'password' => $input['password']), $remember)) {
            //login สำเร็จ
            return redirect()->route('dashboard');
        } else {
            //login ไม่สำเร็จ
            return back()->with(['error' => 'Email หรือ Password ไม่ถูกต้องกรุณาลองใหม่อีกครั้ง!']);
        }
    }
}
