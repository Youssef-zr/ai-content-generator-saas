@extends('frontend.layouts.master')
<!-- breadcrumb -->
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">History</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><i class="fa fa-history"></i> History</li>
                        <li class="breadcrumb-item active">
                            <i class="fa fa-eye"></i> Show
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fa fa-th-list mr-1"></i> History List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover w-100 text-capitalize text-left"
                data-remove="{{ route('content.delete-all') }}">
                <thead>
                    <tr>
                        <th style="width:5px"></th>
                        <th style="width:20px">#</th>
                        <th>Prompt Title</th>
                        <th>Tone</th>
                        <th>Language</th>
                        <th>Type</th>
                        <th style="width:35%">Questions</th>
                        <th>Image</th>
                        <th style="width:180px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contents as $content)
                        <tr>
                            <td>
                                <div class="icheck-maroon">
                                    <input type="checkbox" value="{{ $content->id }}" name="content_ids[]"
                                        class="form-check-input checkbox-item" id="content-{{ $content->id }}">
                                    <label for="content-{{ $content->id }}"></label>
                                </div>
                            </td>
                            <td>{{ $content->id }}</td>
                            <td>
                                <label class="badge badge-primary">
                                    {{ $content->prompt->title }}
                                </label>
                            </td>
                            <td>
                                @if (isset($content->data['tone_id']))
                                    <label class="badge badge-warning">
                                        {{ $content->tone($content->data['tone_id'])->tone }}
                                    </label>
                                @else
                                    --
                                @endif
                            </td>
                            <td>
                                @if (isset($content->data['language_id']))
                                    <label class="badge badge-warning">
                                        {{ $content->language($content->data['language_id'])->language }}
                                    </label>
                                @else
                                    --
                                @endif
                            </td>
                            <td>
                                @if ($content->type == 'text')
                                    <label class="badge badge-success">{{ $content->type }}</label>
                                @else
                                    <label class="badge badge-info">{{ $content->type }}</label>
                                @endif
                            </td>
                            <td>
                                @foreach ($content->filter_content_questions() as $key => $value)
                                    @if ($value != '')
                                        <label class="badge bg-primary mb-1" data-toggle="tooltip" title="{{ $key }}">
                                            {{ str()->limit($value, 80, '...') }}
                                        </label>
                                        <br>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @if ($content->type == 'image')
                                    <label class="badge badge-success">Yes</label>
                                @else
                                    <label class="badge badge-danger">No</label>
                                @endif
                            </td>
                            <td>
                                @php
                                    $route = $content->type == 'text' ? 'content.edit' : 'image.edit';
                                @endphp

                                <a href="{{ route($route, $content->id) }}" class="btn btn-warning btn-sm" title="Edit"
                                    data-toggle="tooltip">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm open-modal-remove" data-toggle="modal"
                                    data-target="#removeItem" data-url="{{ route('content.destroy', $content->id) }}">
                                    <i class="fa fa-trash" title="Delete" data-toggle="tooltip"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Remove Category -->
    @include('admin.modals.remove-item')

    <!-- Modal Remove slected Rows -->
    @include('admin.modals.remove-all')
@endsection
