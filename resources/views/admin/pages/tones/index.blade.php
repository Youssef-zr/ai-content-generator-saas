@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fas fa-music"></i> Tones</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('tones.index') }}"><i class="fas fa-music"></i>
                                Tones
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
    @permission('create_tone')
        <div class="new-row mb-2">
            <a href="{{ route('tones.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                New Tone
            </a>
        </div>
    @endpermission

    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><i class="fas fa-music mr-1"></i> Tones List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hovered w-100" data-remove="{{ route('tones.delete-all') }}">
                <thead>
                    <tr>
                        <th style="width:5px"></th>
                        <th style="width:20px">#</th>
                        <th>Tone</th>
                        @permission(['read_tone', 'update_tone', 'delete_tone'])
                            <th style="width:120px">Actions</th>
                        @endpermission
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tones as $tone)
                        <tr>
                            <td>
                                <div class="icheck-maroon">
                                    <input type="checkbox" value="{{ $tone->id }}" name="tone_ids[]"
                                        class="form-check-input checkbox-item" id="tone-{{ $tone->id }}">
                                    <label for="tone-{{ $tone->id }}"></label>
                                </div>
                            </td>
                            <td>{{ $tone->id }}</td>
                            <td>{{ $tone->tone }}</td>

                            @permission(['read_tone', 'update_tone', 'delete_tone'])
                                <td>
                                    @permission('read_tone')
                                        <a href="{{ route('tones.show', $tone->id) }}" class="btn btn-primary btn-sm"
                                            title="show information" data-toggle="tooltip">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endpermission

                                    @permission('update_tone')
                                        <a href="{{ route('tones.edit', $tone->id) }}" class="btn btn-warning btn-sm" title="edit"
                                            data-toggle="tooltip">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    @endpermission

                                    @permission('delete_tone')
                                        <button class="btn btn-danger btn-sm open-modal-remove" data-toggle="modal"
                                            data-target="#removeItem" data-url="{{ route('tones.destroy', $tone->id) }}">
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

    <!-- Modal Remove tone -->
    @include('admin.modals.remove-item')

    <!-- Modal Remove slected Rows -->
    @include('admin.modals.remove-all')
@endsection
