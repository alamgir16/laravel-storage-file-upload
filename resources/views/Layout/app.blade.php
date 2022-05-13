<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    @yield('content')
    {{-- <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
    </script> --}}

    {{-- <script type="text/javascript" src="{{ asset('assets/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/custom.js') }}"></script> --}}

</body>

</html>
