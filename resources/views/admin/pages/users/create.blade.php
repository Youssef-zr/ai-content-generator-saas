@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fa fa-users"></i> users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('users.index') }}"><i class="fa fa-users"></i>
                                users
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
            <h3 class="card-title"><i class="fa fa-user mr-1"></i> New User</h3>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'users.store']) !!}
            @include('admin.pages.users.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
