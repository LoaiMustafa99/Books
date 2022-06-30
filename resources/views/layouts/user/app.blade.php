<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    @include("layouts.user.parts.header")
</head>
<body class="app sidebar-mini rtl">
<!-- Sidebar menu-->
@include("layouts.user.parts.slidebar")


<!-- Navbar-->
@include("layouts.user.parts.navbar")


<main class="app-content">
    @hasSection("page-nav-title")
        @yield("page-nav-title")
    @endif
    @yield("content")
</main>
@include("layouts.user.parts.footer")
</body>
</html>
