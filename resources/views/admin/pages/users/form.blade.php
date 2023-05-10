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

<!-- email field -->
<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('email', 'email', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>
    {!! Form::email('email', old('email'), [
        'class' => 'form-control',
        'placeholder' => 'Enter a email here',
    ]) !!}
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<!-- password field -->
<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    {!! Form::label('password', 'password', ['class' => 'form-label ' . (!isset($user) ? 'required' : '')]) !!}
    {!! Form::password('password', [
        'class' => 'form-control',
        'placeholder' => 'Enter a password here',
    ]) !!}
    <span class="text-muted d-block">
        must be at least 8 characters in length |
        must contain at least one lowercase letter |
        must contain at least one uppercase letter |
        must contain at least one digit |
        must contain a special character
    </span>

    @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>

<!-- roles field -->
<div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
    <div class="option">
        {!! Form::label('roles', 'roles', ['class' => 'form-label']) !!}
        <span class="star text-danger">*</span>
    </div>

    {!! Form::select('roles[]', $roles, old('roles[]'), [
        'class' => 'form-control',
        'id' => 'roles',
    ]) !!}

    @if ($errors->has('roles'))
        <span class="help-block">
            <strong>{{ $errors->first('roles') }}</strong>
        </span>
    @endif
</div>

<!-- submit button -->
<div class="form-group">
    @if (isset($user))
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

