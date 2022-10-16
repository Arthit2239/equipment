@extends('layout.app')

@section('content')
    @include('components.breadcrumb', ['title' => 'Dashboard'])

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($dashboard as $key => $value)
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-{{ $value->bg }}">
                            <div class="inner">
                                <h2>{{ $value->title }}</h2>
                                <h5>{{ $count[$value->name] }} {{ $value->subtitle }}</h5>
                            </div>
                            <div class="icon">
                                <i class="{{ $value->icon }}"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

