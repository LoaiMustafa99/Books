<nav class="top_nav">
    <div class="top_nav_contant">
        <div class="logo">
            Affiliate Marketing App
        </div>
        <div class='menu'>
            <a href="{{route("logout")}}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <form id="logout-form" action="{{route("logout")}}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</nav>
