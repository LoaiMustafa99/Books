<nav class="navbar navbar-expand-lg navbar-light bg-light" style="direction: ltr; background-color:#546a7b !important;">
    <a class="navbar-brand" href="#" style="color:blanchedalmond!important;"><span style="color:#fff"> opinion</span> top</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link col-item" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link col-item" href="#">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link col-item" href="{{route("post.create")}}">Add Post</a>
            </li>
        </ul>
        @if(!\Illuminate\Support\Facades\Auth::guard("reader")->check())
        <form class="form-inline my-2 my-lg-0" method="get" action="{{route("user.login")}}">
            <button class="btn col-bt-sign my-2 my-sm-0" type="submit">sign in</button>
        </form>
        @else
            <a class="btn col-bt-sign my-2 my-sm-0" href="{{route("logout")}}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i>{{__("Logout")}}</a>

            <form id="logout-form" action="{{route("logout")}}" method="POST" class="d-none">
                @csrf
            </form>
        @endif
    </div>
</nav>
