@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fa fa-keyboard-o"></i> Prompts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('prompts.index') }}"><i class="fa fa-keyboard-o"></i>
                                Prompts
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
        <a href="{{ route('prompts.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i>
            New Prompt
        </a>
    </div>

    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fa fa-keyboard-o mr-1"></i> Prompts List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hovered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width:70px">#</th>
                        <th>Type</th>
                        <th>Title</th>
                        <th>Max Tokens</th>
                        <th>Category</th>
                        <th>Questions</th>
                        <th style="width:140px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prompts as $prompt)
                        <tr>
                            <td>{{ $prompt->id }}</td>
                            <td>{{ $prompt->type }}</td>
                            <td>{{ $prompt->title }}</td>
                            <td>{{ $prompt->max_tokens }}</td>
                            <td>{{ $prompt->category->title }}</td>
                            <td>
                                @foreach ($prompt['questions'] as $question_id)
                                    <span class="badge badge-primary">
                                        {{ $prompt->prompet_question($question_id)->question }}
                                    </span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('prompts.edit', $prompt->id) }}" class="btn btn-warning btn-sm"
                                    title="edit" data-toggle="tooltip">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button class="btn btn-danger btn-sm open-modal-remove" data-toggle="modal"
                                    data-target="#removeItem" data-url="{{ route('prompts.destroy', $prompt->id) }}">
                                    <i class="fa fa-trash" title="delete" data-toggle="tooltip"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Remove Prompt -->
    @include('admin.modals.remove-item')
@endsection
