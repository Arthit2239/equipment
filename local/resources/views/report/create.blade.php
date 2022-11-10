@extends('layout.app')

@section('content')
    <x-page-create title="เพิ่มอุปกรณ์" url="{{ route('oder.store') }}" back="{{ route('oder.index') }}" form='
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">ไฟล์</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" name="image" id="image">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">รหัสการเบิก</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="oder_id" id="oder_id" value="{{$oder_id}}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">ชื่ออุปกรณ์</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="equ_id" id="equ_id">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">จำนวน</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="order_total" id="order_total">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">คนที่เบิก</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="m_id" id="m_id" value="{{ $member->id }}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">วันที่</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="oder_date" id="oder_date">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">สถานะ</label>
        <div class="col-sm-10">
            <select class="form-control" name="oder_status" id="oder_status">
                <option value="Y" {{$status_y}}>อนุมัติ</option>
                <option value="N" {{$status_n}}>ไม่อนุมัติ</option>
                <option value="W" {{$status_w }}>รออนุมัติ</option>
        </select>
        </div>
    </div>'>
    </x-page-create>
@endsection

@section('script')
@endsection
