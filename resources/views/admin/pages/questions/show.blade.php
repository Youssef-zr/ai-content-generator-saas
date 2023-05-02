@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fa fa-question-circle-o"></i> Questions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('questions.index') }}"><i class="fa fa-question-circle-o"></i>
                                Questions
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
            <h3 class="card-title"><i class="fa fa-question-circle-o mr-1"></i> Question Information</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered text-left">
                <tbody>
                    <tr>
                        <td><strong>ID</strong></td>
                        <td>
                            <p>{{ $question->id }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Question</strong></td>
                        <td>
                            <p>{{ $question->question }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Type</strong></td>
                        <td>
                            <p>{{ question_type()[$question->type] }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Required</strong></td>
                        <td>
                            <p>{{ question_is_required()[$question->is_required] }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Minumum Answer length</strong></td>
                        <td>
                            <p>{{ $question->minimum_answer_length }}</p>
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
