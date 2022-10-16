<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon@2x.png') }}">
    <title>Equipment</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Datatable -->
    <link href="{{ asset('asset/datatable/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset/datatable/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome 4.7.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--select2 css-->
    <link href="{{ asset('asset/css/select2.min.css') }}" rel="stylesheet" type="text/css">
</head>

<style>
    .font-black {
        color: #2f353b !important;
    }

    .font-red {
        color: #e7505a !important;
    }

    .font-blue {
        color: #3598dc !important;
    }

    .font-green {
        color: green !important;
    }

    .font-yellow {
        color: #ffc107 !important;
    }

    .btn.btn-outline.blue {
        border-color: #000;
        color: #000;
        background: 0 0;
    }

    .btn.btn-outline.dark {
        border-color: #2f353b;
        color: #2f353b;
        background: 0 0;
    }

    .text_none {
        border: 0px;
        text-align: center;
    }

    .dis_select {
        pointer-events: none;
    }

    input[type=number] {
        text-align: right;
    }

    .btn-c {
        outline: 0;
        font-size: 18px;
        outline: 0;
        width: 40px;
        height: 34px;
        line-height: 34px;
        border: 0;
        border-radius: 50%;
        background: transparent;
        text-align: center;
        color: #8D96A3;
    }

    .btn-c.active {
        color: #EF0039;
    }

    .btn-c:hover,
    .btn-c:focus {
        outline: 0;
        background: #fff;
        box-shadow: 0 0 5px rgba(0, 0, 0, .15);
        -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, .15);
    }

    .btn-c.member {
        overflow: hidden;
        margin-top: 5px;
        padding: 0;
        /* border: 1px solid #eee; */
    }

    .btn-c.member span {
        background: #eee;
        position: relative;
        display: block;
        width: 100%;
        height: 100%;
    }

    .btn-c.member img {
        top: 0;
        left: 0;
        /* max-width: 100%; */
        max-height: 100%;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 30px !important;
    }

    .select2-container .select2-selection--single {
        height: 40px !important;
    }

    .select2-selection--single .select2-selection__arrow {
        height: 40px !important;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout.navbar')
        <!-- /.navbar -->

        <!-- sidebar -->
        @include('layout.sidebar')
        <!-- sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>

        <!-- footer -->
        @include('layout.footer')
        <!-- footer -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <div id="list_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ url()->current() }}/savemodal" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="list_modal_title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="list_modal_detail"></div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark">บันทึก</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">ปิด</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<!-- jQuery -->
<script type="text/javascript" src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script type="text/javascript" src="{{ asset('asset/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script type="text/javascript">
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script type="text/javascript" src="{{ asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script type="text/javascript" src="{{ asset('asset/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script type="text/javascript" src="{{ asset('asset/plugins/sparklines/sparkline.js') }}"></script>
<!-- jQuery Knob Chart -->
<script type="text/javascript" src="{{ asset('asset/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="{{ asset('asset/plugins/moment/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script type="text/javascript"
    src="{{ asset('asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script type="text/javascript" src="{{ asset('asset/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script type="text/javascript" src="{{ asset('asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}">
</script>
<!-- AdminLTE App -->
<script type="text/javascript" src="{{ asset('asset/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script type="text/javascript" src="{{ asset('asset/js/pages/dashboard.js') }}"></script> --}}
<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src="{{ asset('asset/js/demo.js') }}"></script>
<!-- Datatable -->
<script type="text/javascript" src="{{ asset('asset/datatable/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/datatable/buttons.dataTables.min.js') }}"></script>
<!--select2 js-->
<script type="text/javascript" src="{{ asset('asset/js/select2.min.js') }}"></script>
<!-- Texteditor -->
<script type="text/javascript" src="{{ asset('asset/ckeditor/ckeditor.js') }}"></script>
<!-- sweetalert -->
{{-- <script type="text/javascript" src="{{ asset('asset/js/sweetalert.min.js') }}"></script> --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Token -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<!-- Cookie Menu -->
<script type="text/javascript">
    $(window).on('load', function() {
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');

        if (ca[0] == 'status=open') {
            var menu_id = ca[1].split('=');
            $('.menu_sub' + menu_id[1]).removeClass("nav-treeview");
        }

        if (ca[0] == 'status=close') {
            var menu_id = ca[1].split('=');
            $('.menu_sub' + menu_id[1]).addClass("nav-treeview");
        }
    });

    var Clicked = 0;

    $(".menu_sub_action").on("click", function(event) {

        Clicked++;

        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');

        for (var i = 0; i < ca.length; i++) {
            document.cookie = ca[i] + "=;expires=" +
                new Date(0).toUTCString();
        }

        if (Clicked % 2 == 0) {
            document.cookie = 'status=close;';
        } else {
            document.cookie = 'status=open;';
        }
        document.cookie = "menu_id=" + this.id + ";";

        location.reload();
    });
</script>

<!-- datepicker -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });

        $('.select2').select2({
            width: '100%',
        });

        $('#list_modal').modal('hide');
    });
</script>

<script type="text/javascript">
    $('.Like').on('keyup', function(e) {
        oTable.draw();
    });
</script>

<!-- function get modal -->
<script type="text/javascript">
    function getModal(url_modal) {
        $.ajax({
            url: url_modal,
            type: "GET",
            dataType: 'text',
            async: true,
            success: function(data) {
                let object = JSON.parse(data, true);
                console.log(object);
                $("#list_modal").modal('show');
                $("#list_modal_title").text(object.title);
                $("#list_modal_detail").html(object.detail);
            },
            error: function(data) {
                alert('Error');
            }
        });
    }
</script>

<!-- function Edit By Array -->
<script type="text/javascript">
    $("#btn_save").on("click", function(event) {
        event.preventDefault();
        var form = document.forms.namedItem("updateform");
        var formData = new FormData(form);
        $.ajax({
            url: "{{ url()->current() }}/updatearray",
            data: formData,
            processData: false,
            contentType: false,
            type: "POST",
            async: true,
            success: function(data) {
                $("#list_message").show();
                $("#message_success").text(data.message);
                oTable.clear().draw();
            },
            error: function(data) {
                alert('Error');
            }
        });
    });
</script>

<!-- function Copy -->
<script>
    function ConfirmCopy(url_redirect) {
        if (window.confirm("คุณต้องการคัดลอกข้อมูลนี้หรือไม่?")) {
            $.ajax({
                url: url_redirect,
                type: "GET",
                dataType: 'JSON',
                async: true,
                success: function(data) {
                    oTable.clear().draw();
                },
                error: function(data) {
                    alert('Error');
                }
            });
        }
    }
</script>

<!-- function Delete -->
<script>
    function ConfirmDelete(url_redirect) {
        if (confirm("คุณต้องการลบข้อมูลนี้หรือไม่ ?")) {
            $.ajax({
                url: url_redirect,
                type: "DELETE",
                dataType: 'JSON',
                async: true,
                success: function(data) {
                    oTable.clear().draw();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    }
</script>

<!-- Action Button -->
<script type="text/javascript">
    $('#btn_edit').click(function() {
        $('#btn_edit').hide();
        $('#btn_save').show();
        $("select").removeClass("dis_select");
        $('.edit').attr('readonly', false);
    });

    $('#btn_save').click(function() {
        $('#btn_edit').show();
        $('#btn_save').hide();
        $("select").addClass("dis_select");
        $('.edit').attr('readonly', true);
    });
</script>

<!-- custom-file -->
<script type="text/javascript">
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

<!-- Scripts -->
@yield('script')

</html>
