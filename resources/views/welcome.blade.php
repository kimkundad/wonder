@extends('layouts.template')

@section('title')

@stop



@section('stylesheet')
<style>
.theme-hero-area-mask-strong {
    opacity: 0;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=66)";
    filter: alpha(opacity=66);
}
</style>
@stop('stylesheet')



@section('content')

<div class="owl-carousel owl-carousel-no-nav" data-items="1" data-loop="true" data-nav="true" data-autoplay="3000">


  @if(isset($slide))
  @foreach($slide as $u)
  <div class="theme-hero-area _h-90vh">
    <div class="theme-hero-area-bg-wrap">
      <div class="theme-hero-area-bg" style="background-image:url('{{url('assets/home/img/slide/'.$u->image)}}');"></div>
      <div class="theme-hero-area-mask theme-hero-area-mask-strong"></div>
    </div>
    <div class="theme-hero-area-body theme-hero-area-body-vert-center">
      <div class="container">
        <div class="theme-hero-text _pt-80 theme-hero-text-center theme-hero-text-white">
          <div class="theme-hero-text-header">
            <h2 class="theme-hero-text-title _mb-10 theme-hero-text-title-xl @if($u->name_slide == null)
            hidden
            @endif" >{{$u->name_slide}}</h2>
            <p class="theme-hero-text-subtitle @if($u->name_slide == null)
            hidden
            @endif" >{{$u->sub_slide}}</p>
          </div>

          <a class="btn _tt-uc _mt-20 btn-white btn-ghost btn-lg
          @if($u->url_slide == '#')
          hidden
          @endif
          " href="{{url($u->url_slide)}}">เข้าดูเพิ่มเติม</a>

        </div>
      </div>
    </div>
  </div>
  @endforeach
  @endif






</div>


<div class="theme-page-section theme-page-section-xxl">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="theme-page-section-header">
          <h5 class="theme-page-section-title">The Acmetrader identity</h5>
          <p class="theme-page-section-subtitle">&quot;สัญลักณ์ของกลุ่ม Acmetrader&quot;

เพื่อแสดงออกถึงอุดมการณ์และปณิธานที่มีร่วมกัน <br />
- Limited Edition สินค้าผลิตเฉพาะ มีจำนวนจำกัด -</p>
        </div>
        <div class="theme-inline-slider row" data-gutter="10">

          <div class="owl-carousel" data-items="4" data-loop="true" data-nav="true">

            @if(isset($objs))
              @foreach($objs as $u)
              <div class="theme-inline-slider-item">
                <div class="banner _h-40vh banner-">
                  <div class="banner-bg" style="background-image:url({{url('assets/home/img/products/'.$u->p_image)}});"></div>
                  <a class="banner-link" href="{{url('product/'.$u->id)}}"></a>
                  <div class="banner-caption _pt-60 banner-caption-bottom banner-caption-grad">
                    <h5 class="banner-title _fs-sm">{{$u->p_name}}</h5>
                    <p class="banner-subtitle">from ฿{{$u->p_pricec}}</p>
                  </div>
                </div>
              </div>
              @endforeach
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="theme-hero-area">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg ws-action" style="background-image:url({{url('assets/home/img/xgxku6um9jy_1500x800.jpeg')}});" data-parallax="true"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-strong"></div>
  </div>
  <div class="theme-hero-area-body">
    <div class="theme-page-section theme-page-section-xxl">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="theme-hero-text theme-hero-text-white theme-hero-text-center">
              <div class="theme-hero-text-header">
                <h2 class="theme-hero-text-title">ระบบรับชำระและจัดการเงิน</h2>
                <p class="theme-hero-text-subtitle">ควบคุมได้เองทุกอย่าง ตั้งแต่การออกแบบหน้ารับชำระเงิน การรักษาความปลอดภัย ไปจนถึงการโอนเงินออกจากระบบ</p>
              </div>
              <a class="btn _tt-uc _mt-20 btn-white btn-ghost btn-lg" href="#">สมัครใช้งานฟรี</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="theme-page-section theme-page-section-xxl">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="theme-page-section-header">
          <h5 class="theme-page-section-title">Event ที่ป็อปที่สุดในตอนนี้</h5>
          <p class="theme-page-section-subtitle">  อย่าปล่อยให้ตัวเองพลาดงานเจ๋งๆเหล่านี้! งานที่ป็อปที่สุดในตอนนี้</p>
        </div>
        <div class="row row-col-gap" data-gutter="10">

          <div class="col-md-2">
          </div>
          <div class="col-md-8 ">
            <div class="banner _h-50vh banner-animate banner-animate-mask-in">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/events/1569318104.jpg')}});"></div>
              <div class="banner-mask"></div>
              <a class="banner-link" href="#"></a>
              <div class="banner-caption banner-caption-bottom banner-caption-grad">
                <h5 class="banner-title">Acme Vampire Day #2</h5>
                <p class="banner-subtitle">กิจกรรม “Acme Vampire Day” (แอ็คมี่ แวมไพร์ เดย์) กิจกรรมรณรงค์เพื่อบริจาคโลหิต ณ ศูนย์บริการโลหิตแห่งชาติ สภากาชาดไทย เมื่อวันที่ 2 พฤศจิกายน 2562  กิจกรรมในครั้งนี้ได้มีผู้เข้าร่วมบริจาคโลหิตให้กับศูนย์บริการโลหิตแห่งชาติ</p>
              </div>
            </div>
          </div>
          <div class="col-md-2">
          </div>



          <!--
          <div class="col-md-4 ">
            <div class="banner _h-40vh banner-animate banner-animate-mask-in">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/ACMEINVESTOR_2.jpg')}});"></div>
              <div class="banner-mask"></div>
              <a class="banner-link" href="#"></a>
              <div class="banner-caption banner-caption-bottom banner-caption-grad">
                <h5 class="banner-title">Statue of Liberty</h5>
                <p class="banner-subtitle">American icon in New York Harbor</p>
              </div>
            </div>
          </div>
          <div class="col-md-8 ">
            <div class="banner _h-40vh banner-animate banner-animate-mask-in">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/bitcoin_email.jpg')}});"></div>
              <div class="banner-mask"></div>
              <a class="banner-link" href="#"></a>
              <div class="banner-caption banner-caption-bottom banner-caption-grad">
                <h5 class="banner-title">Central Park</h5>
                <p class="banner-subtitle">Urban oasis with ballfields & a zoo</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 ">
            <div class="banner _h-33vh banner-animate banner-animate-mask-in">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/ACMEINVESTOR_1.jpg')}});"></div>
              <div class="banner-mask"></div>
              <a class="banner-link" href="#"></a>
              <div class="banner-caption banner-caption-bottom banner-caption-grad">
                <h5 class="banner-title">Empire State Building</h5>
                <p class="banner-subtitle">103-story landmark with observatories</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="banner _h-33vh banner-animate banner-animate-mask-in">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/t-shirt1_coloredbg@2x.png')}});"></div>
              <div class="banner-mask"></div>
              <a class="banner-link" href="#"></a>
              <div class="banner-caption banner-caption-bottom banner-caption-grad">
                <h5 class="banner-title">Times Square</h5>
                <p class="banner-subtitle">Bright lights & Broadway shows</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 ">
            <div class="banner _h-33vh banner-animate banner-animate-mask-in">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/69401773_2548371878539260_3610469488929013760_n.jpg')}});"></div>
              <div class="banner-mask"></div>
              <a class="banner-link" href="#"></a>
              <div class="banner-caption banner-caption-bottom banner-caption-grad">
                <h5 class="banner-title">Rockefeller Center</h5>
                <p class="banner-subtitle">Iconic Midtown business complex</p>
              </div>
            </div>
          </div>
        -->
        </div>
      </div>
    </div>
  </div>
</div>



<div class="theme-page-section theme-page-section-xxl theme-page-section-gray">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="theme-page-section-header">
          <h5 class="theme-page-section-title">Quotes Acmetrader</h5>
          <p class="theme-page-section-subtitle">I think 'high risk high return'</p>
        </div>


        <div class="row magnific-gallery row-col-gap" data-gutter="10">
          <div class="col-xs-2-5 ">
            <div class="banner banner-sqr banner-">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/quest/Group-439@2x-640x480.png')}});"></div>
              <a class="banner-link" href="{{url('assets/home/img/quest/Group-439@2x-640x480.png')}}"></a>
            </div>
          </div>
          <div class="col-xs-2-5 ">
            <div class="banner banner-sqr banner-">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/quest/Group-440@2x-640x480.png')}});"></div>
              <a class="banner-link" href="{{url('assets/home/img/quest/Group-440@2x-640x480.png')}}"></a>
            </div>
          </div>
          <div class="col-xs-2-5 ">
            <div class="banner banner-sqr banner-">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/quest/Group-443@2x-640x480.png')}});"></div>
              <a class="banner-link" href="{{url('assets/home/img/quest/Group-443@2x-640x480.png')}}"></a>
            </div>
          </div>
          <div class="col-xs-2-5 ">
            <div class="banner banner-sqr banner-">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/quest/Group-445@2x-640x480.png')}});"></div>
              <a class="banner-link" href="{{url('assets/home/img/quest/Group-445@2x-640x480.png')}}"></a>
            </div>
          </div>
          <div class="col-xs-2-5 ">
            <div class="banner banner-sqr banner-">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/quest/Group-451@2x-640x480.png')}});"></div>
              <a class="banner-link" href="{{url('assets/home/img/quest/Group-451@2x-640x480.png')}}"></a>
            </div>
          </div>
          <div class="col-xs-2-5 ">
            <div class="banner banner-sqr banner-">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/quest/Group-456@2x-640x480.png')}});"></div>
              <a class="banner-link" href="{{url('assets/home/img/quest/Group-456@2x-640x480.png')}}"></a>
            </div>
          </div>
          <div class="col-xs-2-5 ">
            <div class="banner banner-sqr banner-">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/quest/Group-460@2x-640x480.png')}});"></div>
              <a class="banner-link" href="{{url('assets/home/img/quest/Group-460@2x-640x480.png')}}"></a>
            </div>
          </div>
          <div class="col-xs-2-5 ">
            <div class="banner banner-sqr banner-">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/quest/Group-461@2x-640x480.png')}});"></div>
              <a class="banner-link" href="{{url('assets/home/img/quest/Group-461@2x-640x480.png')}}"></a>
            </div>
          </div>
          <div class="col-xs-2-5 ">
            <div class="banner banner-sqr banner-">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/quest/Group-464@2x-640x480.png')}});"></div>
              <a class="banner-link" href="{{url('assets/home/img/quest/Group-464@2x-640x480.png')}}"></a>
            </div>
          </div>
          <div class="col-xs-2-5 ">
            <div class="banner banner-sqr banner-">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/quest/Group-465@2x-640x480.png')}});"></div>
              <a class="banner-link" href="{{url('assets/home/img/quest/Group-465@2x-640x480.png')}}"></a>
            </div>
          </div>
          <div class="col-xs-2-5 ">
            <div class="banner banner-sqr banner-">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/quest/Mask-Group-8@2x-640x480.png')}});"></div>
              <a class="banner-link" href="{{url('assets/home/img/quest/Mask-Group-8@2x-640x480.png')}}"></a>
            </div>
          </div>
          <div class="col-xs-2-5 ">
            <div class="banner banner-sqr banner-">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/quest/NoPath@2x-640x480.png')}});"></div>
              <a class="banner-link" href="{{url('assets/home/img/quest/NoPath@2x-640x480.png')}}"></a>
            </div>
          </div>
          <div class="col-xs-2-5 ">
            <div class="banner banner-sqr banner-">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/quest/Group-515-640x480.png')}});"></div>
              <a class="banner-link" href="{{url('assets/home/img/quest/Group-515-640x480.png')}}"></a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!--
<div class="row row-col-border-white" data-gutter="0">
  <div class="col-md-3 ">
    <div class="banner banner-">
      <img class="banner-img" src="{{url('assets/home/img/1.jpg')}}" alt="Image Alternative text" title="Image Title"/>
      <a class="banner-link" href="#"></a>
    </div>
  </div>
  <div class="col-md-3 ">
    <div class="banner banner-">
      <img class="banner-img" src="{{url('assets/home/img/2.jpg')}}" alt="Image Alternative text" title="Image Title"/>
      <a class="banner-link" href="#"></a>
    </div>
  </div>
  <div class="col-md-3 ">
    <div class="banner banner-">
      <img class="banner-img" src="{{url('assets/home/img/3.jpg')}}" alt="Image Alternative text" title="Image Title"/>
      <a class="banner-link" href="#"></a>
    </div>
  </div>
  <div class="col-md-3 ">
    <div class="banner banner-">
      <img class="banner-img" src="{{url('assets/home/img/4.jpg')}}" alt="Image Alternative text" title="Image Title"/>
      <a class="banner-link" href="#"></a>
    </div>
  </div>
</div>


<div class="theme-page-section theme-page-section-xxl theme-page-section-gray">
  <div class="container">
    <div class="theme-page-section-header">
      <h5 class="theme-page-section-title">Explore Popular Routes</h5>
    </div>

  </div>
</div>
-->

@endsection

@section('scripts')

<script>



</script>

@stop('scripts')
