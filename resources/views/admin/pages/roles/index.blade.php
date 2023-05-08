@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fas fa-briefcase"></i> Roles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('roles.index') }}"><i class="fas fa-briefcase"></i>
                                Roles
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
        <a href="{{ route('roles.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i>
            New Role
        </a>
    </div>

    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fas fa-briefcase mr-1"></i> roles List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hovered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width:70px">#</th>
                        <th>Title</th>
                        <th style="width:120px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-primary btn-sm"
                                    title="show information" data-toggle="tooltip">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm" title="edit"
                                    data-toggle="tooltip">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button class="btn btn-danger btn-sm open-modal-remove" data-toggle="modal"
                                    data-target="#removeItem" data-url="{{ route('roles.destroy', $role->id) }}">
                                    <i class="fa fa-trash" data-toggle="tooltip" title="delete"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Remove role -->
    @include('admin.modals.remove-item')
@endsection
