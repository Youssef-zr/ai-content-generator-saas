@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fa fa-globe"></i> Languages</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('languages.index') }}"><i class="fa fa-globe"></i>
                                Languages
                            </a>
                        </li>
                        <li class="breadcrumb-item active"><i class="fa fa-pencil"></i> Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- content -->
@section('content')
    <div class="card card-warning">
        <div class="card-header ">
            <h3 class="card-title"><i class="fa fa-pencil-square mr-1"></i> Edit Language</h3>
        </div>
        <div class="card-body">
            {!! Form::model($language, ['route' => ['languages.update', $language->id]]) !!}
            @method("put")
            @include('admin.pages.languages.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
