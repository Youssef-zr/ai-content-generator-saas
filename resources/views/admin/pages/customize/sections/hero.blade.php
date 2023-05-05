@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fas fa-magic"></i> Hero</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('customize.hero_show') }}"><i class="fas fa-magic"></i>
                                Hero
                            </a>
                        </li>
                        <li class="breadcrumb-item active"><i class="fa fa-pencil"></i> Update</li>
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
            <h3 class="card-title"><i class="fas fa-magic mr-1"></i> Update Hero Section</h3>
        </div>
        <div class="card-body">
            {!! Form::model($lp, ['route' => 'customize.hero_update']) !!}
            @method('put')

            <!-- hero title field -->
            <div class="form-group {{ $errors->has('hero_title') ? 'has-error' : '' }}">
                {!! Form::label('hero_title', 'title', ['class' => 'form-label']) !!}
                {!! Form::text('hero_title', old('hero_title'), [
                    'class' => 'form-control',
                    'placeholder' => 'Enter a hero title here',
                ]) !!}
                @if ($errors->has('hero_title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('hero_title') }}</strong>
                    </span>
                @endif
            </div>

            <!-- hero subtitle field -->
            <div class="form-group {{ $errors->has('hero_subtitle') ? 'has-error' : '' }}">
                {!! Form::label('hero_subtitle', 'subtitle', ['class' => 'form-label']) !!}
                {!! Form::text('hero_subtitle', old('hero_subtitle'), [
                    'class' => 'form-control',
                    'placeholder' => 'Enter a hero subtitle here',
                ]) !!}
                @if ($errors->has('hero_subtitle'))
                    <span class="help-block">
                        <strong>{{ $errors->first('hero_subtitle') }}</strong>
                    </span>
                @endif
            </div>

            <!-- call to action field -->
            <div class="form-group {{ $errors->has('hero_cta') ? 'has-error' : '' }}">
                {!! Form::label('hero_cta', 'call to action', ['class' => 'form-label']) !!}
                {!! Form::text('hero_cta', old('hero_cta'), [
                    'class' => 'form-control',
                    'placeholder' => 'Enter a hero subtitle here',
                ]) !!}
                @if ($errors->has('hero_cta'))
                    <span class="help-block">
                        <strong>{{ $errors->first('hero_cta') }}</strong>
                    </span>
                @endif
            </div>

            <!-- promotion field -->
            <div class="form-group {{ $errors->has('hero_promotion') ? 'has-error' : '' }}">
                {!! Form::label('hero_promotion', 'promotion', ['class' => 'form-label']) !!}
                {!! Form::text('hero_promotion', old('hero_promotion'), [
                    'class' => 'form-control',
                    'placeholder' => 'Enter a hero subtitle here',
                ]) !!}
                @if ($errors->has('hero_promotion'))
                    <span class="help-block">
                        <strong>{{ $errors->first('hero_promotion') }}</strong>
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
