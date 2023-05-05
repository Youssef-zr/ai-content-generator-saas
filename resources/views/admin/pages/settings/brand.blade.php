@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fas fa-cogs"></i> Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('settings.brand_show', 1) }}"><i class="fas fa-palette"></i>
                                Brand
                            </a>
                        </li>
                        <li class="breadcrumb-item active"><i class="fa fa-edit"></i> Update</li>
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
            <h3 class="card-title"><i class="fas fa-palette mr-1"></i> Update Brand </h3>
        </div>
        <div class="card-body">
            {!! Form::model($setting, ['route' => ['settings.brand_update'], 'files' => true]) !!}
            @method('put')
            <!-- site title field -->
            <div class="form-group {{ $errors->has('site_title') ? 'has-error' : '' }}">
                <div class="option">
                    {!! Form::label('site_title', 'site title', ['class' => 'form-label']) !!}
                    <span class="star text-danger">*</span>
                </div>
                {!! Form::text('site_title', old('site_title'), [
                    'class' => 'form-control',
                    'placeholder' => 'Your site title here',
                ]) !!}

                @if ($errors->has('site_title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('site_title') }}</strong>
                    </span>
                @endif
            </div>

            <!-- slogan field -->
            <div class="form-group {{ $errors->has('slogan') ? 'has-error' : '' }}">
                <div class="option">
                    {!! Form::label('slogan', 'slogan', ['class' => 'form-label']) !!}
                    <span class="star text-danger">*</span>
                </div>
                {!! Form::text('slogan', old('slogan'), [
                    'class' => 'form-control',
                    'placeholder' => 'Your site slogan here',
                ]) !!}

                @if ($errors->has('slogan'))
                    <span class="help-block">
                        <strong>{{ $errors->first('slogan') }}</strong>
                    </span>
                @endif
            </div>

            <!-- logo field -->
            <div class="row">
                <div class="col-12">
                    <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                        <label for="logo">
                            logo
                        </label>

                        <small id="status_block" class="form-text text-muted mt-0">
                            Recommended size 240px x 72px
                        </small>

                        <small id="status_block" class="form-text text-muted mt-0">
                            logo mimes type : png, jpg, jpeg, fif
                        </small>

                        <div class="box-input js mt-2">
                            {!! Form::file('logo', [
                                'class' => 'inputfile inputfile-1',
                                'id' => 'file-1',
                                'data-preview' => '#logo-preview',
                                'data-multiple-caption' => '{count} files selected',
                            ]) !!}
                            <label for="file-1">
                                <i class="fa fa-upload"></i>
                                <span>choose file &hellip;</span>
                            </label>
                        </div>

                        <div class="image">
                            <img src="{{ $setting->siteLogo }}" id="logo-preview" class="img-thumbnail"
                                style="max-width: 200px">
                        </div>

                        @if ($errors->has('logo'))
                            <span class="help-block d-block mt-2">
                                <strong>{{ $errors->first('logo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- favicon field -->
            <div class="row">
                <div class="col-12">
                    <div class="form-group {{ $errors->has('favicon') ? 'has-error' : '' }}">
                        <label for="favicon">
                            favicon
                        </label>

                        <small id="status_block" class="form-text text-muted mt-0">
                            Recommended size 48px x 48px
                        </small>

                        <small id="status_block" class="form-text text-muted mt-0">
                            image mimes type : png, jpg, jpeg, fif
                        </small>

                        <div class="box-input js mt-2">
                            {!! Form::file('favicon', [
                                'class' => 'inputfile inputfile-1',
                                'id' => 'file-2',
                                'data-preview' => '#favicon-preview',
                                'data-multiple-caption' => '{count} files selected',
                            ]) !!}
                            <label for="file-2">
                                <i class="fa fa-upload"></i>
                                <span>choose file &hellip;</span>
                            </label>
                        </div>

                        <div class="image">
                            <img src="{{ $setting->siteFavicon }}" id="favicon-preview" class="img-thumbnail"
                                style="max-width: 50px">
                        </div>

                        @if ($errors->has('favicon'))
                            <span class="help-block d-block mt-2">
                                <strong>{{ $errors->first('favicon') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- email field -->
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                {!! Form::label('email', 'email', ['class' => 'form-label']) !!}
                {!! Form::email('email', old('email'), [
                    'class' => 'form-control',
                    'placeholder' => 'email@example.com',
                ]) !!}

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <!-- adress field -->
            <div class="form-group {{ $errors->has('adress') ? 'has-error' : '' }}">
                {!! Form::label('adress', 'adress', ['class' => 'form-label']) !!}

                {!! Form::text('adress', old('adress'), [
                    'class' => 'form-control',
                    'placeholder' => 'Santa Ana 1010 N Tustin Ave California',
                ]) !!}

                @if ($errors->has('adress'))
                    <span class="help-block">
                        <strong>{{ $errors->first('adress') }}</strong>
                    </span>
                @endif
            </div>

            <!-- phone field -->
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                {!! Form::label('phone', 'phone', ['class' => 'form-label']) !!}
                {!! Form::text('phone', old('phone'), [
                    'class' => 'form-control',
                    'placeholder' => 'Your site phone here',
                ]) !!}

                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>

            <!-- version field -->
            <div class="form-group {{ $errors->has('version') ? 'has-error' : '' }}">
                {!! Form::label('version', 'version', ['class' => 'form-label']) !!}
                {!! Form::text('version', old('version'), [
                    'class' => 'form-control',
                    'placeholder' => 'Your site version here',
                ]) !!}

                @if ($errors->has('version'))
                    <span class="help-block">
                        <strong>{{ $errors->first('version') }}</strong>
                    </span>
                @endif
            </div>

            <!-- submit button -->
            <div class="form-group">
                <button type="submit" class="btn btn-warning">
                    <i class="fa fa-pencil"></i>
                    Update
                </button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
