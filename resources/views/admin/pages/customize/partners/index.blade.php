@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fas fa-users"></i> Partners</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('partners.index') }}"><i class="fas fa-users"></i>
                                Partners
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
    @permission('create_partner')
        <div class="new-row mb-2">
            <a href="{{ route('partners.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                New Partner
            </a>
        </div>
    @endpermission

    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fas fa-users mr-1"></i> Partners List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hovered w-100" data-remove="{{ route('partners.delete-all') }}">
                <thead>
                    <tr>
                        <th style="width:5px"></th>
                        <th style="width:20px">#</th>
                        <th>Title</th>
                        <th>Logo</th>
                        @permission(['update_partner', 'delete_partner'])
                            <th style="width:120px">Actions</th>
                        @endpermission
                    </tr>
                </thead>
                <tbody>
                    @foreach ($partners as $partner)
                        <tr>
                            <td>
                                <div class="icheck-maroon">
                                    <input type="checkbox" value="{{ $partner->id }}" name="partner_ids[]"
                                        class="form-check-input checkbox-item" id="partner-{{ $partner->id }}">
                                    <label for="partner-{{ $partner->id }}"></label>
                                </div>
                            </td>
                            <td>{{ $partner->id }}</td>
                            <td>{{ $partner->title }}</td>
                            <td>
                                <img src="{{ $partner->partner_logo }}" alt="{{ $partner->title }}" class="img-thumbnail"
                                    style="width:60px;height:60px">
                            </td>

                            @permission(['update_partner', 'delete_partner'])
                                <td>
                                    @permission('update_partner')
                                        <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-warning btn-sm"
                                            title="edit" data-toggle="tooltip">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    @endpermission

                                    @permission('delete_partner')
                                        <button class="btn btn-danger btn-sm open-modal-remove" data-toggle="modal"
                                            data-target="#removeItem" data-url="{{ route('partners.destroy', $partner->id) }}">
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

    <!-- Modal Remove Partner -->
    @include('admin.modals.remove-item')

    <!-- Modal Remove slected Rows -->
    @include('admin.modals.remove-all')
@endsection
