@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fas fa-book"></i> Story</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('customize.story_show') }}"><i class="fas fa-book"></i>
                                Story
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
            <h3 class="card-title"><i class="fas fa-book mr-1"></i> Update Story Section</h3>
        </div>
        <div class="card-body">
            {!! Form::model($lp, ['route' => 'customize.story_update', 'files' => true]) !!}
            @method('put')

            <!-- story title field -->
            <div class="form-group {{ $errors->has('story_title') ? 'has-error' : '' }}">
                {!! Form::label('story_title', 'title', ['class' => 'form-label']) !!}
                {!! Form::text('story_title', old('story_title'), [
                    'class' => 'form-control',
                    'placeholder' => 'Enter a story title here',
                ]) !!}
                @if ($errors->has('story_title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('story_title') }}</strong>
                    </span>
                @endif
            </div>

            <!-- story subtitle field -->
            <div class="form-group {{ $errors->has('story_subtitle') ? 'has-error' : '' }}">
                {!! Form::label('story_subtitle', 'subtitle', ['class' => 'form-label']) !!}
                {!! Form::text('story_subtitle', old('story_subtitle'), [
                    'class' => 'form-control',
                    'placeholder' => 'Enter a hero subtitle here',
                ]) !!}
                @if ($errors->has('story_subtitle'))
                    <span class="help-block">
                        <strong>{{ $errors->first('story_subtitle') }}</strong>
                    </span>
                @endif
            </div>

            <!-- story promotion field -->
            <div class="form-group {{ $errors->has('story_promotion') ? 'has-error' : '' }}">
                {!! Form::label('story_promotion', 'promotion', ['class' => 'form-label']) !!}
                {!! Form::text('story_promotion', old('story_promotion'), [
                    'class' => 'form-control',
                    'placeholder' => 'Enter a hero subtitle here',
                ]) !!}
                @if ($errors->has('story_promotion'))
                    <span class="help-block">
                        <strong>{{ $errors->first('story_promotion') }}</strong>
                    </span>
                @endif
            </div>

            <!-- story blocks field -->
            <div class="form-group {{ $errors->has('story_blocks') ? 'has-error' : '' }}">
                {!! Form::label('story_blocks', 'Blocks', ['class' => 'form-label']) !!}
                <div class="select mb-2">
                    <button class="btn btn-primary btn-sm" id="select-all"
                        data-blocks="{{ implode(',', $lp->story_blocks) }}">
                        <i class="fa fa-check"></i> Select All
                    </button>
                    <button class="btn btn-danger btn-sm" id="deselect-all">
                        <i class="fa fa-times"></i> Deselect All
                    </button>
                </div>

                {!! Form::select('story_blocks[]', $story_blocks, old('story_blocks[]'), [
                    'class' => 'form-control select-2',
                    'multiple' => 'multiple',
                    'id' => 'story_blocks',
                ]) !!}

                @if ($errors->has('story_blocks'))
                    <span class="help-block">
                        <strong>{{ $errors->first('story_blocks') }}</strong>
                    </span>
                @endif
            </div>

            <!-- story browser image field -->
            <div class="form-group {{ $errors->has('story_browser_image') ? 'has-error' : '' }}">
                <label for="story_browser_image">
                    Browser Image
                </label>

                <small id="story_browser_image" class="form-text text-muted mt-0">
                    Recommended size 1618px x 1010px
                </small>

                <small id="story_browser_image" class="form-text text-muted mt-0">
                    image mimes type : png, jpg, jpeg, fif
                </small>

                <div class="box-input js mt-2">
                    {!! Form::file('story_browser_image', [
                        'class' => 'inputfile inputfile-1',
                        'id' => 'file-1',
                        'data-preview' => '#story_browser_preview',
                        'data-multiple-caption' => '{count} files selected',
                    ]) !!}
                    <label for="file-1">
                        <i class="fa fa-upload"></i>
                        <span>choose file &hellip;</span>
                    </label>
                </div>

                <div class="image">
                    <img src="{{ $lp->story_browser_image_link }}" id="story_browser_preview" class="img-thumbnail"
                        style="max-width: 250px">
                </div>

                @if ($errors->has('story_browser_image'))
                    <span class="help-block d-block mt-2">
                        <strong>{{ $errors->first('story_browser_image') }}</strong>
                    </span>
                @endif
            </div>

            <!-- story phone image field -->
            <div class="form-group {{ $errors->has('story_phone_image') ? 'has-error' : '' }}">
                <label for="story_phone_image">
                    Phone Image
                </label>

                <small id="story_phone_image" class="form-text text-muted mt-0">
                    Recommended size 407px x 867px
                </small>

                <small id="story_phone_image" class="form-text text-muted mt-0">
                    image mimes type : png, jpg, jpeg, fif
                </small>

                <div class="box-input js mt-2">
                    {!! Form::file('story_phone_image', [
                        'class' => 'inputfile inputfile-1',
                        'id' => 'file-2',
                        'data-preview' => '#story_phone_preview',
                        'data-multiple-caption' => '{count} files selected',
                    ]) !!}
                    <label for="file-2">
                        <i class="fa fa-upload"></i>
                        <span>choose file &hellip;</span>
                    </label>
                </div>

                <div class="image">
                    <img src="{{ $lp->story_phone_image_link }}" id="story_phone_preview" class="img-thumbnail"
                        style="max-width: 150px">
                </div>

                @if ($errors->has('story_phone_image'))
                    <span class="help-block d-block mt-2">
                        <strong>{{ $errors->first('story_phone_image') }}</strong>
                    </span>
                @endif
            </div>

            <!-- submit button -->
            @permission('update_story')
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

            let $story_blocks = $('select[id="story_blocks"]');
            $('#select-all').on('click', function(e) {
                e.preventDefault();
                let blocks = $(this).data('blocks');
                let blocks_array = blocks.split(',');

                $story_blocks.val(blocks_array);
                $story_blocks.trigger('change');
            })

            $('#deselect-all').on('click', function(e) {
                e.preventDefault();

                if ($story_blocks.length > 0) {
                    $story_blocks.val(null).trigger('change')
                }
            })
        })
    </script>
@endpush
