@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fas fa-cubes"></i> Plans</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('plans.index') }}"><i class="fas fa-cubes"></i>
                                Plans
                            </a>
                        </li>
                        <li class="breadcrumb-item active"><i class="fa fa-eye"></i> Show</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- content -->
@section('content')
    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fas fa-cubes mr-1"></i> plan Information</h3>
        </div>
        <div class="card-body text-capitalize">
            <table class="table table-striped table-bordered text-left">
                <tbody>
                    <tr>
                        <td><strong>ID</strong></td>
                        <td>
                            <p>{{ $plan->id }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>stripe plan id</strong></td>
                        <td>
                            <p>{{ $plan->stripe_plan_id ?? "---" }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>name</strong></td>
                        <td>
                            <p>{{ $plan->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>description</strong></td>
                        <td>
                            <p>{{ $plan->description }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>price</strong></td>
                        <td>
                            <p>{{ $plan->price }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>type</strong></td>
                        <td>
                            <p>{{ $plan->type }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>word limit</strong></td>
                        <td>
                            <p>{{ $plan->word_limit }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>image limit</strong></td>
                        <td>
                            <p>{{ $plan->image_limit }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('css')
    <style>
        table tbody tr td:first-of-type {
            width: 120px
        }

        table tbody tr p {
            margin-bottom: 0;
        }
    </style>
@endpush
