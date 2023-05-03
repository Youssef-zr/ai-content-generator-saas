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
    <div class="new-row mb-2">
        <a href="{{ route('plans.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i>
            New Plan
        </a>
    </div>

    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fas fa-cubes mr-1"></i> Plans List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hovered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width:70px">#</th>
                        <th>Title</th>
                        <th>Price (Monthly)</th>
                        <th>Price (Yearly)</th>
                        <th>Type</th>
                        <th>word limit</th>
                        <th>image limit</th>
                        <th style="width:120px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{ $plan->id }}</td>
                            <td>{{ $plan->title }}</td>
                            <td>{{ $plan->price_monthly.".00" }}</td>
                            <td>{{ $plan->price_yearly.".00" }}</td>
                            <td>{{ $plan->type }}</td>
                            <td>{{ $plan->word_limit }}</td>
                            <td>{{ $plan->image_limit }}</td>
                            <td>
                                <a href="{{ route('plans.show', $plan->id) }}" class="btn btn-primary btn-sm"
                                    title="show information" data-toggle="tooltip">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-warning btn-sm"
                                    title="edit" data-toggle="tooltip">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button class="btn btn-danger btn-sm open-modal-remove" data-toggle="modal"
                                    data-target="#removeItem" data-url="{{ route('plans.destroy', $plan->id) }}">
                                    <i class="fa fa-trash" data-toggle="tooltip" title="delete"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Remove plan -->
    @include('admin.modals.remove-item')
@endsection
