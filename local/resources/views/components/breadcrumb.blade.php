<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{!! $title !!}</h1>
            </div>
            {{--  <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                    @foreach ($breadcrumb as $k => $item)
                        @if ($item == $title)
                            <li class="breadcrumb-item">{{ $item }}</li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ url($k) }}">{{ $item }}</a></li>
                        @endif
                    @endforeach
                </ol>
            </div>  --}}
        </div>
    </div>
</div>
