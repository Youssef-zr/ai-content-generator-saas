<!-- name field -->
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('name', 'name', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::text('name', old('name'), [
        'class' => 'form-control',
        'placeholder' => 'Plan name',
    ]) !!}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<!-- description field -->
<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::text('description', old('description'), [
        'class' => 'form-control',
        'placeholder' => 'Plan description',
    ]) !!}
    @if ($errors->has('description'))
        <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
</div>

<!-- price field -->
<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('price', 'price', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::number('price', old('price'), [
        'class' => 'form-control',
        'placeholder' => 'plan price',
    ]) !!}

    @if ($errors->has('price'))
        <span class="help-block">
            <strong>{{ $errors->first('price') }}</strong>
        </span>
    @endif
</div>

<!-- currency field -->
<div class="form-group {{ $errors->has('currency') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('currency', 'currency', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::select('currency', currency_list(), old('currency'), [
        'class' => 'form-control select-2',
        'placeholder' => 'please select',
    ]) !!}

    @if ($errors->has('currency'))
        <span class="help-block">
            <strong>{{ $errors->first('currency') }}</strong>
        </span>
    @endif
</div>

<!-- billing interval field -->
<div class="form-group {{ $errors->has('billing_interval') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('billing_interval', 'Belling Interval', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::select('billing_interval', plans_belling_interval(), old('billing_interval'), [
        'class' => 'form-control select-2',
        'placeholder' => 'please select',
    ]) !!}

    @if ($errors->has('billing_interval'))
        <span class="help-block">
            <strong>{{ $errors->first('billing_interval') }}</strong>
        </span>
    @endif
</div>

<!-- plan type field -->
<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('type', 'type', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::select('type', plans_type(), old('type'), [
        'class' => 'form-control select-2',
        'placeholder' => 'please select',
    ]) !!}

    @if ($errors->has('type'))
        <span class="help-block">
            <strong>{{ $errors->first('type') }}</strong>
        </span>
    @endif
</div>

<!-- word limit field -->
<div class="form-group {{ $errors->has('word_limit') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('word_limit', 'word limit', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::number('word_limit', old('word_limit'), [
        'class' => 'form-control',
        'placeholder' => 'word limit',
    ]) !!}

    @if ($errors->has('word_limit'))
        <span class="help-block">
            <strong>{{ $errors->first('word_limit') }}</strong>
        </span>
    @endif
</div>

<!-- image limit field -->
<div class="form-group {{ $errors->has('image_limit') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('image_limit', 'image limit', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::number('image_limit', old('image_limit'), [
        'class' => 'form-control',
        'placeholder' => 'image limit',
    ]) !!}

    @if ($errors->has('image_limit'))
        <span class="help-block">
            <strong>{{ $errors->first('image_limit') }}</strong>
        </span>
    @endif
</div>

<!-- submit button -->
<div class="form-group">
    @if (isset($plan))
        <button type="submit" class="btn btn-warning">
            <i class="fa fa-pencil"></i>
            Update
        </button>
    @else
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-plus-circle"></i>
            Create
        </button>
    @endif
</div>

@push('css')
    <link rel="stylesheet" href="{{ url('adminLte/plugins/select2/css/select2.min.css') }}">
@endpush

@push('javascript')
    <script src="{{ url('adminLte/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $(() => {
            $('.select-2').select2()
        })
    </script>
@endpush
