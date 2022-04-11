<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <a class="app-sidebar__logo" href="">
{{--        <img src="{{asset("assets/logo2.svg")}}" alt="" class="site-logo full">--}}
{{--        <img src="{{asset("assets/logo1.png")}}" alt="" class="site-logo small">--}}
    </a>
    <div class="app-sidebar__user">
        <div class="avatar-box">
            <img class="app-sidebar__user-avatar" src="#" alt="">
        </div>
        <div>

            <p class="app-sidebar__user-name">Eman</p>
            <p class="app-sidebar__user-name" style="font-size: 14px; color: #f2f2f2">{{__("Admin")}}</p>
        </div>
    </div>
    <ul class="app-menu">

        <li><a class="app-menu__item @if(request()->routeIs("admin.dashboard.*")) active @endif" href="{{route("admin.dashboard.index")}}"><i class="app-menu__icon fas fa-tachometer-alt"></i><span class="app-menu__label">{{__("Dashboard")}}</span></a></li>

        <!------------------------- Categories -------------------------->
        <li><a class="app-menu__item @if(request()->routeIs("admin.category.*", "admin.sub_category.*")) active @endif" href="{{route("admin.category.index")}}"><i class="app-menu__icon fas fa-list-ul"></i><span class="app-menu__label">{{__("Category")}}</span></a></li>

        <!------------------------- Categories -------------------------->
        <li><a class="app-menu__item @if(request()->routeIs("admin.user.*")) active @endif" href="{{route("admin.user.index")}}"><i class="app-menu__icon fas fa-users"></i><span class="app-menu__label">{{__("Users")}}</span></a></li>

        <!------------------------- Books -------------------------->
        <li><a class="app-menu__item @if(request()->routeIs("admin.books.*")) active @endif" href="{{route("admin.books.index")}}"><i class="app-menu__icon fas fa-book"></i><span class="app-menu__label">{{__("Books")}}</span></a></li>


    </ul>
</aside>
