@extends('layout.app')

@section('content')
    <x-page-create title="เพิ่มผู้ใช้" url="{{ route('pofile.store') }}"
        back="{{ route('profile.index') }}" form='
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ไฟล์</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="image" id="image">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ชื่อ-นามสกุล</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ชื่อผู้ใช้เข้าสู่ระบบ</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">อีเมล</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">รหัสผ่าน</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ยืนยันรหัสผ่าน</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password Confirm" required>
            </div>
        </div>'>
    </x-page-create>
@endsection

@section('script')

@endsection
