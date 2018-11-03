@extends('admin.layout.login-main')
@section('page-title')
    Password Reset
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    {{--Form start--}}
    {!!
        Form::open(
        array(
                'route' => 'password.request',
                'class' => 'form-signin'
        )
    )
    !!}
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}"  placeholder="E-Mail Address" required autofocus>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <br>
        <input id="password" type="password" class="form-control" name="password" required placeholder="New Password">

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <br>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Retype Password" required>

        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
        <button type="submit" class="btn btn-primary">
            Reset Password
        </button>
@endsection
