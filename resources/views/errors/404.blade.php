@extends('layouts.template')

@section('title')
404 | AcmeTrader
@stop



@section('stylesheet')

@stop('stylesheet')



@section('content')

<div class="theme-hero-area theme-hero-area-full">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg" style="background-image:url({{asset('./assets/images/bg_page.jpg')}});"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-dark"></div>
    <div class="theme-hero-area-inner-shadow"></div>
  </div>
  <div class="theme-hero-area-body theme-hero-area-body-vert-center">
    <div class="container">
      <div class="theme-page-404 _ta-c">
        <h1 class="theme-page-404-title">404</h1>
        <p class="theme-page-404-subtitle">ขออภัย, เราไม่พบหน้านั้น</p>
        <a class="btn btn-ghost btn-xxl btn-white btn-uc" href="{{url('/')}}">กลับสู่หน้าหลัก</a>
      </div>
    </div>
  </div>
</div>


@endsection

@section('scripts')

<script>



</script>

@stop('scripts')
