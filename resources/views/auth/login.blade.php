@extends('app')

@section('content')
    <div class="full-content site-login header-center text-center">
        <h1>User Login</h1>

        @if(count($errors) > 0)
            <div class="form-errors">
                <h3 class="form-errors-title">Oops! Bad login!</h3>

                @foreach($errors->all() as $error)
                    <p class="form-errors-error">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form class="site-login-form" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <label class="login-form-label" for="email">E-Mail Address</label>
            <input type="email" id="email" name="email" class="login-form-email" value="{{ old('email') }}">

            <br>

            <label class="login-form-label" for="password">Password</label>
            <input type="password" id="password" name="password" class="login-form-password">

            <br>

            <button type="submit" class="login-form-submit">Login</button>
        </form>
    </div>
@endsection
