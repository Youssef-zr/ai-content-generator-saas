<!-- language field -->
<div class="form-group {{ $errors->has('language') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('language', 'Language', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::text('language', old('language'), ['class' => 'form-control', 'placeholder' => 'Enter a language here']) !!}
    @if ($errors->has('language'))
        <span class="help-block">
            <strong>{{ $errors->first('language') }}</strong>
        </span>
    @endif
</div>

<!-- submit button -->
<div class="form-group">
    @if (isset($language))
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
