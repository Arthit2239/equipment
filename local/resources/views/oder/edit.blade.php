@extends('layout.app')

@section('content')
    <x-page-edit title="แก้ไขอนุมัติเบิกอุปกรณ์" url="{{ route('oder.update', $data->id) }}" path="{{ $data->path }}"
        image="{{ $data->picture }}" back="{{ route('oder.index') }}" form='
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">รหัสการเบิก</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $data->oder_id }}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ชื่ออุปกรณ์</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $equ->equ_name }}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">จำนวน</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="oder_total" id="oder_total" value="{{ $data->oder_total }}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">คนที่เบิก</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $member->m_username }}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">วันที่</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $oder_date }}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">สถานะ</label>
                <div class="col-sm-10">
                    <select class="form-control" name="oder_status" id="oder_status">
                        <option value="Y" {{ $status_y }}>อนุมัติ</option>
                        <option value="N" {{ $status_n }}>ไม่อนุมัติ</option>
                        <option value="W" {{ $status_w }}>รออนุมัติ</option>
                </select>
                </div>
            </div>
            <input type="hidden" class="form-control" name="equ_id" id="equ_id" value="{{ $equ->equ_id }}">
            <input type="hidden" class="form-control" name="quantity" id="quantity" value="{{ $equ->quantity }}">
            '>
    </x-page-edit>
@endsection

@section('script')
@endsection
