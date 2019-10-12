@extends('layouts.template')

@section('title')
กิจกรรมของกลุ่ม AcmeTrader
@stop



@section('stylesheet')
<style>
.theme-search-results-item {
    background: #e6e6e6;
}
.theme-blog-item-desc {
    margin-bottom: 0;
    opacity: 0.7;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=70)";
    filter: alpha(opacity=70);
    height: 42px;
    overflow: hidden;
    max-width: 100% !important;
    font-size: 14px;
}
</style>
@stop('stylesheet')



@section('content')

<div class="theme-hero-area theme-hero-area-half">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg" style="background-image:url({{url('assets/home/img/Webp.net-resizeimage.jpg')}});"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
    <div class="theme-hero-area-inner-shadow"></div>
  </div>
  <div class="theme-hero-area-body">
    <div class="container">
      <div class="theme-page-header theme-page-header-lg theme-page-header-abs ">
        <h1 class="theme-page-header-title" style="font-size:35px;">กิจกรรมของกลุ่ม AcmeTrader</h1>
        <p class="theme-page-header-subtitle">“ความสำเร็จไม่ได้สร้างภายในวันเดียวและคนที่ไม่หยุดทำเท่านั้นที่จะได้รับมัน”</p>
      </div>
    </div>
  </div>
</div>

<div class="theme-page-section theme-page-section-lg theme-page-section-gray">
  <div class="container">
    <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
      <div class="col-md-2 ">


      </div>

      <div class="col-md-8 ">
        <div class="theme-payment-page-sections">
          <div class="theme-payment-page-sections-item" style="padding-bottom: 0px;">
            <div class="theme-payment-page-signin">

              <div class="theme-payment-page-signin-body">
                <h4 class="theme-payment-page-signin-title">อีเว้นท์ที่กำลังจะมาถึง</h4>

              </div>

            </div>
          </div>
          <div class="theme-payment-page-sections-item">
            <div class="theme-search-results-item theme-payment-page-item-thumb">
              <div class="row" data-gutter="20">


                <div class="col-md-12 ">

                  @if(isset($get_code))
                    @foreach($get_code as $u)



                    @if($u->id == 6 || $u->id == 7 || $u->id == 8 || $u->id == 9)
                    <div class="col-md-6 " style="margin-bottom:15px;">
                      <div class="theme-blog-item _br-2 theme-blog-item-center">
                        <a class="theme-blog-item-link" href=""></a>
                        <div class="banner _h-45vh  banner-">
                          <img class="theme-ad-img" src="{{url('assets/home/img/events/'.$u->e_image)}}" alt="{{$u->e_name}}" title="{{$u->e_name}}">
                          <div class="banner-caption banner-caption-bottom banner-caption-grad">
                            <p class="theme-blog-item-time">เริ่ม {{$u->e_start}} </p>
                            <h5 class="theme-blog-item-title">{{$u->e_name}}</h5>
                            <p class="theme-blog-item-desc">{{$u->e_detail}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    @else

                    <div class="theme-sidebar-section _br-2 theme-blog-item-center theme-blog-item-white" style="padding: 0px; margin-bottom:15px; ">
                      <!-- <a class="theme-blog-item-link" href="{{url('/'.$u->e_url)}}"></a> -->
                      <div class="" style="height:100%">

                      <a target="_blank" style="text-de" href="{{url('/'.$u->e_url)}}">
                        <div class="banner-caption  banner-caption-" style="padding: 0px 0px 20px 0px;">
                          <img class="theme-ad-img" src="{{url('assets/home/img/events/'.$u->e_image)}}" alt="{{$u->e_name}}" title="{{$u->e_name}}">
                          <br /><br />

                          <div style="padding: 0px 0px 20px 0px;">
                            <p class="theme-blog-item-time" >เริ่ม {{$u->e_start}}</p>
                            <h5 class="theme-blog-item-title">{{$u->e_name}}</h5>
                            <p class="theme-blog-item-desc">{{$u->e_detail}}</p>
                          </div>

                        </div>
                        </a>


                      </div>
                    </div>

                    @endif

                    @endforeach
                  @endif


              <!--    <div class="theme-sidebar-section _br-2 theme-blog-item-center theme-blog-item-white" style="padding: 0px; margin-bottom:15px;">
                    <a class="theme-blog-item-link" href="#"></a>
                    <div class="" style="height:100%">


                      <div class="banner-caption  banner-caption-" style="padding: 0px 0px 20px 0px;">
                        <img class="theme-ad-img" src="{{url('assets/home/img/events/Cover_Page.jpg')}}" alt="Image AcmeTrader" title="Image AcmeTrader">
                        <br /><br />

                        <div style="padding: 0px 0px 20px 0px;">
                          <p class="theme-blog-item-time" >3 weeks ago</p>
                          <h5 class="theme-blog-item-title">OMG OH MY GHOST 2019</h5>
                          <p class="theme-blog-item-desc">HALLOWEEN CARNIVAL ที่ FREAK ที่สุด แต่งตัวสนุกไม่หยุด และหลอนทุกจุดในพื้นที่ !! </p>
                        </div>

                      </div>
                    </div>
                  </div>


                  <div class="theme-sidebar-section _br-2 theme-blog-item-center theme-blog-item-white" style="padding: 0px; margin-bottom:15px;">
                    <a class="theme-blog-item-link" href="#"></a>
                    <div class="" style="height:100%">


                      <div class="banner-caption  banner-caption-" style="padding: 0px 0px 20px 0px;">
                        <img class="theme-ad-img" src="{{url('assets/home/img/events/Event_Pop-02.jpg')}}" alt="Image AcmeTrader" title="Image AcmeTrader">
                        <br /><br />

                        <div style="padding: 0px 0px 20px 0px;">
                          <p class="theme-blog-item-time" >3 weeks ago</p>
                          <h5 class="theme-blog-item-title">Road to Kolour In The Park</h5>
                          <p class="theme-blog-item-desc">Attention Kolourians, Kolour In The Park has been cursed by a wicked force... Reality has been twisted... darkness has descended...</p>
                        </div>

                      </div>
                    </div>
                  </div> -->

                </div>

              </div>
            </div>
          </div>






        </div>
      </div>



      <div class="col-md-2 ">


      </div>




    </div>
  </div>
</div>

@endsection

@section('scripts')

<script>



</script>

@stop('scripts')
