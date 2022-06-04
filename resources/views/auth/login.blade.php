@extends('layouts.user_auth.app')

@section('content')
    @if(count($errors) > 0 )
        <div class="login-errors">
            <ul >
                @foreach($errors->all() as $key => $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
        @isset($url)
            <form method="post" class="login-form" action='{{ url("login/$url") }}'>
        @else
            <form class="login-form"  method="post" action="{{ route('login') }}">
        @endisset
            @csrf
                <div class="cont">
                    <div class="form sign-in">
                        <h2>sign in Admin</h2>
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
                        </div>
                    </div>
                </div>
            </form>
@endsection
