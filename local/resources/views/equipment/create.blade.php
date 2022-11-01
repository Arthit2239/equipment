@extends('layout.app')

@section('content')
    <x-page-create title="เพิ่มอุปกรณ์" url="{{ route('equipment.store') }}" back="{{ route('equipment.index') }}" form='
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">ไฟล์</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" name="image" id="image">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">รหัส</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="equ_id" id="equ_id" value="{{$equ_id}}" readonly required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">ชื่ออุปกรณ์</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="equ_name" id="equ_name">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">รายละเอียดอุปกรณ์</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="equ_details" id="equ_details">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">จำนวน</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="quantity" id="quantity">
        </div>
    </div>'>
    </x-page-create>
@endsection

@section('script')
@endsection
