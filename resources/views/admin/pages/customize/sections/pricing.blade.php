@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fas fa-money"></i> Hero</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('customize.pricing_show') }}"><i class="fas fa-money"></i>
                                Pricing
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
            <h3 class="card-title"><i class="fas fa-money mr-1"></i> Update Pricing Section</h3>
        </div>
        <div class="card-body">
            {!! Form::model($lp, ['route' => 'customize.pricing_update']) !!}
            @method('put')

            <!-- pricing title field -->
            <div class="form-group {{ $errors->has('pricing_title') ? 'has-error' : '' }}">
                {!! Form::label('pricing_title', 'title', ['class' => 'form-label']) !!}
                {!! Form::text('pricing_title', old('pricing_title'), [
                    'class' => 'form-control',
                    'placeholder' => 'Enter a hero title here',
                ]) !!}
                @if ($errors->has('pricing_title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('pricing_title') }}</strong>
                    </span>
                @endif
            </div>

            <!-- pricing subtitle field -->
            <div class="form-group {{ $errors->has('pricing_subtitle') ? 'has-error' : '' }}">
                {!! Form::label('pricing_subtitle', 'subtitle', ['class' => 'form-label']) !!}
                {!! Form::text('pricing_subtitle', old('pricing_subtitle'), [
                    'class' => 'form-control',
                    'placeholder' => 'Enter a hero subtitle here',
                ]) !!}
                @if ($errors->has('pricing_subtitle'))
                    <span class="help-block">
                        <strong>{{ $errors->first('pricing_subtitle') }}</strong>
                    </span>
                @endif
            </div>

            <!-- pricing promotion field -->
            <div class="form-group {{ $errors->has('pricing_promotion') ? 'has-error' : '' }}">
                {!! Form::label('pricing_promotion', 'promotion', ['class' => 'form-label']) !!}
                {!! Form::text('pricing_promotion', old('pricing_promotion'), [
                    'class' => 'form-control',
                    'placeholder' => 'Enter a hero subtitle here',
                ]) !!}
                @if ($errors->has('pricing_promotion'))
                    <span class="help-block">
                        <strong>{{ $errors->first('pricing_promotion') }}</strong>
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
