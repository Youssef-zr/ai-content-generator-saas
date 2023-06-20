@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fa fa-file"></i> Landing Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('customize.landing_page_show') }}"><i class="fa fa-file"></i>
                                Landing Page
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
            <h3 class="card-title"><i class="fa fa-file mr-1"></i> Update Landing Page</h3>
        </div>
        <div class="card-body">
            {!! Form::model($lp, ['route' => 'customize.landing_page_update']) !!}
            @method('put')

            <!-- hero title field -->
            <div class="form-group {{ $errors->has('hero_title') ? 'has-error' : '' }}">
                <div class="option">
                    {!! Form::label('hero_title', 'hero', ['class' => 'form-label']) !!}
                    <span class="star text-danger">*</span>
                </div>
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

            <!-- partners field -->
            <div class="form-group {{ $errors->has('partners') ? 'has-error' : '' }}">
                <div class="option">
                    {!! Form::label('partners', 'Partners', ['class' => 'form-label']) !!}
                    <span class="star text-danger">*</span>
                </div>
                <div class="select mb-2">
                    <button class="btn btn-primary btn-sm" id="select-all" data-blocks="{{ implode(',', $lp->partners) }}">
                        <i class="fa fa-check"></i> Select All
                    </button>
                    <button class="btn btn-danger btn-sm" id="deselect-all">
                        <i class="fa fa-times"></i> Deselect All
                    </button>
                </div>

                {!! Form::select('partners[]', $partners, old('partners[]'), [
                    'class' => 'form-control select-2',
                    'multiple' => 'multiple',
                    'id' => 'partners',
                ]) !!}

                @if ($errors->has('partners'))
                    <span class="help-block">
                        <strong>{{ $errors->first('partners') }}</strong>
                    </span>
                @endif
            </div>

            <!-- story title field -->
            <div class="form-group {{ $errors->has('story_title') ? 'has-error' : '' }}">
                <div class="option">
                    {!! Form::label('story_title', 'story', ['class' => 'form-label']) !!}
                    <span class="star text-danger">*</span>
                </div>
                {!! Form::text('story_title', old('story_title'), [
                    'class' => 'form-control',
                    'placeholder' => 'Enter a hero title here',
                ]) !!}
                @if ($errors->has('story_title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('story_title') }}</strong>
                    </span>
                @endif
            </div>

            <!-- pricing title field -->
            <div class="form-group {{ $errors->has('pricing_title') ? 'has-error' : '' }}">
                <div class="option">
                    {!! Form::label('pricing_title', 'pricing', ['class' => 'form-label']) !!}
                    <span class="star text-danger">*</span>
                </div>
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

            <!-- testimonial review field -->
            <div class="form-group {{ $errors->has('testimonial_review') ? 'has-error' : '' }}">
                <div class="option">
                    {!! Form::label('testimonial_review', 'testimonial', ['class' => 'form-label']) !!}
                    <span class="star text-danger">*</span>
                </div>
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
            @permission('update_landing_page')
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

@push('css')
    {{ Html::style('adminLte/plugins/select2/css/select2.css') }}
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #1c0656;
            border: 1px solid #1c0656;
            padding: 0 5px 2px;
        }
    </style>
@endpush

@push('javascript')
    {{ Html::script('adminLte/plugins/select2/js/select2.js') }}

    <script>
        $(() => {
            $('.select-2').select2();

            let $partners = $('select[id="partners"]');
            $('#select-all').on('click', function(e) {
                e.preventDefault();
                let blocks = $(this).data('blocks');
                let blocks_array = blocks.split(',');

                $partners.val(blocks_array);
                $partners.trigger('change');
            })

            $('#deselect-all').on('click', function(e) {
                e.preventDefault();

                if ($partners.length > 0) {
                    $partners.val(null).trigger('change')
                }
            })
        })
    </script>
@endpush
