@extends('layouts.auth.app')

@section('content')
    <div class="video-wrap" style="height:100vh;">
        @isset($url)
        <form method="post" class="login-form" style="width:500px;top:50%;" action='{{ url("login/$url") }}'>
                @else
        <form class="login-form" style="width:500px;top:50%;" method="post" action="{{ route('login') }}">
        @endisset
            @csrf
            <h2>Login User</h2>
            <div class="input-form">
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="input-form">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="input-form">
                <input type="submit" name="login" value="تسجيل الدخول">
            </div>
            <span class="new-page"> ليس لدي حساب؟<a href="{{route("register.user")}}" style="">حساب جديد </a></span>
        </form>
    </div>
@endsection
