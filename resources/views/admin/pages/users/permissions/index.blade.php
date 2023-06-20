@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fas fa-unlock-alt"></i> Permissions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('permissions.index') }}"><i class="fas fa-unlock-alt"></i>
                                Permissions
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
    @permission('create_permission')
        <div class="new-row mb-2">
            <a href="{{ route('permissions.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                New Role
            </a>
        </div>
    @endpermission

    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fas fa-unlock-alt mr-1"></i> permissions List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hovered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width:70px">#</th>
                        <th>Title</th>
                        @permission(['update_permission', 'delete_permission'])
                            <th style="width:120px">Actions</th>
                        @endpermission
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>

                            @permission(['update_permission', 'delete_permission'])
                                <td>
                                    @permission('update_permission')
                                        <a href="{{ route('permissions.edit', $role->id) }}" class="btn btn-warning btn-sm"
                                            title="edit" data-toggle="tooltip">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    @endpermission

                                    @permission('delete_permission')
                                        <button class="btn btn-danger btn-sm open-modal-remove" data-toggle="modal"
                                            data-target="#removeItem" data-url="{{ route('permissions.destroy', $role->id) }}">
                                            <i class="fa fa-trash" data-toggle="tooltip" title="delete"></i>
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

    <!-- Modal Remove role -->
    @include('admin.modals.remove-item')
@endsection
