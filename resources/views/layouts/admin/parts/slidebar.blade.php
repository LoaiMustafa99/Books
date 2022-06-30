<nav class="left_nav">
    <ul class="lest-page-name">
        <li>
            <div class="image-profile">
                <img src="{{asset("assets/img/user_avatar.jpg")}}" alt="">
            </div>
            <h1>{{\Illuminate\Support\Facades\Auth::user()->username}}</h1>
        </li>
        <li><a href="{{route("admin.dashboard.index")}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="{{route("admin.users.index")}}"><i class="fas fa-users"></i> Users</a></li>
        <li><a href="{{route("admin.wallet.index")}}"><i class="fas fa-users"></i> User wallets</a></li>
    </ul>
</nav>
