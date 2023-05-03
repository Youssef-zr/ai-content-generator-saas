<!-- title field -->
<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('title', 'Title', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::text('title', old('title'), [
        'class' => 'form-control',
        'placeholder' => 'Enter a title here',
    ]) !!}
    @if ($errors->has('title'))
        <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
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
        'placeholder' => 'Enter a description here',
    ]) !!}
    @if ($errors->has('description'))
        <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
</div>

<!-- price monthly field -->
<div class="form-group {{ $errors->has('price_monthly') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('price_monthly', 'price monthly', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::number('price_monthly', old('price_monthly'), [
        'class' => 'form-control',
        'placeholder' => 'plan monthly price',
    ]) !!}

    @if ($errors->has('price_monthly'))
        <span class="help-block">
            <strong>{{ $errors->first('price_monthly') }}</strong>
        </span>
    @endif
</div>

<!-- price yearly field -->
<div class="form-group {{ $errors->has('price_yearly') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('price_yearly', 'price yearly', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::number('price_yearly', old('price_yearly'), [
        'class' => 'form-control',
        'placeholder' => 'plan yearly price',
    ]) !!}

    @if ($errors->has('price_yearly'))
        <span class="help-block">
            <strong>{{ $errors->first('price_yearly') }}</strong>
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
        'class' => 'form-control',
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

<!-- paypal monthly plan id field -->
<div class="form-group {{ $errors->has('pp_monthly_plan') ? 'has-error' : '' }}">
    {!! Form::label('pp_monthly_plan', 'paypal monthly plan id', ['class' => 'form-label']) !!}
    {!! Form::text('pp_monthly_plan', old('pp_monthly_plan'), [
        'class' => 'form-control',
        'placeholder' => 'paypal monthly plan',
    ]) !!}

    @if ($errors->has('pp_monthly_plan'))
        <span class="help-block">
            <strong>{{ $errors->first('pp_monthly_plan') }}</strong>
        </span>
    @endif
</div>

<!-- paypal yearly plan id field -->
<div class="form-group {{ $errors->has('pp_yearly_plan') ? 'has-error' : '' }}">
    {!! Form::label('pp_yearly_plan', 'paypal yealy plan id', ['class' => 'form-label']) !!}
    {!! Form::text('pp_yearly_plan', old('pp_yearly_plan'), [
        'class' => 'form-control',
        'placeholder' => 'paypal yealy plan',
    ]) !!}

    @if ($errors->has('pp_yearly_plan'))
        <span class="help-block">
            <strong>{{ $errors->first('pp_yearly_plan') }}</strong>
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
