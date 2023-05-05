@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fas fa-comments"></i> Testimonial</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('customize.testimonial_show') }}"><i class="fas fa-comments"></i>
                                Testimonial
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
            <h3 class="card-title"><i class="fas fa-comments mr-1"></i> Update Testimonial Section</h3>
        </div>
        <div class="card-body">
            {!! Form::model($lp, ['route' => 'customize.testimonial_update', 'files' => true]) !!}
            @method('put')

            <!-- testimonial name field -->
            <div class="form-group {{ $errors->has('testimonial_name') ? 'has-error' : '' }}">
                {!! Form::label('testimonial_name', 'name', ['class' => 'form-label']) !!}
                {!! Form::text('testimonial_name', old('testimonial_name'), [
                    'class' => 'form-control',
                    'placeholder' => 'Enter a hero title here',
                ]) !!}
                @if ($errors->has('testimonial_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('testimonial_name') }}</strong>
                    </span>
                @endif
            </div>

            <!-- testimonial image field -->
            <div class="row">
                <div class="col-12">
                    <div class="form-group {{ $errors->has('testimonial_avatar') ? 'has-error' : '' }}">
                        <label for="testimonial_avatar">
                            Avatar
                        </label>

                        <small id="status_block" class="form-text text-muted mt-0">
                            Recommended size 514px x 440px
                        </small>

                        <small id="status_block" class="form-text text-muted mt-0">
                            image mimes type : png, jpg, jpeg, fif
                        </small>

                        <div class="box-input js mt-2">
                            {!! Form::file('testimonial_avatar', [
                                'class' => 'inputfile inputfile-1',
                                'id' => 'file-1',
                                'data-preview' => '#testimonial-avatar',
                                'data-multiple-caption' => '{count} files selected',
                            ]) !!}
                            <label for="file-1">
                                <i class="fa fa-upload"></i>
                                <span>choose file &hellip;</span>
                            </label>
                        </div>

                        <div class="image">
                            <img src="{{ $lp->testimonial_img }}" id="testimonial-avatar" class="img-thumbnail"
                                style="max-width: 200px">
                        </div>

                        @if ($errors->has('testimonial_avatar'))
                            <span class="help-block d-block mt-2">
                                <strong>{{ $errors->first('testimonial_avatar') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- testimonial title field -->
            <div class="form-group {{ $errors->has('testimonial_title') ? 'has-error' : '' }}">
                {!! Form::label('testimonial_title', 'title', ['class' => 'form-label']) !!}
                {!! Form::text('testimonial_title', old('testimonial_title'), [
                    'class' => 'form-control',
                    'placeholder' => 'Enter a hero title here',
                ]) !!}
                @if ($errors->has('testimonial_title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('testimonial_title') }}</strong>
                    </span>
                @endif
            </div>

            <!-- testimonial review field -->
            <div class="form-group {{ $errors->has('testimonial_review') ? 'has-error' : '' }}">
                {!! Form::label('testimonial_review', 'review', ['class' => 'form-label']) !!}
                {!! Form::text('testimonial_review', old('testimonial_review'), [
                    'class' => 'form-control',
                    'placeholder' => 'Enter a hero title here',
                ]) !!}
                @if ($errors->has('testimonial_review'))
                    <span class="help-block">
                        <strong>{{ $errors->first('testimonial_review') }}</strong>
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
