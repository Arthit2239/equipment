@extends('layout.app')

@section('content')
    <x-page-report title="รายงาน" url="{{ route('report.genpdf') }}" back="{{ route('report.index') }}" form='
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">อุปกรณ์</label>
        <div class="col-sm-10">
            <select name="equ_id" id="equ_id" class="form-control">
                {!! $equipment !!}
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">สถานะ</label>
        <div class="col-sm-10">
            <select class="form-control" name="oder_status" id="oder_status">
                <option value="">เลือกสถานะ</option>
                <option value="Y">อนุมัติ</option>
                <option value="N">ไม่อนุมัติ</option>
                <option value="W">รออนุมัติ</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">วันที่ทำการ</label>
        <div class="col-sm-10">
            <input type="date" name="oder_date" id="oder_date" class="form-control">
        </div>
    </div>
    '>
    </x-page-report>
@endsection

@section('script')

@endsection
