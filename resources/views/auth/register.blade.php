@extends('layouts.user_auth.app')

@section('content')


<form method="POST" action="{{ route('register.user.save') }}">
    @csrf
    <div class="cont" style="height: 771px;margin-bottom: 20px;">
        <div class="form sign-in" style="padding: 0px 30px 0;margin: 1% !important;">
            <h2>sign up</h2>
            <label>
                <span>Username</span>
                <input type="text" name="username" />
                @error("username")
                <div class="input-error">{{$message}}</div>
                @enderror
            </label>
            <label>
                <span>Full Name</span>
                <input type="text" name="full_name" />
                @error("full_name")
                <div class="input-error">{{$message}}</div>
                @enderror
            </label>
            <label>
                <span>Email</span>
                <input type="email" name="email" />
                @error("email")
                <div class="input-error">{{$message}}</div>
                @enderror
            </label>
            <label>
                <span>Birth Date</span>
                <input type="date" name="birth_date" />
                @error("birth_date")
                <div class="input-error">{{$message}}</div>
                @enderror
            </label>
            <label>
                <span>password</span>
                <input type="password" name="password" />
                @error("password")
                <div class="input-error">{{$message}}</div>
                @enderror
            </label>
            <label>
                <span>confirm password</span>
                <input type="password" name="confirm_password" />
                @error("confirm_password")
                <div class="input-error">{{$message}}</div>
                @enderror
            </label>
            <button type="submit" class="submit">sign up</button>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text">
                    <h2 class="logo-opinion"><span> Opinion in</span> the top</h2>
                    <p>If you have an account</p>
                    <a href="{{route("user.login")}}"class="sign-btn">sign in</a>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
