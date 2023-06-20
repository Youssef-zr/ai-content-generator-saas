@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fa fa-users"></i> Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('users.index') }}"><i class="fa fa-users"></i>
                                Users
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
    @permission('create_user')
        <div class="new-row mb-2">
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                New User
            </a>
        </div>
    @endpermission

    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fa fa-users mr-1"></i> Users List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hovered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width:70px">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        @permission(['read_user', 'update_user', 'delete_user'])
                            <th style="width:120px">Actions</th>
                        @endpermission
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <label class="badge bg-primary">
                                        {{ $role->name }}
                                    </label>
                                @endforeach
                            </td>

                            @permission(['read_user', 'update_user', 'delete_user'])
                                <td>
                                    @permission('read_user')
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary btn-sm"
                                            title="show information" data-toggle="tooltip">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endpermission

                                    @permission('update_user')
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm" title="edit"
                                            data-toggle="tooltip">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    @endpermission

                                    @permission('delete_user')
                                        <button class="btn btn-danger btn-sm open-modal-remove" data-toggle="modal"
                                            data-target="#removeItem" data-url="{{ route('users.destroy', $user->id) }}">
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

    <!-- Modal Remove user -->
    @include('admin.modals.remove-item')
@endsection
