<!-- name field -->
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('name', 'name', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::text('name', old('name'), [
        'class' => 'form-control',
        'placeholder' => 'Enter a name here',
    ]) !!}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<!-- permissions field -->
<div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('permissions', 'permissions', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    <div class="select mb-2">
        <button class="btn btn-primary btn-sm" id="select-all" data-permissions="{{ implode(',', array_keys($permissions)) }}">
            <i class="fa fa-check"></i> Select All
        </button>
        <button class="btn btn-danger btn-sm" id="deselect-all">
            <i class="fa fa-times"></i> Deselect All
        </button>
    </div>
    {!! Form::select('permissions[]', $permissions, old('permissions[]'), [
        'class' => 'form-control select-2',
        'id' => 'permissions',
        'multiple' => true,
    ]) !!}

    @if ($errors->has('permissions'))
        <span class="help-block">
            <strong>{{ $errors->first('permissions') }}</strong>
        </span>
    @endif
</div>

<!-- submit button -->
<div class="form-group">
    @if (isset($role))
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


@push('css')
    {{ Html::style('adminLte/plugins/select2/css/select2.css') }}
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #1c0656;
            border: 1px solid #1c0656;
            padding: 0 5px 2px;
        }
    </style>
@endpush

@push('javascript')
    {{ Html::script('adminLte/plugins/select2/js/select2.js') }}

    <script>
        $(() => {
            $('.select-2').select2();

            let $permissions = $('select[id="permissions"]');
            $('#select-all').on('click', function(e) {
                e.preventDefault();
                let permissions = $(this).data('permissions');
                let permissions_list = String(permissions).split(',');

                $permissions.val(permissions_list);
                $permissions.trigger('change');
            })

            $('#deselect-all').on('click', function(e) {
                e.preventDefault();

                if ($permissions.length > 0) {
                    $permissions.val(null).trigger('change')
                }
            })
        })
    </script>
@endpush
