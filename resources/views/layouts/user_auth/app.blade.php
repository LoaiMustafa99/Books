<!DOCTYPE html>
<html lang="en">
<head>
@include("layouts.user.parts.header")
</head>
<body class="is-preload">

    @hasSection("page-nav-title")
        @yield("page-nav-title")
    @endif
    @yield("content")
</body>
</html>
