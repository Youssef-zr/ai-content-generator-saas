@extends('user.layouts.master')
<!-- breadcrumb -->
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><span class="fa fa-briefcase"></span> Library</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><i class="fa fa-briefcase"></i> Library</li>
                        <li class="breadcrumb-item active"><i class="fa fa-th-list"></i> List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <!-- start library list -->
    <div class="library-header-info py-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="row align-items-center">
                    <!-- start content -->
                    <div class="col-md-7">
                        <div class="library-content">
                            <div class="library-title text-uppercase">
                                <h1 class="text-dark">
                                    Explore <span class="">your possibilities</span> with powerful
                                    dashboard.
                                </h1>
                            </div>
                            <div class="library-content">
                                <p class="text-dark">
                                    Unlock the full potential of your projects with <br> our comprehensive suite of tools
                                    designed <br> for seamless collaboration and easy navigation
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- start image -->
                    <div class="col-md-5">
                        <img src="{{ url('https://genie.krashless.com/svg/illustrations/oc-building-apps.svg') }}"
                            class="img-responsive" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- start library list -->
    <div class="library-list">
        <div class="row ">
            @foreach ($prompts as $prompt)
                <div class="col-md-4 col-xl-3 mb-2 d-flex align-items-stretch">
                    <div class="card">
                        <a href="{{ userUrl('content/new?category=' . $prompt->category->id . '&prompt=' . $prompt->id) }}">
                            <div class="card-header bg-gradient-primary">
                                <div class="card-outline">
                                    <h5 class="mb-0 text-light">
                                        <i class="fa fa-th-list text-light mr-1"></i>
                                        {{ $prompt->category->title }}
                                    </h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="prompt_title">
                                    <h5>{{ $prompt->title }}</h5>
                                </div>
                                <div class="prompt_description">
                                    <p class="text-dark">{{ $prompt->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('css')
    <style>
        .prompt_title h5 {
            color: #222;
            margin-bottom: 4px;
        }

        .text-underline {
            text-decoration: underline
        }

        .img-responsive {
            max-width: 100%;
        }

        .library-header-info {
            margin-bottom: 40px;
            position: relative;
        }
        .library-header-info .row
        {
            position: relative;
            z-index: 2

        }

        .library-header-info::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            border:1px solid #eee;
            border-radius: 8px;
            z-index: 1
        }

        .library-title h1 {
            color: #1c8aff !important;
            font-weight: 700;
            font-size: 37px
        }

        .library-content p {
            margin-top: 10px;
            font-size: 22px;
            line-height: 1.2;
            text-transform: capitalize
        }
    </style>
@endpush
