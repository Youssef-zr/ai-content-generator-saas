@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fas fa-cubes"></i> plans</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('plans.index') }}"><i class="fas fa-cubes"></i>
                                plans
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
    @permission(['create_plan'])
        <div class="new-row mb-2">
            <a href="{{ route('plans.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                New Plan
            </a>
        </div>
    @endpermission

    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fas fa-cubes mr-1"></i> Plans List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hovered w-100" data-remove="{{ route('plans.delete-all') }}">
                <thead>
                    <tr>
                        <th style="width:5px"></th>
                        <th style="width:20px">#</th>
                        <th>Title</th>
                        <th>Price (Monthly)</th>
                        <th>Price (Yearly)</th>
                        <th>Type</th>
                        <th>Word Limit</th>
                        <th>Image Limit</th>
                        @permission(['read_plan', 'update_plan', 'delete_plan'])
                            <th style="width:120px">Actions</th>
                        @endpermission
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                <div class="icheck-maroon">
                                    <input type="checkbox" value="{{ $plan->id }}" name="plan_ids[]"
                                        class="form-check-input checkbox-item" id="plan-{{ $plan->id }}">
                                    <label for="plan-{{ $plan->id }}"></label>
                                </div>
                            </td>
                            <td>{{ $plan->id }}</td>
                            <td>{{ $plan->title }}</td>
                            <td>{{ $plan->price_monthly . '.00' }}</td>
                            <td>{{ $plan->price_yearly . '.00' }}</td>
                            <td>{{ $plan->type }}</td>
                            <td>{{ $plan->word_limit }}</td>
                            <td>{{ $plan->image_limit }}</td>

                            @permission(['read_plan', 'update_plan', 'delete_plan'])
                                <td>
                                    @permission('read_plan')
                                        <a href="{{ route('plans.show', $plan->id) }}" class="btn btn-primary btn-sm"
                                            title="show information" data-toggle="tooltip">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endpermission

                                    @permission('update_plan')
                                        <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-warning btn-sm"
                                            title="edit" data-toggle="tooltip">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    @endpermission

                                    @permission('delete_plan')
                                        <button class="btn btn-danger btn-sm open-modal-remove" data-toggle="modal"
                                            data-target="#removeItem" data-url="{{ route('plans.destroy', $plan->id) }}">
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

    <!-- Modal Remove plan -->
    @include('admin.modals.remove-item')

    <!-- Modal Remove slected Rows -->
    @include('admin.modals.remove-all')
@endsection
