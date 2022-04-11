<header class="app-header" style="background: #222d32">
    <a class="app-header__logo" href="">
{{--        <img src="{{asset("assets/logo_text.png")}}" alt="" class="site-logo"></a>--}}
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><i class="fas fa-bars"></i></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">

{{--        <!-- Language Menu-->--}}
{{--        <li class="dropdown lang"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fas fa-globe" style=""></i><span class="lang-name">ar</span></a>--}}

{{--            <ul class="dropdown-menu settings-menu">--}}
{{--                @foreach(config()->get("app.languages") as $langKey => $langText)--}}
{{--                    @if(app()->getLocale() !== $langKey)--}}
{{--                        <li><a class="dropdown-item @if(isArabic($langText)) arabic-font @endif" href="{{getSameWithNewLanguage($langKey)}}"><img src="{{asset("assets/img/flags/{$langKey}.png")}}" style="width: 20px" alt="" > {{$langText}}</a></li>--}}
{{--                    @endif--}}

{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </li>--}}

        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="{{__("Open Profile Menu")}}"><i class="fa fa-user fa-lg"></i></a>

            <ul class="dropdown-menu settings-menu">
                <li><a class="dropdown-item" href="#"><i class="fa fa-user fa-lg"></i>{{__("Profile")}}</a></li>

                <li><a class="dropdown-item" href="{{route("logout")}}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i>{{__("Logout")}}</a>
                </li>
                <form id="logout-form" action="{{route("logout")}}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </li>

    </ul>

</header>
