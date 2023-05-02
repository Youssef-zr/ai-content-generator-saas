<!-- title field -->
<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('title', 'title', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Enter a title here']) !!}
    @if ($errors->has('title'))
        <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>

<!-- submit button -->
<div class="form-group">
    @if (isset($category))
        <button type="submit" class="btn btn-warning">
            <i class="fa fa-pencil"></i>
            update
        </button>
    @else
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-plus-circle"></i>
          Update
        </button>
    @endif
</div>
