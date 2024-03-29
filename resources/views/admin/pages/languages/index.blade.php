@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fa fa-globe"></i> Languages</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('languages.index') }}"><i class="fa fa-globe"></i>
                                Languages
                            </a>
                        </li>
                        <li class="breadcrumb-item active"><i class="fa fa-list"></i> List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- content -->
@section('content')
    @permission('create_language')
        <div class="new-row mb-2">
            <a href="{{ route('languages.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                New Language
            </a>
        </div>
    @endpermission

    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fa fa-globe mr-1"></i> languages List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hovered w-100" data-remove="{{ route('languages.delete-all') }}">
                <thead>
                    <tr>
                        <th style="width:5px"></th>
                        <th style="width:20px">#</th>
                        <th>Title</th>
                        @permission(['update_language', 'delete_language'])
                            <th style="width:180px">Actions</th>
                        @endpermission
                    </tr>
                </thead>
                <tbody>
                    @foreach ($languages as $language)
                        <tr>
                            <td>
                                <div class="icheck-maroon">
                                    <input type="checkbox" value="{{ $language->id }}" name="language_ids[]"
                                        class="form-check-input checkbox-item" id="language-{{ $language->id }}">
                                    <label for="language-{{ $language->id }}"></label>
                                </div>
                            </td>
                            <td>{{ $language->id }}</td>
                            <td>{{ $language->language }}</td>

                            @permission(['update_language', 'delete_language'])
                                <td>
                                    @permission('update_language')
                                        <a href="{{ route('languages.edit', $language->id) }}" class="btn btn-warning btn-sm"
                                            title="edit" data-toggle="tooltip">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    @endpermission

                                    @permission('delete_language')
                                        <button class="btn btn-danger btn-sm open-modal-remove" data-toggle="modal"
                                            data-target="#removeItem" data-url="{{ route('languages.destroy', $language->id) }}">
                                            <i class="fa fa-trash" title="delete" data-toggle="tooltip"></i>
                                        </button>
                                    @endpermission
                                </td>
                            @endpermission

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Remove language -->
    @include('admin.modals.remove-item')

    <!-- Modal Remove slected Rows -->
    @include('admin.modals.remove-all')
@endsection
