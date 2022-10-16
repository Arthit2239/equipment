<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        @if (session('success'))
                            <div class="col-sm-12">
                                <div class="alert  alert-success alert-dismissible fade show" role="alert">
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
                                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
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
                        <h1 class="m-0 text-dark">{{ $title }}</h1>
                    </div>
                    <div class="card-body">
                        <form name="createform" action="{{ $url }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {!! $form !!}
                            <div class="form-group row float-right">
                                <div class="col-sm-12">
                                    <a href="{{ $back }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i>&nbsp;ย้อนกลับ</a>
                                    <button type="submit" name="update" class="btn btn-outline-primary"><i class="fa fa-floppy-o"></i>&nbsp;บันทึก</button>
                                    @if ($loop=='show')
                                        <button type="button" class="btn btn-outline-primary buttondel"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;ลบแถว</button>
                                        <button type="button" class="btn btn-outline-primary" onclick="add_row()"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;เพิ่มแถว</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
