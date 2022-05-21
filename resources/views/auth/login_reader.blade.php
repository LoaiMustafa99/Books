@extends('layouts.user_auth.app')

@section('content')

    @isset($url)
        <form method="post" class="login-form" action='{{ url("login/$url") }}'>
    @else
        <form class="login-form"  method="post" action="{{ route('login') }}">
    @endisset
                @csrf
            <div class="cont">
                <div class="form sign-in">
                    <h2>sign in</h2>
                    <label>
                        <span>Email</span>
                        <input type="email" name="email" />
                    </label>
                    <label>
                        <span>password</span>
                        <input type="password" name="password" />
                    </label>
                    <button type="submit" class="submit">sign in</button>
                </div>
                <div class="sub-cont">
                    <div class="img">
                        <div class="img__text">
                            <h2 class="logo-opinion"><span> opinion</span> top</h2>
                            <p>If you do not have an account</p>
                            <a href="{{route("register.user")}}" class="sign-btn">sign up</a>
                        </div>
                    </div>
                 </div>
            </div>
        </form>
@endsection
