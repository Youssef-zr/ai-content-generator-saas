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
        <a href="{{ route('questions.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i>
            New Question
        </a>
    </div>

    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fa fa-question-circle-o mr-1"></i> Questions List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hovered" style="width:100%"
                data-remove="{{ route('questions.delete-all') }}">
                <thead>
                    <tr>
                        <th style="width:5px"></th>
                        <th style="width:20px">#</th>
                        <th>Question</th>
                        <th>Type</th>
                        <th>Required</th>
                        <th>Min Answer Length</th>
                        <th style="width:120px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                        <tr>
                            <td>
                                <div class="icheck-maroon">
                                    <input type="checkbox" value="{{ $question->id }}" name="question_ids[]"
                                        class="form-check-input checkbox-item" id="question-{{ $question->id }}">
                                    <label for="question-{{ $question->id }}"></label>
                                </div>
                            </td>
                            <td>{{ $question->id }}</td>
                            <td>{{ $question->question }}</td>
                            <td>{{ question_type()[$question->type] }}</td>
                            <td>{{ question_is_required()[$question->is_required] }}</td>
                            <td>{{ $question->minimum_answer_length }}</td>
                            <td>
                                <a href="{{ route('questions.show', $question->id) }}" class="btn btn-primary btn-sm"
                                    title="show information" data-toggle="tooltip">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-warning btn-sm"
                                    title="edit" data-toggle="tooltip">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button class="btn btn-danger btn-sm open-modal-remove" data-toggle="modal"
                                    data-target="#removeItem" data-url="{{ route('questions.destroy', $question->id) }}">
                                    <i class="fa fa-trash" data-toggle="tooltip" title="delete"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Remove question -->
    @include('admin.modals.remove-item')

    <!-- Modal Remove slected Rows -->
    @include('admin.modals.remove-all')
@endsection
