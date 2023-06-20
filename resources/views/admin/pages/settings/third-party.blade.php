@extends('admin.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fas fa-cogs"></i> Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('settings.third_party_show', 1) }}"><i class="fas fa-palette"></i>
                                Third Party
                            </a>
                        </li>
                        <li class="breadcrumb-item active"><i class="fa fa-edit"></i> update</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- content -->
@section('content')
    <!-- open ai settings -->
    <div class="card card-warning">
        <div class="card-header ">
            <h3 class="card-title"><i class="fas fa-cog mr-1"></i> Open Ai Settings </h3>
        </div>
        <div class="card-body">
            {!! Form::model($setting, ['route' => ['settings.update_open_ai_key']]) !!}
            @method('put')

            <!-- OpenAI Api Key field -->
            <div class="form-group {{ $errors->has('openai_api_key') ? 'has-error' : '' }}">
                <div class="option">
                    {!! Form::label('openai_api_key', 'openai api key', ['class' => 'form-label']) !!}
                    <span class="star text-danger">*</span>
                </div>

                {!! Form::text('openai_api_key', old('openai_api_key'), [
                    'class' => 'form-control',
                    'placeholder' => 'Your site title here',
                ]) !!}

                @if ($errors->has('openai_api_key'))
                    <span class="help-block">
                        <strong>{{ $errors->first('openai_api_key') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Default Engine field -->
            <div class="form-group {{ $errors->has('engine_id') ? 'has-error' : '' }}">
                <div class="option">
                    {!! Form::label('engine_id', 'Default Engine', ['class' => 'form-label']) !!}
                    <span class="star text-danger">*</span>
                </div>

                {!! Form::select('engine_id', $engines, old('engine_id'), [
                    'class' => 'form-control',
                    'placeholder' => 'Your site engine_id here',
                ]) !!}

                @if ($errors->has('engine_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('engine_id') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Default Max Tokens field -->
            <div class="form-group {{ $errors->has('default_max_tokens') ? 'has-error' : '' }}">
                <div class="option">
                    {!! Form::label('default_max_tokens', 'Default Max Tokens', ['class' => 'form-label']) !!}
                    <span class="star text-danger">*</span>
                </div>

                {!! Form::number('default_max_tokens', old('default_max_tokens'), [
                    'class' => 'form-control',
                    'placeholder' => '0',
                ]) !!}

                <span class="help-block">
                    Use this calculator <a href="https://platform.openai.com/tokenizer">tkenizer</a> to get accurate
                    estimation
                </span>

                @if ($errors->has('default_max_tokens'))
                    <span class="help-block">
                        <strong>{{ $errors->first('default_max_tokens') }}</strong>
                    </span>
                @endif
            </div>

            <!-- submit button -->
            @permission('update_third_party')
                <div class="form-group">
                    <button type="submit" class="btn btn-warning">
                        <i class="fa fa-pencil"></i>
                        Update
                    </button>
                </div>
            @endpermission

            {!! Form::close() !!}
        </div>
    </div>

    <!-- payPal settings -->
    <div class="card card-info my-4">
        <div class="card-header ">
            <h3 class="card-title"><i class="fas fa-cog mr-1"></i> PayPal Settings </h3>
        </div>
        <div class="card-body">
            {!! Form::model($setting, ['route' => ['settings.update_paypal_settings', 1]]) !!}
            @method('put')

            <!-- PayPal Client ID field -->
            <div class="form-group {{ $errors->has('pp_client') ? 'has-error' : '' }}">
                <div class="option">
                    {!! Form::label('pp_client', 'PayPal Client ID', ['class' => 'form-label']) !!}
                    <span class="star text-danger">*</span>
                </div>

                {!! Form::text('pp_client', old('pp_client'), [
                    'class' => 'form-control',
                    'placeholder' => 'Your site title here',
                ]) !!}

                @if ($errors->has('pp_client'))
                    <span class="help-block">
                        <strong>{{ $errors->first('pp_client') }}</strong>
                    </span>
                @endif
            </div>

            <!-- PayPal Secret field -->
            <div class="form-group {{ $errors->has('pp_secret') ? 'has-error' : '' }}">
                <div class="option">
                    {!! Form::label('pp_secret', 'Default Engine', ['class' => 'form-label']) !!}
                    <span class="star text-danger">*</span>
                </div>

                {!! Form::text('pp_secret', old('pp_secret'), [
                    'class' => 'form-control',
                    'placeholder' => 'Your site title here',
                ]) !!}

                @if ($errors->has('pp_secret'))
                    <span class="help-block">
                        <strong>{{ $errors->first('pp_secret') }}</strong>
                    </span>
                @endif
            </div>

            <!-- PayPal Environment field -->
            <div class="form-group {{ $errors->has('pp_env') ? 'has-error' : '' }}">
                <div class="option">
                    {!! Form::label('pp_env', 'PayPal Environment', ['class' => 'form-label']) !!}
                    <span class="star text-danger">*</span>
                </div>

                {!! Form::select('pp_env', paypal_env_list(), old('pp_env'), [
                    'class' => 'form-control',
                    'placeholder' => 'Please Select',
                ]) !!}

                @if ($errors->has('pp_env'))
                    <span class="help-block">
                        <strong>{{ $errors->first('pp_env') }}</strong>
                    </span>
                @endif
            </div>

            <!-- submit button -->
            @permission('update_third_party')
                <div class="form-group">
                    <button type="submit" class="btn btn-info">
                        <i class="fa fa-pencil"></i>
                        Update
                    </button>
                </div>
            @endpermission

            {!! Form::close() !!}
        </div>
    </div>
@endsection
