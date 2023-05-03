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
            <h3 class="card-title"><i class="fas fa-pencil-ruler mr-1"></i> Engine Information</h3>
        </div>
        <div class="card-body text-capitalize">
            <table class="table table-striped table-bordered text-left">
                <tbody>
                    <tr>
                        <td><strong>ID</strong></td>
                        <td>
                            <p>{{ $engine->id }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>title</strong></td>
                        <td>
                            <p>{{ $engine->title }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>value</strong></td>
                        <td>
                            <p>{{ $engine->value }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('css')
    <style>
        table tbody tr td:first-of-type{
            width:120px
        }
        table tbody tr p{
            margin-bottom: 0;
        }
    </style>
@endpush
