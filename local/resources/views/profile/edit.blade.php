@extends('layout.app')

@section('content')
    <x-page-edit title="โปรไฟล์" url="{{ route('profile.update', $data->id) }}" path="{{ $data->path }}"
        image="{{ $data->image }}" back="{{ route('dashboard') }}" form='
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ไฟล์</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ชื่อ-นามสกุล</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" value="{{ $data->m_name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ชื่อผู้ใช้เข้าสู่ระบบ</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" id="username" value="{{ $data->m_username }}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">อีเมล</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" value="{{ $data->email }}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">รหัสผ่าน</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password_old" id="password_old" value="{{ $data->password }}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">แก้ไขรหัสผ่าน</label>
                    <div class="col-sm-10">
                        <select name="edit_password" id="edit_password" class="form-control">
                            <option value="no">no</option>
                            <option value="yes">yes</option>
                        </select>
                    </div>
                </div>

                <div id="list_data" style="display: none;">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รหัสผ่านใหม่</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ยืนยันรหัสผ่านใหม่</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password Confirm">
                        </div>
                    </div>
                </div>'>
    </x-page-edit>
@endsection

@section('script')
    <script type="text/javascript" language="javascript">
        $(document).on('change', '#edit_password', function(){

            var check_password = $('#edit_password').val();
            console.log(check_password);

            if(check_password=='yes'){
                $('#list_data').show();
            }else{
                $('#list_data').hide();
            }
        });
    </script>
@endsection
