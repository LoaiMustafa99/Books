<!DOCTYPE html>
<html lang="en">
<head>
@include("layouts.user.parts.header")
</head>
<body class="is-preload">
<!-- Navbar-->
<div id="wrapper">

@include("layouts.user.parts.navbar")
    @hasSection("page-nav-title")
        @yield("page-nav-title")
    @endif
    @yield("content")
@include("layouts.user.parts.footer")
</div>
</body>
</html>
