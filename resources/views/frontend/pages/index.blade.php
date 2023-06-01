@extends('frontend.layouts.master')
<!-- breadcrumb -->
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="row row-eq-height ">
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
    </style>
@endpush
