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
    <div class="new-row mb-2">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i>
            New Category
        </a>
    </div>

    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fa fa-tags"></i> Categories List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hovered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width:70px">#</th>
                        <th>Title</th>
                        <th style="width:180px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm"
                                        title="edit">
                                        <i class="fa fa-pencil"></i>
                                        edit
                                    </a>
                                    <button class="btn btn-danger btn-sm open-modal-remove" title="delete"
                                        data-toggle="modal" data-target="#removeItem"
                                        data-url="{{ route('categories.destroy', $category->id) }}">
                                        <i class="fa fa-trash"></i>
                                        delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Remove Category -->
    @include('admin.modals.remove-item')
@endsection
