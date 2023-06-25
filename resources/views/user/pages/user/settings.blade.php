@extends('user.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fa fa-cogs"></i> Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('user.show_settings') }}"><i class="fa fa-cogs"></i>
                                Settings
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
                    <h3 class="card-title"><i class="fa fa-cogs mr-1"></i> Settings</h3>
                </div>
                <div class="card-body">
                    <!-- form update user settings -->
                    {!! Form::open(['route' => 'user.update_settings', 'files' => true]) !!}
                    @method('put')

                    <!-- language field -->
                    <div class="form-group {{ $errors->has('language_id') ? 'has-error' : '' }}">
                        {!! Form::label('language_id', 'Preferred Output Language', ['class' => 'form-label']) !!}

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-globe"></i></span>
                            </div>
                            {!! Form::select('language_id', $languages, old('language_id', $userDefaultLang), ['class' => 'form-control']) !!}
                        </div>

                        @if ($errors->has('language_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('language_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- submit button -->
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-pencil-square"></i>
                        Save
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
