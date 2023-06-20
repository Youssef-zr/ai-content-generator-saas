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
    @permission('create_block')
        <div class="new-row mb-2">
            <a href="{{ route('blocks.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                New Block
            </a>
        </div>
    @endpermission

    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fas fa-th-large mr-1"></i> Blocks List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hovered w-100" data-remove="{{ route('blocks.delete-all') }}">
                <thead>
                    <tr>
                        <th style="width:5px"></th>
                        <th style="width:20px">#</th>
                        <th>Title</th>
                        <th>subtitle</th>
                        <th>icon</th>
                        @permission(['update_block', 'delete_block'])
                            <th style="width:120px">Actions</th>
                        @endpermission
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blocks as $block)
                        <tr>
                            <td>
                                <div class="icheck-maroon">
                                    <input type="checkbox" value="{{ $block->id }}" name="block_ids[]"
                                        class="form-check-input checkbox-item" id="block-{{ $block->id }}">
                                    <label for="block-{{ $block->id }}"></label>
                                </div>
                            </td>
                            <td>{{ $block->id }}</td>
                            <td>{{ $block->title }}</td>
                            <td>{{ $block->subtitle }}</td>
                            <td>
                                <img src="{{ $block->block_icon }}" alt="{{ $block->title }}" class="img-thumbnail"
                                    style="width:60px;height:60px">
                            </td>

                            @permission(['update_block', 'delete_block'])
                                <td>
                                    @permission('update_block')
                                        <a href="{{ route('blocks.edit', $block->id) }}" class="btn btn-warning btn-sm"
                                            title="edit" data-toggle="tooltip">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    @endpermission

                                    @permission('delete_block')
                                        <button class="btn btn-danger btn-sm open-modal-remove" data-toggle="modal"
                                            data-target="#removeItem" data-url="{{ route('blocks.destroy', $block->id) }}">
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

    <!-- Modal Remove block -->
    @include('admin.modals.remove-item')

    <!-- Modal Remove slected Rows -->
    @include('admin.modals.remove-all')
@endsection
