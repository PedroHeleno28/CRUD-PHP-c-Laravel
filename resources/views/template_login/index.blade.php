<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    

    <title>Heleno Automotivos</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('fonts_login/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css_login/style.css') }}">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                @yield('login')
            </div>
        </section>        

    </div>

    <!-- JS -->
    <script src="{{ asset('vendor_login/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js_login/main.js') }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>