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

<!-- testimonial image field -->
<div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
    <label for="logo">
        Avatar
    </label>

    <small id="status_block" class="form-text text-muted mt-0">
        Recommended size 514px x 440px
    </small>

    <small id="status_block" class="form-text text-muted mt-0">
        image mimes type : png, jpg, jpeg, fif
    </small>

    <div class="box-input js mt-2">
        {!! Form::file('logo', [
            'class' => 'inputfile inputfile-1',
            'id' => 'file-1',
            'data-preview' => '#partner-preview',
            'data-multiple-caption' => '{count} files selected',
        ]) !!}
        <label for="file-1">
            <i class="fa fa-upload"></i>
            <span>choose file &hellip;</span>
        </label>
    </div>

    <div class="image">
        @if (isset($partner))
            <img src="{{ $partner->partner_logo }}" id="partner-preview" class="img-thumbnail" style="max-width: 150px">
        @else
            <img src="{{ url('/assets/dist/storage/customize/partners/default.png') }}" id="partner-preview"
                class="img-thumbnail" style="max-width: 150px">
        @endif
    </div>

    @if ($errors->has('logo'))
        <span class="help-block d-block mt-2">
            <strong>{{ $errors->first('logo') }}</strong>
        </span>
    @endif
</div>

<!-- submit button -->
<div class="form-group">
    @if (isset($partner))
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
