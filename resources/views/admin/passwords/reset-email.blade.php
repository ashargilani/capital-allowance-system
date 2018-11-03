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
                    'route' => 'password.email',
                    'class' => 'form-signin'
            )
        )
        !!}
            {{ csrf_field() }}
            <span id="reauth-email" class="reauth-email">E-Mail Address :</span>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Enter your email address">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <button type="submit" class="btn btn-primary">
                Send Password Reset Link
            </button>
        {!! Form::close() !!}
        {{--Form End--}}
@endsection
