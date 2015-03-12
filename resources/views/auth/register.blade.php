@extends('app')

@section('content')
    <div class="full-content site-register header-center text-center">
        <h1>User Register</h1>

        @if(count($errors) > 0)
            <div class="site-register-errors">
                <h3 class="register-errors-title">Failed to register new user</h3>

                @foreach($errors->all() as $error)
                    <p class="register-errors-error">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form class="site-register-form" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <label class="register-form-label" for="name">Nick Name</label>
            <input type="text" class="register-form-nick" id="name" name="name" value="{{ old('name') }}">

            <br>

            <label class="register-form-label" for="email">E-Mail Address</label>
            <input type="email" class="register-form-email" id="email" name="email" value="{{ old('email') }}">

            <br>

            <label class="register-form-label" for="password">Password</label>
            <input type="password" class="register-form-password" id="password" name="password">

            <br>

            <label class="register-form-label" for="password_conf">Confirm Password</label>
            <input type="password" class="register-form-password_conf" id="password_conf" name="password_confirmation">

            <br>

            <button type="submit" class="register-form-submit">Register</button>
        </form>
    </div>
@endsection
