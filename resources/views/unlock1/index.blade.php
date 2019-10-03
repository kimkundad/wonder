@extends('layouts.template')

@section('title')
AcmeTrader กลุ่มสุดยอดนักเทรดที่ก่อตั้งขึ้นเพื่อพัฒนาศักยภาพมนุษย์ให้มีความรู้ความสามารถด้านการลงทุนและใช้ชีวิต
@stop



@section('stylesheet')
<link rel="stylesheet" href="{{url('assets/home/stylesheet.css')}}"/>

<style>
.digital{
font-family: 'digital-7regular';
    }
.score_left_1{
  font-size: 36px;
  color: #0ecc2e;
}
.score_left_2{
  font-size: 30px;
  color: #0ecc2e;
}
.score_r_1{
  font-size: 36px;
  color: #ccc60e
}
.score_r_2{
  font-size: 30px;
  color: #ccc60e
}
.score_mid{
  font-size: 55px;
}
.theme-account-bookmarks-item-actions {
    font-size: 14px;
}
@media (max-width: 420px) {
.theme-coming-soon-countdown > div > p {
  font-size: 40px;
  margin-bottom: 0;
  line-height: 1em;
  text-shadow: 5px 5px 15px rgba(0,0,0,0.2);
}
.theme-coming-soon-countdown {
  overflow: hidden;
  display: table;
  margin: 20px 10px 20px 10px;
  padding: 30px 0;
}
.theme-coming-soon-countdown > div > span {
  margin-top: 5px;
  display: block;
  font-size: 12px;
  opacity: 0.65;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=65)";
  filter: alpha(opacity=65);
  line-height: 1em;
}
}

@media (min-width: 992px){
  .row[data-gutter="60"] > [class^="col-"] {
      padding-left: 15px;
      padding-right: 15px;
  }
}
.btn-ghost.btn-white {
    border-color: #666;
    color: #666;
}
</style>

@stop('stylesheet')



@section('content')






<div class="theme-hero-area _h-desk-100vh">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg" style="background-image:url({{url('assets/home/img/unlock/bg_unlock1.jpg')}});"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-strong"></div>
    <div class="theme-hero-area-inner-shadow"></div>
  </div>
  <div class="theme-hero-area-body _pos-desk-v-c _w-f _pv-mob-100">
    <div class="container">
      <div class="theme-coming-soon">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="theme-coming-soon-header">
              <br /><br /><br /><br />
              <img class="img-responsive" src="{{url('assets/home/img/unlock/Asset_2.png')}}">
              <p class="theme-coming-soon-subtitle">{{$objs->text_2}}</p>
            </div>
            <div class="text-center">

              <div class="countdown theme-coming-soon-countdown" id="commingSoonCountdown"></div>
            </div>
            <div class="_desk-h _ta-c _mt-20">
              <div class="theme-hero-text">
                <div class="theme-hero-text-header">

                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>


</div>


<div class="theme-page-section  theme-page-section-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="theme-hero-text theme-hero-text-center">
              <div class="theme-hero-text-header">
                <br />
                <h2 class="theme-hero-text-title">{{$objs->text_sub_1}}

                </h2>
                <p class="theme-hero-text-subtitle">{{$objs->text_sub_2}}</p>
              <!--  <a class="btn _tt-uc _mt-30  btn-ghost btn-lg" href="#">Unlock Now</a> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



<style>
#p1 {background-color: rgba(47, 79, 181, 0.3);}
</style>

    <div class="theme-hero-area">
      <div class="theme-hero-area-bg-wrap">
        <div class="theme-hero-area-bg " style="background-image:url({{url('assets/home/img/unlock/bg_step_2.jpg')}});"></div>
        <div class="theme-hero-area-mask"></div>
      </div>
      <div class="theme-hero-area-body">
        <div class="theme-page-section theme-page-section-xxl">
          <div class="container">
            <div class="theme-page-section-header">
          <h5 class="theme-page-section-title theme-page-section-title-lg" style="color: #fff;">Score Board</h5>
        </div>
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                  <h2 class="theme-hero-text-title"></h2>
                <div class="row row-col-mob-gap" data-gutter="60">


                  <div class="col-md-4 ">
                    <div class="feature _b _p-20 feature-white feature-center">

                      <div class="feature-caption _c-w">
                        <h3 class="feature-title">Goals ($)</h3>
                        <h5 class="feature-title score_left_1 digital">{{$objs->score_left_1}}</h5>
                        <p class="feature-subtitle score_left_2 digital">{{$objs->score_left_2}}%</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 " >
                    <div class="feature _b _p-20 feature-white feature-center" id="p1">
                      <div class="feature-caption _c-w">
                        <h3 class="feature-title" style="font-size: 26px; color: #25d4d4;">Day</h3>
                        <h5 class="feature-title score_mid digital">{{$objs->score_mid}}</h5>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="feature _b _p-20 feature-white feature-center">
                      <div class="feature-caption _c-w">
                        <h3 class="feature-title">Current ($)</h3>
                        <h5 class="feature-title digital score_r_1">{{$objs->score_r_1}}</h5>
                        <p class="feature-subtitle digital score_r_2">{{$objs->score_r_2}}%</p>
                      </div>
                    </div>
                  </div>


                </div>
                  <h2 class="theme-hero-text-title"></h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>






<style>
.theme-sidebar-section {
    background: #fff;
    padding: 8px 8px;
    border: 1px solid #e6e6e6;
    border-radius: 2px;
}
.tx10{
  font-size: 11px;
}
</style>



    <div class="theme-page-section theme-page-section-gray theme-page-section-lg">
      <div class="container">
        <div class="row">
          <div class="col-md-1">
            <div class="theme-account-sidebar">




            </div>
          </div>
          <div class="col-md-10 ">


            <h1 class="theme-account-page-title">Saved Items</h1>



<style>
.portsize{
  font-size: 22px;
  color: #666;
}
.balance{
  font-size: 22px;
  color: #25d4d4;
}
.profit{
  font-size: 22px;
  color: #ccc60e;
}
</style>


            @if(isset($item))
              @foreach($item as $u)

            <div class="theme-account-bookmarks-item">
              <div class="row">
                <div class="col-md-3 ">
                  <div class="banner theme-account-bookmarks-item-img banner-sqr banner-">
                    <div class="banner-bg" style="background-image:url({{url('assets/home/img/avatar/'.$u->avatar)}});"></div>
                    <a class="banner-link" target="_blank" href="{{$u->url}}"></a>
                  </div>
                </div>

                <div class="col-md-6 ">
                  <div class="theme-account-bookmarks-item-thumb">
                    <a class="theme-account-bookmarks-item-thumb-link" target="_blank" href="{{$u->url}}"></a>
                    <div class="row row-eq-height" data-gutter="none">

                      <div class="col-md-12 ">
                        <div class="theme-account-bookmarks-item-thumb-body">
                          <div class="row">
                            <div class="col-xs-12 ">
                              <h5 class="theme-account-bookmarks-item-title" style="height: 20px;">{{$u->owner}}</h5>

                              <div class="theme-sidebar-section">
                                <p class="theme-account-bookmarks-item-location "><b>Port size($)</b> <span class="digital portsize">{{$u->portsize}}</span></p>
                                  <p class="theme-account-bookmarks-item-location "><b>Balance($)</b> <span class="digital balance">{{$u->balance}}</span></p>
                                    <p class="theme-account-bookmarks-item-location "><b>Profit($)</b> <span class="digital profit">{{$u->profit}}</span></p>


                              </div>

                                <h5 class="theme-account-bookmarks-item-title" style="height: 20px; margin-top:10px; margin-bottom:10px;">
                                  <i class="fa fa-podcast" style="color: #ff6c2d; font-size:15px;"></i>
                                   Watch live trade
                                 </h5>

                                 <div class="row">
                                   <div class="col-xs-6 ">
                                 <ul class="theme-sidebar-section-charges-list" style=" font-size:10px;">
                                   <li class="theme-sidebar-section-charges-item">
                                     <h5 class="theme-sidebar-section-charges-item-title tx10">MT4 Account no.:</h5>
                                     <p class="theme-sidebar-section-charges-item-subtitle"></p>
                                     <p class="theme-sidebar-section-charges-item-price tx10">{{$u->mt4}}</p>
                                   </li>
                                    <li class="theme-sidebar-section-charges-item">
                                      <h5 class="theme-sidebar-section-charges-item-title tx10">Investor Password</h5>
                                      <p class="theme-sidebar-section-charges-item-subtitle"></p>
                                      <p class="theme-sidebar-section-charges-item-price tx10">{{$u->inves_pass}}</p>
                                    </li>
                                  </ul>

                                </div>

                                <div class="col-xs-6 ">
                              <ul class="theme-sidebar-section-charges-list" >
                                <li class="theme-sidebar-section-charges-item">
                                  <h5 class="theme-sidebar-section-charges-item-title tx10" >Broker</h5>
                                  <p class="theme-sidebar-section-charges-item-subtitle"></p>
                                  <p class="theme-sidebar-section-charges-item-price tx10">{{$u->broker}}</p>
                                </li>
                                 <li class="theme-sidebar-section-charges-item">
                                   <h5 class="theme-sidebar-section-charges-item-title tx10" >Server</h5>
                                   <p class="theme-sidebar-section-charges-item-subtitle"></p>
                                   <p class="theme-sidebar-section-charges-item-price tx10">{{$u->server}}</p>
                                 </li>
                               </ul>

                             </div>

                              </div>


                            </div>


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 ">
                  <div class="theme-account-bookmarks-item-info">
                    <p class="theme-account-bookmarks-item-date">Saved on {{$u->created_at}}</p>
                    <ul class="theme-account-bookmarks-item-actions ">
                      <li>
                        <a href="{{$u->url}}" class="btn _tt-uc btn-white btn-ghost" target="_blank">
                          <i class="fa fa-area-chart" aria-hidden="true"></i> ดูสถิติการเทรด
                        </a>
                      </li>
                      <li>


                        @if (Auth::guest())

                        <a href="#" class="photo_f btn _tt-uc btn-white btn-ghost"  id="photo_f">
                          <i class="lin lin-share theme-account-bookmarks-item-action-icon"></i>Share
                        </a>
                        @else
                        <a href="#" class="btn _tt-uc btn-white btn-ghost" onclick="share();">
                          <i class="lin lin-share theme-account-bookmarks-item-action-icon"></i>Share
                        </a>
                        @endif



                      </li>

                    </ul>
                  </div>
                </div>
              </div>
            </div>



            @endforeach
          @endif














          </div>
        </div>
      </div>
    </div>




@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '2318508461812359',
      xfbml      : true,
      version    : 'v4.0'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


<script>

$('.photo_f').on('click', function () {
swal("กรุณาทำการ สมัครสมาชิก ก่อนเข้าร่วมกิจกรรม เพื่อผลประโยชน์เกี่ยวกับการรับ Point และของกิจกรรมในงาน")
.then((value) => {

});
});


$(document).ready(function(){
comingSoonCountdown();
});


@if (Auth::guest())


@else
function share() {
  FB.ui({
    method: 'share',
    href: 'https://acmetrader.club/unlock_events_shared/{{Auth::user()->id}}',
  }, function(response){});
}
@endif




function comingSoonCountdown() {

    $('#commingSoonCountdown').countdown('{{$objs->time_count}}', function(e){
        $(this).html(e.strftime(''
            + '<div><p>%D</p><span>days</span></div>'
            + '<div><p>%H</p><span>hours</span></div>'
            + '<div><p>%M</p><span>minutes</span></div>'
            + '<div><p>%S</p><span>seconds</span></div>'
        ));
    });
}

</script>

@stop('scripts')
