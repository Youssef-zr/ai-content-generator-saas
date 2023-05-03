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

<!-- value field -->
<div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('value', 'Value', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::text('value', old('value'), [
        'class' => 'form-control',
        'placeholder' => 'Enter a value here',
    ]) !!}
    @if ($errors->has('value'))
        <span class="help-block">
            <strong>{{ $errors->first('value') }}</strong>
        </span>
    @endif
</div>


<!-- submit button -->
<div class="form-group">
    @if (isset($engine))
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
