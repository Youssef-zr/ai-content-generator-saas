<!-- name field -->
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('name', 'name', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::text('name', old('name'), [
        'class' => 'form-control',
        'placeholder' => 'Enter permission name here',
    ]) !!}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<!-- submit button -->
<div class="form-group">
    @if (isset($permission))
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

