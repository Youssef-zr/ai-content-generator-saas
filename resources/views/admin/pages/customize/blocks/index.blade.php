@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fas fa-th-large"></i> blocks</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('blocks.index') }}"><i class="fas fa-th-large"></i>
                                blocks
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
        <a href="{{ route('blocks.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i>
            New Block
        </a>
    </div>

    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fas fa-th-large mr-1"></i> Blocks List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hovered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width:70px">#</th>
                        <th>Title</th>
                        <th>subtitle</th>
                        <th>icon</th>
                        <th style="width:120px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blocks as $block)
                        <tr>
                            <td>{{ $block->id }}</td>
                            <td>{{ $block->title }}</td>
                            <td>{{ $block->subtitle }}</td>
                            <td>
                                <img src="{{ $block->block_icon }}" alt="{{ $block->title }}" class="img-thumbnail" style="width:60px;height:60px">
                            </td>
                            <td>
                                <a href="{{ route('blocks.edit', $block->id) }}" class="btn btn-warning btn-sm"
                                    title="edit" data-toggle="tooltip">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button class="btn btn-danger btn-sm open-modal-remove" data-toggle="modal"
                                    data-target="#removeItem" data-url="{{ route('blocks.destroy', $block->id) }}">
                                    <i class="fa fa-trash" data-toggle="tooltip" title="delete"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Remove block -->
    @include('admin.modals.remove-item')
@endsection
