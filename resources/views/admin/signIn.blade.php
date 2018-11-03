@extends('admin.layout.login-main')
@section('page-title')
    Login Page
@endsection
@section('content')
    {{--Form start--}}
    {!!
        Form::open(
            array(
                    'route' => 'login',
                    'class' => 'form-signin'
            )
        )
    !!}
        {{ csrf_field() }}
        <span id="reauth-email" class="reauth-email"></span>
        {!!
            Form::input('text', 'email', '', [
                'id' => 'admin-email',
                'class' => 'form-control',
                'placeholder' => 'email',
                'required' => 'required',
                'autofocus'=>'autofocus',
                'autocomplete' => 'email'
            ])
        !!}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        {!!
            Form::input('password', 'password', '', [
                'id' => 'admin-password',
                'class' => 'form-control',
                'placeholder' => 'password',
                'required' => 'required',
                'autocomplete' => 'current-password'
            ])
        !!}
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <div id="remember" class="checkbox">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
    {!! Form::close() !!}
    {{--Form close--}}
    <a href="{{ route('password.request') }}" class="forgot-password">
        Forgot the password?
    </a>
@endsection
