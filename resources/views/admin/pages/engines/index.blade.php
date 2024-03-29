@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fas fa-pencil-ruler"></i> Engines</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('engines.index') }}"><i class="fas fa-pencil-ruler"></i>
                                Engines
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
    @permission('create_engine')
        <div class="new-row mb-2">
            <a href="{{ route('engines.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                New Engine
            </a>
        </div>
    @endpermission

    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fas fa-pencil-ruler mr-1"></i> Engines List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hovered w-100" data-remove="{{ route('engines.delete-all') }}">
                <thead>
                    <tr>
                        <th style="width:5px"></th>
                        <th style="width:20px">#</th>
                        <th>Title</th>
                        <th>Value</th>
                        @permission(['read_engine', 'update_engine', 'delete_engine'])
                            <th style="width:120px">Actions</th>
                        @endpermission
                    </tr>
                </thead>
                <tbody>
                    @foreach ($engines as $engine)
                        <tr>
                            <td>
                                <div class="icheck-maroon">
                                    <input type="checkbox" value="{{ $engine->id }}" name="engine_ids[]"
                                        class="form-check-input checkbox-item" id="engine-{{ $engine->id }}">
                                    <label for="engine-{{ $engine->id }}"></label>
                                </div>
                            </td>
                            <td>{{ $engine->id }}</td>
                            <td>{{ $engine->title }}</td>
                            <td>{{ $engine->value }}</td>

                            @permission(['read_engine', 'update_engine', 'delete_engine'])
                                <td>
                                    @permission('read_engine')
                                        <a href="{{ route('engines.show', $engine->id) }}" class="btn btn-primary btn-sm"
                                            title="show information" data-toggle="tooltip">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endpermission

                                    @permission('update_engine')
                                        <a href="{{ route('engines.edit', $engine->id) }}" class="btn btn-warning btn-sm"
                                            title="edit" data-toggle="tooltip">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    @endpermission

                                    @permission('delete_engine')
                                        <button class="btn btn-danger btn-sm open-modal-remove" data-toggle="modal"
                                            data-target="#removeItem" data-url="{{ route('engines.destroy', $engine->id) }}">
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

    <!-- Modal Remove Engine -->
    @include('admin.modals.remove-item')

    <!-- Modal Remove slected Rows -->
    @include('admin.modals.remove-all')
@endsection
