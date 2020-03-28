<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('main/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('main/css/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('main/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('main/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/rangeslider.css') }}">

    <link rel="stylesheet" href="{{ asset('main/css/style.css') }}">

    @yield('header')
</head>
<body>
    <div id="app">
        
        @include('main.layouts.includes.header')

        <main>
            @yield('content')
        </main>

        @include('main.layouts.includes.footer')
        @yield('footer')


         <!--Start of Tawk.to Script-->
         <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5e6cc0038d24fc2265879014/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->

    </div>
</body>
</html>
