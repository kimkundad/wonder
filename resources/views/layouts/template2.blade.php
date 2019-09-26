<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>



    <title> @yield('title')</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="googlebot" content="ALL">

  <!--  <meta property="og:url" content="https://masterphotonetwork.com">
    <meta property="og:title" content=" มาสเตอร์  Master Photo Network">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://masterphotonetwork.com/assets/image/n7.JPG">
    <meta property="og:description" content="ผู้นำด้านการอัดรูปสี, Digital Offset Print (นามบัตร การ์ด โบร์ชัวร์ แผ่นพับ ใบปลิว ฯลฯ), กรอบ, อัลบั้ม, Photobook และ Photo Gift">
    <meta property="fb:admins" content="100002037238809">
    <meta property="fb:app_id" content="1063323960509612"> -->




    <link rel="icon" type="image/png" href="{{url('/assets/home/img/Asset-4.png')}}">



    @include('layouts.inc-style')
    @yield('stylesheet')

  </head>
  <body>

    @include('layouts.inc-header2')

    @yield('content')


    @include('layouts.inc-footer')

    <!-- JavaScripts -->
    @include('layouts.inc-script')
    @yield('scripts')


        </body>
</html>
