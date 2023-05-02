@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fa fa-question-circle-o"></i> Questions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('questions.index') }}"><i class="fa fa-question-circle-o"></i>
                                Questions
                            </a>
                        </li>
                        <li class="breadcrumb-item active"><i class="fa fa-plus"></i> Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- content -->
@section('content')
    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fa fa-question-circle-o mr-1"></i> New Question</h3>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'questions.store']) !!}
            @include('admin.pages.questions.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
