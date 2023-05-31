<!-- start row -->
<div class="row">
    <!-- prompt description -->
    <div class="col-12">
        <div class="bg-primary d-inline-block mb-3 px-3 py-2 rounded">
            <h5 class="mb-0"><i class="fa fa-question-circle"></i> {{ $prompt->description }}</h5>
        </div>
    </div>

    <!-- start form fields -->
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header ">
                <h3 class="card-title float-none"><i class="fa fa-magic mr-1"></i> {{ $prompt->title }}</h3>
            </div>
            <div class="card-body">
                <form class="cmxform" id="formValidation">
                    <!-- prompt id field -->
                    {!! Form::hidden('prompt_id', old('prompt_id', $prompt->id)) !!}

                    <!-- questions fields -->
                    @foreach ($prompt->questions as $question)
                        @php
                            $QField = $prompt->prompet_question($question);
                        @endphp

                        <!-- question  field -->
                        <div class="form-group">
                            <div class="option">
                                {!! Form::label('question_' . $question, $QField->question, ['class' => 'form-label']) !!}
                                @if ($QField->is_required == 'required')
                                    <span class="star text-danger">*</span>
                                @else
                                    <small class="text-muted">(optional)</small>
                                @endif
                            </div>

                            @if ($QField->type == 'single_line')
                                {!! Form::text('question_' . $question, old('question_' . $question), [
                                    'class' => 'form-control question',
                                    $QField->is_required == 'required' ? 'required' : '',
                                    'minlength' => $QField->minimum_answer_length,
                                ]) !!}
                            @else
                                {!! Form::textarea('question_' . $question, old('question_' . $question), [
                                    'class' => 'form-control question',
                                    'rows' => 2,
                                    'style' => 'min-height:80px',
                                    $QField->is_required == 'required' ? 'required' : '',
                                    'minlength' => $QField->minimum_answer_length,
                                ]) !!}
                            @endif
                        </div>
                    @endforeach

                    <!-- tone field -->
                    <div class="form-group">
                        {!! Form::label('tone_id', 'Tone', ['class' => 'form-label']) !!}
                        {!! Form::select('tone_id', $tones, old('tone_id', $prompt->tone_id), ['class' => 'form-control']) !!}
                    </div>

                    <!-- language field -->
                    <div class="form-group">
                        {!! Form::label('language_id', 'Language', ['class' => 'form-label']) !!}
                        {!! Form::select('language_id', $langs, old('language_id', $userSetting->language_id), [
                            'class' => 'form-control',
                        ]) !!}
                    </div>

                    <!-- submit button -->
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-magic mr-1"></i>
                            Create Content
                            <div class="spinner d-inline">
                                <i class="fa fa-spinner fa-spin ml-2 d-none"></i>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- start content -->
    <div class="col-md-6">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-chain-broken"></i> PlayGround
                </h3>
                <div class="card-buttons float-right">
                    <button class="btn btn-sm btn-success" id="copy-text">
                        <i class="fa fa-copy"></i> Copy
                    </button>
                    <button class="btn btn-sm btn-primary" id="download">
                        <i class="fa fa-download"></i>
                        Download
                    </button>
                </div>
            </div>
            <div class="card-body">
                {!! Form::textarea('content', '', [
                    'placeholder' => 'Start typing, copy, or paste to get started...',
                    'class' => 'form-control',
                    'id' => 'content',
                    'rows' => '15',
                ]) !!}
            </div>
        </div>
    </div>
</div>

@push('javascript')
    <script>
        $(() => {
            let formData = () => {

                let questionsObject = {};

                $('.question').each(function(index, element) {
                    const el = $(element);
                    const key = el.attr('name');
                    const value = el.val();
                    questionsObject[key] = value
                });

                let inputs = {
                    prompt_id: Number($('input[name="prompt_id"]').val()),
                    language_id: Number($('#language_id').val()),
                    tone_id: Number($('#tone_id').val()),
                    ...questionsObject,
                };

                return inputs;
            }

            // gpt3 generate content
            const getContentBtn = $('button[type="submit"]');
            const spinnerIcon = getContentBtn.find('.spinner .fa');
            const $textareaContent = $('textarea#content');

            getContentBtn.on('click', function(e) {
                e.preventDefault();
                const isValid = $(e.target).parents('form').valid();

                if (isValid) {
                    // reset summernote content
                    $textareaContent.val('');

                    // disabled button submit click
                    getContentBtn.addClass('disabled').attr('disabled', true);
                    spinnerIcon.toggleClass('d-none');

                    let data = formData();
                    $.ajax({
                        type: "POST",
                        url: "{{ route('textType.store') }}",
                        data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: "json",
                        encode: true,

                    }).done(function(data) {
                        let content = data['content'];

                        $textareaContent.val(content);

                        // enabled button submit click
                        getContentBtn.removeClass('disabled').attr('disabled', false);
                        spinnerIcon.toggleClass('d-none');

                        // show notification
                        new Noty({
                            "theme": 'metroui',
                            "type": "success",
                            "layout": 'topRight',
                            "text": "<span>Content Created successfully <i class='fa fa-smile-o'></i></span>",
                            "timeout": 2000,
                            "killer": true,
                            "progressBar": true,
                        }).show();
                    });
                }
            });

            // copy summer note content to clipboard
            let copyTextToClipboard = () => {
                let content = $textareaContent.val();

                if (content != "") {

                    navigator.clipboard.writeText(content).then(
                        function() {
                            alert("Copying to clipboard was successful!");
                        },
                        function(err) {
                            alert("Could not copy text: ", err);
                        }
                    )
                } else {
                    alert('There is no text to copy ');
                }
            }

            $('#copy-text').on('click', copyTextToClipboard);

            let currentData = () => {
                const date = new Date();

                let day = date.getDate();
                let month = date.getMonth() + 1;
                let year = date.getFullYear();
                let hours = date.getHours();
                let minutes = date.getMinutes();

                return `${day}_${month}_${year}_${hours}:${minutes}`;
            }

            // download summernote content as .txt file
            const downloadFile = () => {
                const content = $textareaContent.text();

                if (content != "") {
                    const link = document.createElement("a");
                    const file = new Blob([content], {
                        type: 'text/plain'
                    });
                    link.href = URL.createObjectURL(file);
                    link.download = `{{ $prompt->title }}__${currentData()}.txt`;
                    link.click();
                    URL.revokeObjectURL(link.href);
                } else {
                    alert('There is no text to download');
                }
            };

            $('#download').on('click', downloadFile);
        });
    </script>
@endpush
