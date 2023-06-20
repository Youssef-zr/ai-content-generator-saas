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
            {!! Form::model($lp, ['route' => 'customize.hero_update', 'files' => true]) !!}
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

            <!-- hero image -->
            <div class="form-group {{ $errors->has('hero_image') ? 'has-error' : '' }}">
                <label for="hero_image">
                    Image
                </label>

                <small id="status_block" class="form-text text-muted mt-0">
                    Recommended size 1098px x 740px
                </small>

                <small id="status_block" class="form-text text-muted mt-0">
                    image mimes type : png, jpg, jpeg, gif
                </small>

                <div class="box-input js mt-2">
                    {!! Form::file('hero_image', [
                        'class' => 'inputfile inputfile-1',
                        'id' => 'file-1',
                        'data-preview' => '#hero-preview',
                        'data-multiple-caption' => '{count} files selected',
                    ]) !!}
                    <label for="file-1">
                        <i class="fa fa-upload"></i>
                        <span>choose file &hellip;</span>
                    </label>
                </div>

                <div class="image">
                    @if (isset($lp))
                        <img src="{{ url($lp->hero_image) }}" id="hero-preview" class="img-thumbnail"
                            style="max-width: 300px">
                    @else
                        <img src="{{ url('/assets/dist/storage/customize/hero/default.png') }}" id="hero-preview"
                            class="img-thumbnail" style="max-width: 300px">
                    @endif
                </div>

                @if ($errors->has('hero_image'))
                    <span class="help-block d-block mt-2">
                        <strong>{{ $errors->first('hero_image') }}</strong>
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
            @permission('update_hero')
                <div class="form-group">
                    <button type="submit" class="btn btn-warning">
                        <i class="fa fa-pencil"></i>
                        Update
                    </button>
                </div>
            @endpermission

            {!! Form::close() !!}
        </div>
    </div>
@endsection
