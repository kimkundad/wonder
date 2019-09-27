@extends('layouts.template')

@section('title')
ติดตามข่าวสารของกลุ่ม AcmeTrader | AcmeTrader
@stop



@section('stylesheet')

<style>
.juicer-feed h1.referral{
  display: none !important;
}
</style>
@stop('stylesheet')



@section('content')


<div class="theme-hero-area theme-hero-area-half">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg" style="background-image:url({{url('assets/home/img/Webp.net-resizeimage2.jpg')}});"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
    <div class="theme-hero-area-inner-shadow"></div>
  </div>
  <div class="theme-hero-area-body">
    <div class="container">
      <div class="theme-page-header theme-page-header-lg theme-page-header-abs">
        <h1 class="theme-page-header-title" style="font-size:35px;">ติดตามข่าวสารของกลุ่ม AcmeTrader</h1>

      </div>
    </div>
  </div>
</div>


<div class="theme-page-section theme-page-section-xl theme-page-section-gray">
  <div class="container">
    <div class="row row-col-gap" data-gutter="20">


      <div class="col-md-12 " style="padding-left: 0px; padding-right: 0px;">


        <ul class="juicer-feed" data-feed-id="acmetrader"><h1 class="referral"><a href="https://www.juicer.io">Powered by Juicer.io</a></h1></ul>
      </div>




    </div>


  <!--  <div class="row row-col-gap" data-gutter="20">
      <div class="col-md-4 col-md-offset-4">
        <a class="btn _mt-20 _tt-uc _fw-n btn-lg btn-white btn-block" href="#">Show More</a>
      </div>
    </div>  -->



  </div>
</div>


@endsection

@section('scripts')
<script src="https://assets.juicer.io/embed.js" type="text/javascript"></script>
<link href="https://assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />
<script>



</script>

@stop('scripts')
