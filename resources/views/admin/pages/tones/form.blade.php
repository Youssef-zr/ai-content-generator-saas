<!-- Tone field -->
<div class="form-group {{ $errors->has('tone') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('tone', 'Tone', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::text('tone', old('tone'), [
        'class' => 'form-control',
        'placeholder' => 'Enter a tone here',
    ]) !!}
    @if ($errors->has('tone'))
        <span class="help-block">
            <strong>{{ $errors->first('tone') }}</strong>
        </span>
    @endif
</div>

<!-- submit button -->
<div class="form-group">
    @if (isset($tone))
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
