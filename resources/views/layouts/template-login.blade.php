<!doctype html>
<html class="fixed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">
        <title>Administrators Login</title>
        <meta name="keywords" content="Teeneejj Login" />
        <meta name="description" content="Teeneejj Login">


        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />



        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{asset('/assets/back/vendor/bootstrap/css/bootstrap.css')}}" />

        <link rel="stylesheet" href="{{asset('/assets/back/vendor/font-awesome/css/font-awesome.css')}}" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{asset('/assets/back/vendor/stylesheets/theme.css')}}" />
        <link rel="stylesheet" href="{{asset('/assets/back/vendor/style.css')}}" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{asset('/assets/back/vendor/stylesheets/theme-custom.css')}}">

        <!-- Head Libs -->

        <style type="text/css">
        body{
                background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url({{asset('assets/home/img/bg_website_new.jpg')}}) no-repeat center bottom;
                background-size: cover;
                color: #ffffff;
            }

        .input-group-icon .input-group-addon span.icon.icon-lg, .input-search .input-group-addon span.icon.icon-lg {
            padding: 5px 14px;
            font-size: 18px;
        }
        .body-sign {
            display: table;
            height: 100vh;
            margin: 0 auto;
            max-width: 440px;
            padding: 0 15px;
            width: 100%;
        }
        .body-sign .panel-sign .panel-body {
            background: #FFF;
            border-top: none;
            border-radius: 5px 5px 5px 5px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            padding: 33px 33px 15px;
        }
        .center-block {
            display: block;
            margin-left: auto;
            margin-right: auto;
         }
         .body-locked {
    background: none;
    max-width: none;
    min-height: 400px;
}
.body-locked .current-user {
    margin-top: 10px;
    margin-bottom: 5px;
}
        .body-locked .current-user .user-image {
    border: none;
}
label {
    color: #999;
}
        </style>
    </head>

    <body >


        <!-- start: page -->











@yield('content')



















        <!-- end: page -->

        <!-- Vendor -->




    </body>
</html>
