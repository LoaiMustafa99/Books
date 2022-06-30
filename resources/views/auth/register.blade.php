@extends('layouts.auth.app')

@section('content')

    <div class="video-wrap" style="height:100vh;">
        <form class="login-form" style="width:500px;top:50%;" method="post" action="{{ route('register.user.save') }}">
            @csrf
            <h2>Register User</h2>
            <div class="input-form">
                <input type="text" name="name" placeholder="Name">
                @error("name")
                <div class="input-error">{{$message}}</div>
                @enderror
            </div>
            <div class="input-form">
                <input type="email" name="email" placeholder="Email">
                @error("email")
                <div class="input-error">{{$message}}</div>
                @enderror
            </div>
            <input type="hidden" name="link_id" value="{{app('request')->input('link_id')}}">
            <div class="input-form">
                <input type="text" name="phone_number" placeholder="Phone Number">
                @error("phone_number")
                <div class="input-error">{{$message}}</div>
                @enderror
            </div>
            <div class="input-form">
                <input type="date" name="birth_date" placeholder="Birth Date">
                @error("birth_date")
                <div class="input-error">{{$message}}</div>
                @enderror
            </div>
            <div class="input-form">
                <input type="password" name="password" placeholder="Password">
                @error("password")
                <div class="input-error">{{$message}}</div>
                @enderror
            </div>
            <div class="input-form">
                <input type="password" name="confirm_password" placeholder="Confirm Password">
                @error("confirm_password")
                <div class="input-error">{{$message}}</div>
                @enderror
            </div>
            <div class="input-form">
                <input type="submit" value="Register">
            </div>
        </form>
    </div>

@endsection
