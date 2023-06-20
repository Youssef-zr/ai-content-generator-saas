@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fa fa-tags"></i> Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('categories.index') }}"><i class="fa fa-tags"></i>
                                Categories
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
    @permission('create_category')
        <div class="new-row mb-2">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                New Category
            </a>
        </div>
    @endpermission

    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fa fa-tags mr-1"></i> Categories List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hovered w-100" data-remove="{{ route('categories.delete-all') }}">
                <thead>
                    <tr>
                        <th style="width:5px"></th>
                        <th style="width:20px">#</th>
                        <th>Title</th>
                        @permission(['update_category', 'delete_category'])
                            <th style="width:180px">Actions</th>
                        @endpermission
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                <div class="icheck-maroon">
                                    <input type="checkbox" value="{{ $category->id }}" name="category_ids[]"
                                        class="form-check-input checkbox-item" id="category-{{ $category->id }}">
                                    <label for="category-{{ $category->id }}"></label>
                                </div>
                            </td>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            
                            @permission(['update_category', 'delete_category'])
                                <td>
                                    @permission('update_category')
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm"
                                            title="edit" data-toggle="tooltip">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    @endpermission

                                    @permission('delete_category')
                                        <button class="btn btn-danger btn-sm open-modal-remove" data-toggle="modal"
                                            data-target="#removeItem" data-url="{{ route('categories.destroy', $category->id) }}">
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

    <!-- Modal Remove Category -->
    @include('admin.modals.remove-item')

    <!-- Modal Remove slected Rows -->
    @include('admin.modals.remove-all')
@endsection
