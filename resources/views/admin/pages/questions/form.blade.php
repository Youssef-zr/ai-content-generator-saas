<!-- question field -->
<div class="form-group {{ $errors->has('question') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('question', 'Question', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::text('question', old('question'), [
        'class' => 'form-control',
        'placeholder' => 'Enter a question here',
    ]) !!}
    @if ($errors->has('question'))
        <span class="help-block">
            <strong>{{ $errors->first('question') }}</strong>
        </span>
    @endif
</div>

<!-- type field -->
<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('type', 'type', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::select('type', question_type(), old('question_type'), [
        'class' => 'form-control',
        'placeholder' => 'Please Select',
    ]) !!}
    @if ($errors->has('type'))
        <span class="help-block">
            <strong>{{ $errors->first('type') }}</strong>
        </span>
    @endif
</div>

<!-- is_required field -->
<div class="form-group {{ $errors->has('is_required') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('is_required', 'required', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::select('is_required', question_is_required(), old('is_required'), [
        'class' => 'form-control',
        'placeholder' => 'Please Select',
    ]) !!}
    @if ($errors->has('is_required'))
        <span class="help-block">
            <strong>{{ $errors->first('is_required') }}</strong>
        </span>
    @endif
</div>

<!-- min_answer_length field -->
<div class="form-group {{ $errors->has('minimum_answer_length') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('minimum_answer_length', 'minimum answer length', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::number('minimum_answer_length', old('minimum_answer_length'), [
        'class' => 'form-control',
        'placeholder' => 'minimum answer length',
    ]) !!}
    @if ($errors->has('minimum_answer_length'))
        <span class="help-block">
            <strong>{{ $errors->first('minimum_answer_length') }}</strong>
        </span>
    @endif
</div>

<!-- submit button -->
<div class="form-group">
    @if (isset($question))
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
