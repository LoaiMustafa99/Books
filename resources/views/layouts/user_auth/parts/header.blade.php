 <meta name="description" content="Bunyan">

{{--    <link rel="icon" href="https://goldenmealpro.digisolapps.com/golden_meal_backend/public/assets/logo.svg">--}}
<!-- Open Graph Meta-->
<meta property="og:type" content="website">
<meta property="og:site_name" content="Golden Meal">
<meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
<meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
<meta property="og:image" content="https://goldenmealpro.digisolapps.com/golden_meal_backend/public/assets/logo.svg">
<meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>
    @hasSection ('page-title')
        @yield('page-title') - {{ config("app.name") }}
    @else
        {{ config("app.name") }}
    @endif
</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

 <link rel="stylesheet" href="{{asset("assets/css/user/bootstrap.css")}}">
 <link rel="stylesheet" href="{{asset("assets/css/user/fontawesome.css")}}">
 <link rel="stylesheet" href="{{asset("assets/css/user/main.css")}}">
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Harmattan&display=swap" rel="stylesheet">

 <!-- Font-icon css-->
@hasSection("css-links")
    @yield("css-links")
@endif
