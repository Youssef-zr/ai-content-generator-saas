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
                            <a href="{{ route('settings.content_show', 1) }}"><i class="fas fa-globe"></i>
                                Content
                            </a>
                        </li>
                        <li class="breadcrumb-item active"><i class="fa fa-edit"></i> update</li>
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
            <h3 class="card-title"><i class="fas fa-globe mr-1"></i> Update Content </h3>
        </div>
        <div class="card-body">
            {!! Form::model($setting, ['route' => ['settings.content_update', 1]]) !!}
            @method('put')
            <!-- site title field -->
            <div class="form-group {{ $errors->has('language_id') ? 'has-error' : '' }}">
                <div class="option">
                    {!! Form::label('language_id', 'Default Language', ['class' => 'form-label']) !!}
                    <span class="star text-danger">*</span>
                </div>

                {!! Form::select('language_id', $languages, old('language_id'), [
                    'class' => 'form-control',
                    'placeholder' => 'Please Select',
                ]) !!}

                @if ($errors->has('language_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('language_id') }}</strong>
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
