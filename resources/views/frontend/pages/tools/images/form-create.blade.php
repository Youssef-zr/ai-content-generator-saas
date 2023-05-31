<!-- start row -->
<div class="row">
    <!-- prompt description -->
    <div class="col-12">
        <div class="d-inline-block mb-3 px-3 py-2 rounded {{ !isset($content) ? 'bg-primary' : 'bg-info' }}">
            <h5 class="mb-0">
                <i class="fa fa-question-circle"></i> {{ $prompt->description }}
            </h5>
        </div>
    </div>

    <!-- start form fields -->
    <div class="col-md-6 col-lg-7">
        <div class="card {{ !isset($content) ? ' card-outline card-primary' : 'card-info' }}">
            <div class="card-header ">
                <h3 class="card-title"><i class="fa fa-magic mr-1"></i> {{ $prompt->title }}</h3>
            </div>
            <div class="card-body">
                <form class="cmxform" id="formValidation">
                    <!-- prompt id field -->
                    {!! Form::hidden('prompt_id', old('prompt_id', $prompt->id)) !!}

                    <!-- content id field -->
                    @if (isset($content))
                        {!! Form::hidden('content_id', old('content_id', $content->id)) !!}
                        @php
                            $oldQuestions = $content->filter_content_questions();
                        @endphp
                    @endif

                    <!-- questions fields -->
                    @foreach ($prompt->questions as $key => $question)
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
                                {!! Form::text('question_' . $question, $oldQuestions[$QField->question] ?? '', [
                                    'class' => 'form-control question',
                                    $QField->is_required == 'required' ? 'required' : '',
                                    'minlength' => $QField->minimum_answer_length,
                                ]) !!}
                            @else
                                {!! Form::textarea('question_' . $question, $oldQuestions[$QField->question] ?? '', [
                                    'class' => 'form-control question',
                                    'rows' => 2,
                                    $QField->is_required == 'required' ? 'required' : '',
                                    'minlength' => $QField->minimum_answer_length,
                                ]) !!}
                            @endif
                        </div>
                    @endforeach

                    <!-- submit button -->
                    <div class="form-group mt-3">
                        @if (isset($content))
                            <button type="submit" class="btn btn-info">
                                <i class="fa fa-edit mr-1"></i>
                                Update Image
                                <div class="spinner d-inline">
                                    <i class="fa fa-spinner fa-spin ml-2 d-none"></i>
                                </div>
                            </button>
                        @else
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-magic mr-1"></i>
                                Create Image
                                <div class="spinner d-inline">
                                    <i class="fa fa-spinner fa-spin ml-2 d-none"></i>
                                </div>
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- start content -->
    <div class="col-md-6 col-lg-5">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title float-none">
                    <i class="fa fa-chain-broken"></i> PlayGround
                </h3>
                <div class="info mt-2">
                    <h6 class="text-dark">
                        To download the image, write click on it and click "Save image as..."
                    </h6>
                </div>
            </div>
            <div class="card-body">
                <div class="image-preview">
                    @if (isset($content->data['url']))
                        <img src="{{ $content->data['url'] }}" class="image">
                    @else
                        <img src="" class="image d-none">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('css')
    <style>
        .image-preview {
            max-height: 600px
        }

        .image-preview .image {
            width: 100%;
            object-fit: cover;
        }
    </style>
@endpush

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
                    content_id: $('input[name="content_id"]').val(),
                    prompt_id: Number($('input[name="prompt_id"]').val()),
                    ...questionsObject,
                };

                return inputs;
            }


            // gpt3 generate content
            const getContentBtn = $('button[type="submit"]');
            const spinnerIcon = getContentBtn.find('.spinner .fa');
            const $imagePreview = $('.image-preview .image');
            let $downloadBtn = $('#download');

            let imageUrl = "";

            getContentBtn.on('click', function(e) {
                e.preventDefault();
                const isValid = $(e.target).parents('form').valid();

                if (isValid) {
                    // reset image preview
                    $imagePreview.addClass('d-none');
                    $imagePreview.attr('src', "");

                    // hide download btn
                    $downloadBtn.addClass('d-none');

                    // disabled button submit click
                    getContentBtn.addClass('disabled').attr('disabled', true);
                    spinnerIcon.toggleClass('d-none');

                    let data = formData();

                    $.ajax({
                        type: "POST",
                        url: "{{ route('imageType.store') }}",
                        data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: "json",
                        encode: true,

                    }).done(function(data) {
                        imageUrl = data;

                        // change image preview src
                        $imagePreview.removeClass('d-none');
                        $imagePreview.attr('src', imageUrl);

                        // show btn download image
                        $downloadBtn.removeClass('d-none');

                        // enabled button submit click
                        getContentBtn.removeClass('disabled').attr('disabled', false);
                        spinnerIcon.toggleClass('d-none');

                        // show notification
                        new Noty({
                            "theme": 'metroui',
                            "type": "success",
                            "layout": 'topRight',
                            "text": "<span>Image generated successfully <i class='fa fa-smile-o'></i></span>",
                            "timeout": 2000,
                            "killer": true,
                            "progressBar": true,
                        }).show();
                    });
                }
            });

            // download image
            // $('#download').on('click', function() {
            //     if (imageUrl != "") {
            //         link = document.createElement('a');
            //         link.href = imageUrl;
            //         link.target = "_blank";
            //         link.download = "image.jpg";
            //         link.click();
            //     }
            // });

        });
    </script>
@endpush
