<!-- type field -->
<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('type', 'type', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::select('type', prompt_type_list(), old('type'), [
        'class' => 'form-control',
        'placeholder' => 'Please select',
    ]) !!}
    @if ($errors->has('type'))
        <span class="help-block">
            <strong>{{ $errors->first('type') }}</strong>
        </span>
    @endif
</div>

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

<!-- desription field -->
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

<!-- prompt field -->
<div class="form-group {{ $errors->has('prompt') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('prompt', 'prompt', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::textarea('prompt', old('prompt'), [
        'class' => 'form-control',
        'rows' => 5,
        'placeholder' => 'Enter a prompt here',
    ]) !!}
    @if ($errors->has('prompt'))
        <span class="help-block">
            <strong>{{ $errors->first('prompt') }}</strong>
        </span>
    @endif
</div>

<!-- engine field -->
<div class="form-group {{ $errors->has('engine_id') ? 'has-error' : '' }}">
    {!! Form::label('engine_id', 'engine', ['class' => 'form-label']) !!}
    {!! Form::select('engine_id', $engines, old('engine_id'), [
        'class' => 'form-control',
        'placeholder' => 'Please select',
    ]) !!}
    <span class="help-block mt-1 d-block">If not set, default engine set in third-party settings will be used.</span>
    @if ($errors->has('engine_id'))
        <span class="help-block">
            <strong>{{ $errors->first('engine_id') }}</strong>
        </span>
    @endif
</div>

<!-- max tokens field -->
<div class="form-group {{ $errors->has('max_tokens') ? 'has-error' : '' }}">
    {!! Form::label('max_tokens', 'max tokens', ['class' => 'form-label']) !!}
    {!! Form::number('max_tokens', old('max_tokens'), ['class' => 'form-control', 'placeholder' => '0']) !!}
    <span class="help-block mt-1 d-block">
        If not set, default max-tokens set in third-party settings will be used.
    </span>
    @if ($errors->has('max_tokens'))
        <span class="help-block">
            <strong>{{ $errors->first('max_tokens') }}</strong>
        </span>
    @endif
</div>

<!-- category field -->
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('category_id', 'Category', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::select('category_id', $categories, old('category_id'), [
        'class' => 'form-control',
        'placeholder' => 'Please select',
    ]) !!}
    @if ($errors->has('category_id'))
        <span class="help-block">
            <strong>{{ $errors->first('category_id') }}</strong>
        </span>
    @endif
</div>

<!-- tone field -->
<div class="form-group {{ $errors->has('tone_id') ? 'has-error' : '' }}">
    {!! Form::label('tone_id', 'default Tone', ['class' => 'form-label']) !!}
    {!! Form::select('tone_id', $tones, old('tone_id'), [
        'class' => 'form-control',
        'placeholder' => 'Please select',
    ]) !!}
    @if ($errors->has('tone_id'))
        <span class="help-block">
            <strong>{{ $errors->first('tone_id') }}</strong>
        </span>
    @endif
</div>

<!-- questions field -->
<div class="form-group {{ $errors->has('questions') ? 'has-error' : '' }}">
    {!! Form::label('questions', 'Questions', ['class' => 'form-label']) !!}

    <div class="questions-container">
        <div class="row">
            <div class="col-md-8 col-lg-6">
                <!-- question list -->
                <div class="question-list">
                    <!-- this code must be run in edit mode only-->
                    @if (isset($prompt) and count($prompt['questions']) > 1)
                        @foreach ($prompt['questions'] as $question)
                            <!-- question item -->
                            <div class="row question-item mb-3">
                                <div class="col-md-9 col-lg-10 question">
                                    {!! Form::select('questions[]', $questions, old('questions[]', $question), [
                                        'class' => 'form-control',
                                        'placeholder' => 'Please Select',
                                    ]) !!}
                                    @if ($errors->has('questions[]'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('questions[]') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-3 col-lg-2">
                                    <button class="remove-question btn btn-danger btn-sm mt-1">
                                        <i class="fa fa-times"></i>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- runing in creation only -->
                        <!-- question item -->
                        <div class="row question-item mb-3">
                            <div class="col-md-9 col-lg-10 question">
                                {!! Form::select('questions[]', $questions, old('questions[]'), [
                                    'class' => 'form-control',
                                    'placeholder' => 'Please Select',
                                ]) !!}
                                @if ($errors->has('questions[]'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('questions[]') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <button class="remove-question btn btn-danger d-none">
                                    <i class="fa fa-times"></i>
                                    Delete
                                </button>
                            </div>
                        </div>
                    @endif
                    <!-- end edit mode-->
                </div>
            </div>
        </div>

        <div class="add-new-question">
            <button class="btn btn-info">
                <i class="fa fa-plus-circle"></i> Add Question
            </button>
        </div>
    </div>
</div>

<!-- submit button -->
<div class="form-group">
    @if (isset($prompt))
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

@push('javascript')
    <script>
        $(() => {

            // remove remove button from quastion item
            $('.remove-question').first().addClass("d-none");
            // add more questions
            $('.add-new-question').on('click', function(e) {
                e.preventDefault();
                let question_list = $('.question-list');
                let question_items = $('.question-item');

                question_list.append(question_items.first().clone());

                let btnRemoveQuestion = $('.remove-question');

                btnRemoveQuestion.removeClass('d-none');
                btnRemoveQuestion.first().addClass('d-none');
                
                $('.question-item').last().find('select').val('');
            });

            // remove question
            $('body').on('click', ".remove-question", function(e) {
                e.preventDefault();
                $(this).parentsUntil('.question-item').parent().remove();
            })
        })
    </script>
@endpush
