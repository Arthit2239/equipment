@extends('layout.app')

@section('content')
    <x-page-index title="รายการเบิกอุปกรณ์" edit=""></x-page-index>
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
                    order: [[6, "desc" ]],
                    ordering: true,
                    ajax: {
                        url: '{{ route("oder.index") }}',
                        method: 'GET'
                    },
                    columns: [
                        {
                            data: 'id',
                            className: 'text-center',
                            title: '#'
                        },

                        {
                            data: 'oder_id',
                            className: 'text-center',
                            title: 'รหัสการเบิก'
                        },

                        {
                            data: 'picture',
                            className: 'text-center',
                            title: 'รูป'
                        },

                        {
                            data: 'equ_id',
                            className: 'text-center',
                            title: 'ชื่ออุปกรณ์'
                        },

                        {
                            data: 'oder_total',
                            className: 'text-center',
                            title: 'จำนวน'
                        },

                        {
                            data: 'm_id',
                            className: 'text-center',
                            title: 'คนที่เบิก'
                        },

                        {
                            data: 'created_at',
                            className: 'text-center',
                            title: 'วันที่-เวลา'
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
                    order: [[6, "desc" ]],
                    ordering: true,
                    ajax: {
                        url: '{{ route("oder.index") }}',
                        method: 'GET'
                    },
                    columns: [
                        {
                            data: 'id',
                            className: 'text-center',
                            title: '#'
                        },

                        {
                            data: 'oder_id',
                            className: 'text-center',
                            title: 'รหัสการเบิก'
                        },

                        {
                            data: 'picture',
                            className: 'text-center',
                            title: 'รูป'
                        },

                        {
                            data: 'equ_id',
                            className: 'text-center',
                            title: 'ชื่ออุปกรณ์'
                        },

                        {
                            data: 'oder_total',
                            className: 'text-center',
                            title: 'จำนวน'
                        },

                        {
                            data: 'm_id',
                            className: 'text-center',
                            title: 'คนที่เบิก'
                        },

                        {
                            data: 'oder_date',
                            className: 'text-center',
                            title: 'วันที่-เวลา'
                        },

                        {
                            data: 'oder_status',
                            className: 'text-center',
                            title: 'สถานะ'
                        }
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
