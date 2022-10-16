<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12" id="list_message" style="display: none;">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <small id="message_success"></small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @if ($errors->any())
                <div class="col-sm-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            @if (session('success'))
                <div class="col-sm-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            @if (session('error'))
                <div class="col-sm-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        @php
                            Session::forget('error');
                        @endphp
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            @if ($errors->has('image'))
                <div class="col-sm-12">
                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('image') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            @if ($errors->has('file'))
                <div class="col-sm-12">
                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('file') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ $title }}</h1>
            </div>
            <div class="col-sm-6">
                <div class="form-group row float-right">
                    @if (!empty($back))
                        <a href="{{ $back }}" class="btn btn-outline-primary btn-sm"> <i
                                class="fa fa-arrow-left"></i>&nbsp;ย้อนกลับ</a>&nbsp;
                    @endif

                    @if ($edit == 'show' && Auth::guard('member')->user()->status == 'admin')
                        <button type="button" name="btn_edit" id="btn_edit" style="float: right;"
                            class="btn btn-outline-primary btn-sm"><i
                                class="fa fa-edit font-blue"></i>&nbsp;แก้ไข</button>
                        <button type="button" name="btn_save" id="btn_save" style="float: right; display:none;"
                            class="btn btn-outline-primary btn-sm"><i
                                class="fa fa-floppy-o font-blue"></i>&nbsp;บันทึก</button>&nbsp;
                    @endif

                    @if (!empty($url) && Auth::guard('member')->user()->status == 'admin')
                        <a href="{{ $url }}" class="btn btn-outline-primary btn-sm"><i
                                class="fa fa-plus"></i>&nbsp;เพิ่ม</a>&nbsp;
                    @endif

                    @if (!empty($download) && Auth::guard('member')->user()->status == 'admin')
                        <a href="{{ $download }}" class="btn btn-outline-primary btn-sm"> <i
                                class="fa fa-download"></i>&nbsp;ดาวน์โหลด</a>
                    @endif

                    @if ($search == 'show' && Auth::guard('member')->user()->status == 'admin')
                        <input type="text" class="Like" name="search" id="search" placeholder="ค้นหา">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <form name="updateform" id="updateform">
                                        <table class="table table-hover table-bordered" id="data-table">
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
