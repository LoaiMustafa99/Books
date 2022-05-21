@extends('layouts.user_auth.app')

@section('content')


<form method="POST" action="{{ route('register.user.save') }}">
    @csrf
    <div class="cont"style="height: 700px;margin-bottom: 20px;">
        <div class="form sign-in"style="padding: 6px 30px 0;">
            <h2>sign up</h2>
            <label>
                <span>Full Name</span>
                <input type="text" name="email" />
            </label>
            <label>
                <span>Email</span>
                <input type="email" name="email" />
            </label>
            <label>
                <span>date</span>
                <input type="date" name="email" />
            </label>
            <label>
                <span>age</span>
                <input type="number" name="email" />
            </label>
            <label>
                <span>password</span>
                <input type="password" name="password" />
            </label>
            <label>
                <span>confirm password</span>
                <input type="password" name="password" />
            </label>
            <button type="submit" class="submit">sign in</button>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text">
                    <h2 class="logo-opinion"><span> opinion</span> top</h2>
                    <p>If you have an account</p>
                    <a href="{{route("user.login")}}"class="sign-btn">sign in</a>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
