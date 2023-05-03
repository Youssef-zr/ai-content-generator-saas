@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fa fa-user"></i> Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('user.show_profile') }}"><i class="fa fa-user"></i>
                                Profile
                            </a>
                        </li>
                        <li class="breadcrumb-item active"><i class="fa fa-eye"></i> show</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- content -->
@section('content')
    <div class="row">
        <!-- user profile information -->
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header ">
                    <h3 class="card-title"><i class="fa fa-user-o mr-1"></i> Information</h3>
                </div>
                <div class="card-body">
                    <!-- form update user information -->
                    {!! Form::model($auth_user, ['route' => 'user.update_information']) !!}
                    @method('put')
                    <!-- name field -->
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <div class="option">
                            {!! Form::label('name', 'name', ['class' => 'form-label']) !!}
                            <span class="star text-danger">*</span>
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                            </div>
                            {!! Form::text('name', old('name'), [
                                'class' => 'form-control',
                                'placeholder' => 'Enter Your Name here',
                            ]) !!}
                        </div>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- email field -->
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <div class="option">
                            {!! Form::label('email', 'email', ['class' => 'form-label']) !!}
                            <span class="star text-danger">*</span>
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            </div>
                            {!! Form::email('email', old('email'), [
                                'class' => 'form-control',
                                'placeholder' => 'Enter Your email here',
                            ]) !!}
                        </div>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- submit button -->
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-pencil-square"></i>
                        Update
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- user password form -->
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header ">
                    <h3 class="card-title"><i class="fa fa-lock mr-1"></i> password</h3>
                </div>
                <div class="card-body">
                    <!-- form update user password -->
                    {!! Form::open(['route' => 'user.update_password']) !!}
                    @method('put')

                    <!-- password field -->
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <div class="option">
                            {!! Form::label('password', 'password', ['class' => 'form-label']) !!}
                            <span class="star text-danger">*</span>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            {!! Form::password('password', [
                                'class' => 'form-control',
                                'placeholder' => 'Enter Your password here',
                            ]) !!}
                        </div>

                        <small class="help-block">must be at least 8 characters in length</small>
                        <small class="help-block"> | one lowercase letter</small>
                        <small class="help-block"> | one uppercase letter</small>
                        <small class="help-block"> | one digit</small>
                        <small class="help-block d-block"> | one special character</small>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- password confirmation field -->
                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <div class="option">
                            {!! Form::label('password_confirmation', 'password confirmation', ['class' => 'form-label']) !!}
                            <span class="star text-danger">*</span>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            {!! Form::password('password_confirmation', [
                                'class' => 'form-control',
                                'placeholder' => 'Enter Your password confirmation here',
                            ]) !!}
                        </div>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- submit button -->
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-pencil-square"></i>
                        Update
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
