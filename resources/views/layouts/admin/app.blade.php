<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
@include("layouts.admin.parts.header")
</head>
<body class="app sidebar-mini rtl">
<!-- Sidebar menu-->
@include("layouts.admin.parts.slidebar")


<!-- Navbar-->
@include("layouts.admin.parts.navbar")


<main class="app-content">
    @hasSection("page-nav-title")
        @yield("page-nav-title")
    @endif
    @yield("content")
</main>
@include("layouts.admin.parts.footer")
</body>
</html>
