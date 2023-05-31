@extends('frontend.layouts.master')
<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header mb-0">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fa fa-dot-circle-o"></i> {{ $prompt->category->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="fa fa-dot-circle-o"></i>
                            {{ $prompt->category->title }}
                        </li>
                        <li class="breadcrumb-item active"><i class="fa fa-magic"></i> Generate</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- content -->
@section('content')
    @include('frontend.pages.tools.contents.form-create')
@endsection

@push('css')
    <!--  summer note -->
    {{ Html::style('adminLte/plugins/summernote/summernote-bs4.min.css') }}
@endpush

@push('javascript')
    <!-- summernote -->
    {{ Html::script('adminLte/plugins/summernote/summernote-bs4.min.js') }}
    <!-- jQuery validate -->
    {{ Html::script('https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js') }}
    <script>
        $(() => {
            // summernote
            $('#summernote').summernote({
                placeholder: "Start typing, copy, or paste to get started...",
                tabsize: 2,
                height: 338
            });

            // form validation
            $("#formValidation").validate();
        })
    </script>
@endpush
