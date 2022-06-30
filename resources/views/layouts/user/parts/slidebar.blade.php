<nav class="left_nav">
    <ul class="lest-page-name">
        <li>
            <div class="image-profile">
                <img src="{{asset("assets/img/user_avatar.jpg")}}" alt="">
            </div>
            <h1>{{\Illuminate\Support\Facades\Auth::user()->username}}</h1>
        </li>
        <li><a href="{{route("reader.dashboard.index")}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="{{route("reader.referral_link.index")}}"><i class="fas fa-users"></i> Referral Links</a></li>
        <li><a href="{{route("reader.wallet.index")}}"><i class="fas fa-users"></i> Transaction Wallets</a></li>
        <li><a href="{{route("reader.wallet.show")}}"><i class="fas fa-users"></i> Show Wallets</a></li>

    </ul>
</nav>
