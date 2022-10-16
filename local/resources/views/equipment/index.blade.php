@extends('layout.app')

@section('content')
    <x-page-index title="รายละเอียดอุปกรณ์" url="{{ route('equipment.create') }}" edit="show"></x-page-index>
@endsection

@section('script')
    @if (Util::guard('member', 'status') == 'admin')
        <script type="text/javascript" language="javascript">
            $(document).ready(function() {
                oTable = $('#data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    scroller: true,
                    scrollCollapse: true,
                    searching: true,
                    lengthChange: true,
                    lengthMenu: [
                        [10, 25, 50, 100, 500, -1],
                        [10, 25, 50, 100, 500, "All"]
                    ],
                    ordering: false,
                    ajax: {
                        url: '{{ route('equipment.index') }}',
                        method: 'GET'
                    },
                    columns: [{
                            data: 'id',
                            className: 'text-center',
                            title: '#'
                        },

                        {
                            data: 'equ_id',
                            className: 'text-center',
                            title: 'รหัส'
                        },

                        {
                            data: 'picture',
                            className: 'text-center',
                            title: 'รูป'
                        },

                        {
                            data: 'equ_name',
                            className: 'text-center',
                            title: 'ชื่ออุปกรณ'
                        },

                        {
                            data: 'equ_details',
                            className: 'text-left',
                            title: 'รายละเอียดอุปกรณ'
                        },

                        {
                            data: 'quantity',
                            className: 'text-center',
                            title: 'คงเหลือ'
                        },

                        {
                            data: 'action',
                            className: 'text-center',
                            width: 150,
                            title: 'จัดการ'
                        },
                    ],
                    rowCallback: function(nRow, aData, dataIndex) {
                        $(nRow).data('aData', aData);
                    },
                    oLanguage: {
                        sEmptyTable: "<font color='black'>ไม่พบข้อมูล</font>",
                        sInfo: "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                        sInfoEmpty: "แสดง 0 ถึง 0 จาก 0 แถว",
                        sInfoFiltered: "(กรองข้อมูล _MAX_ ทุกแถว)",
                        sInfoPostFix: "",
                        sInfoThousands: ",",
                        sLengthMenu: "แสดง _MENU_ แถว",
                        sLoadingRecords: "กำลังโหลดข้อมูล...",
                        sProcessing: "กำลังดำเนินการ...",
                        sSearch: "ค้นหา: ",
                        sZeroRecords: "ไม่พบข้อมูล",
                        oPaginate: {
                            sFirst: "หน้าแรก",
                            sPrevious: "ก่อนหน้า",
                            sNext: "ถัดไป",
                            sLast: "หน้าสุดท้าย"
                        },
                        oAria: {
                            sSortAscending: ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
                            sSortDescending: ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
                        }
                    }
                });
            });
        </script>
    @else
        <script type="text/javascript" language="javascript">
            $(document).ready(function() {
                oTable = $('#data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    scroller: true,
                    scrollCollapse: true,
                    searching: true,
                    lengthChange: true,
                    lengthMenu: [
                        [10, 25, 50, 100, 500, -1],
                        [10, 25, 50, 100, 500, "All"]
                    ],
                    ordering: false,
                    ajax: {
                        url: '{{ route('equipment.index') }}',
                        method: 'GET'
                    },
                    columns: [{
                            data: 'id',
                            className: 'text-center',
                            title: '#'
                        },

                        {
                            data: 'equ_id',
                            className: 'text-center',
                            title: 'รหัส'
                        },

                        {
                            data: 'picture',
                            className: 'text-center',
                            title: 'รูป'
                        },

                        {
                            data: 'equ_name',
                            className: 'text-center',
                            title: 'ชื่ออุปกรณ'
                        },

                        {
                            data: 'equ_details',
                            className: 'text-left',
                            title: 'รายละเอียดอุปกรณ'
                        },

                        {
                            data: 'quantity',
                            className: 'text-center',
                            title: 'คงเหลือ'
                        },

                        {
                            data: 'oder_status',
                            className: 'text-center',
                            title: 'สถานะ'
                        },

                        {
                            data: 'action',
                            className: 'text-center',
                            width: 150,
                            title: 'จัดการ'
                        },
                    ],
                    rowCallback: function(nRow, aData, dataIndex) {
                        $(nRow).data('aData', aData);
                    },
                    oLanguage: {
                        sEmptyTable: "<font color='black'>ไม่พบข้อมูล</font>",
                        sInfo: "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                        sInfoEmpty: "แสดง 0 ถึง 0 จาก 0 แถว",
                        sInfoFiltered: "(กรองข้อมูล _MAX_ ทุกแถว)",
                        sInfoPostFix: "",
                        sInfoThousands: ",",
                        sLengthMenu: "แสดง _MENU_ แถว",
                        sLoadingRecords: "กำลังโหลดข้อมูล...",
                        sProcessing: "กำลังดำเนินการ...",
                        sSearch: "ค้นหา: ",
                        sZeroRecords: "ไม่พบข้อมูล",
                        oPaginate: {
                            sFirst: "หน้าแรก",
                            sPrevious: "ก่อนหน้า",
                            sNext: "ถัดไป",
                            sLast: "หน้าสุดท้าย"
                        },
                        oAria: {
                            sSortAscending: ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
                            sSortDescending: ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
                        }
                    }
                });
            });
        </script>
    @endif
@endsection
