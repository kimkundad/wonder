@extends('layouts.template')

@section('title')
AcmeTrader กลุ่มสุดยอดนักเทรดที่ก่อตั้งขึ้นเพื่อพัฒนาศักยภาพมนุษย์ให้มีความรู้ความสามารถด้านการลงทุนและใช้ชีวิต
@stop



@section('stylesheet')
<style>
.theme-hero-area-mask-strong {
    opacity: 0.2;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=66)";
    filter: alpha(opacity=66);
}
.owl-carousel-nav-white .owl-prev, .owl-carousel-nav-white .owl-next {
    opacity: 1;
    -ms-filter: none;
    filter: none;
    color: #666 !important;
}
.banner-mask {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 2;
    background: #000;
    opacity: 0;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=33)";
    filter: alpha(opacity=33);
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -ms-backface-visibility: hidden;
    backface-visibility: hidden;
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
          <h5 class="theme-page-section-title">The AcmeTrader Identity</h5>
          <p class="theme-page-section-subtitle">" สัญลักษณ์ของกลุ่ม AcmeTrader "

เพื่อแสดงออกถึงอุดมการณ์ และปณิธานที่มีร่วมกัน<br /> - Limited Edition สินค้าผลิตเฉพาะ มีจำนวนจำกัด -</p>
        </div>



        <div class="row row-col-gap" data-gutter="10">
          <div class="col-md-5 ">
            <div class="banner  _br-3 banner-animate banner-animate-mask-in banner-animate-very-slow banner-animate-zoom-in" style="height:360px;">
              <div class="banner-bg" style="background-image:url('{{url('assets/image/CR804522-edit_1.jpg')}}');"></div>
              <div class="banner-mask"></div>
              <a class="banner-link" href="{{url('product/1')}}"></a>
              <div class="banner-caption _pt-100 banner-caption-bottom banner-caption-grad">
                <h5 class="banner-title">Unlock Acme Shirt</h5>
                <p class="banner-subtitle">จัดทำขึ้นมาสำหรับกิจกรรม “Unlock Acme and His Cloner” เท่านั้น</p>
              </div>
            </div>
          </div>
          <div class="col-md-7 ">
            <div class="banner  _br-3 banner-animate banner-animate-mask-in banner-animate-very-slow banner-animate-zoom-in" style="height:360px;">
              <div class="banner-bg" style="background-image:url('{{url('assets/image/CR804522-edit_0.jpg')}}');"></div>
              <div class="banner-mask"></div>
              <a class="banner-link" href="{{url('product/1')}}"></a>
              <div class="banner-caption _pt-100 banner-caption-bottom banner-caption-grad">
                <h5 class="banner-title">Unlock Acme Shirt</h5>
                <p class="banner-subtitle">เสื้อ AcmeTrader รุ่น "I Am Trader” Item Limited Edition"</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="banner  _br-3 banner-animate banner-animate-mask-in banner-animate-very-slow banner-animate-zoom-in" style="height:360px;">
              <div class="banner-bg" style="background-image:url('{{url('assets/image/CR804522-edit_2.jpg')}}');"></div>
              <div class="banner-mask"></div>
              <a class="banner-link" href="{{url('product/3')}}"></a>
              <div class="banner-caption _pt-100 banner-caption-bottom banner-caption-grad">
                <h5 class="banner-title" style="font-size: 14px;">AcmeTrader Stainless Steel Tumbler</h5>
                <p class="banner-subtitle">แก้วน้ำสแตนเลสมาตรฐาน ขนาด 890 มล. มาพร้อมกับฝาล็อกใส</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="banner  _br-3 banner-animate banner-animate-mask-in banner-animate-very-slow banner-animate-zoom-in" style="height:360px;">
              <div class="banner-bg" style="background-image:url('{{url('assets/image/CR804522-edit_3.jpg')}}');"></div>
              <div class="banner-mask"></div>
              <a class="banner-link" href="{{url('product/2')}}"></a>
              <div class="banner-caption _pt-100 banner-caption-bottom banner-caption-grad">
                <h5 class="banner-title">AcmeTrader Wristband RFID</h5>
                <p class="banner-subtitle">ใช้สำหรับการสะสมเเต้มกิจกรรมกับ กลุ่ม AcmeTrader</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="banner  _br-3 banner-animate banner-animate-mask-in banner-animate-very-slow banner-animate-zoom-in" style="height:360px;">
              <div class="banner-bg" style="background-image:url('{{url('assets/image/CR804522-edit_4.jpg')}}');"></div>
              <div class="banner-mask"></div>
              <a class="banner-link" href="{{url('product/4')}}"></a>
              <div class="banner-caption _pt-100 banner-caption-bottom banner-caption-grad">
                <h5 class="banner-title">Unlock AcmeTrader premium set 2</h5>
                <p class="banner-subtitle"> เสื้อ Unlock Acme / เเก้วเก็บความร้อน - เย็น / สายรัดข้อมือ RFID</p>
              </div>
            </div>
          </div>

        </div>



      <!--  <div class="theme-inline-slider row" data-gutter="10">

          <div class="owl-carousel" data-items="4" data-loop="true" data-nav="true">

            @if(isset($objs))
              @foreach($objs as $u)
              <div class="theme-inline-slider-item">



                <a href="{{url('product/'.$u->id)}}">
                <img class="img-fluid" src="{{url('assets/home/img/products/'.$u->p_image)}}" style="width:100%; border: 1px solid #e6e6e6;">
                </a>


              </div>
              @endforeach
            @endif

          </div>
        </div> -->


      </div>
    </div>
  </div>
</div>



<div class="theme-hero-area">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg ws-action" style="background-image:url({{url('assets/home/img/cover_content_bg.jpg')}});" data-parallax="true"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-strong"></div>
  </div>
  <div class="theme-hero-area-body">
    <div class="theme-page-section theme-page-section-xxl">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="theme-hero-text theme-hero-text-white theme-hero-text-center">
              <div class="theme-hero-text-header">
                <h2 class="theme-hero-text-title">ร่วมกันพัฒนาศักยภาพมนุษย์</h2>
                <p class="theme-hero-text-subtitle">ไม่มีค่าใช้จ่ายเริ่มต้น ค่าสมัครสมาชิกรายเดือน ใช้ชีวิต เรียนรู้ที่จะประสบความสำเร็จ และ ช่วยเหลือผู้อื่นต่อไป</p>
              </div>
              <a class="btn _tt-uc _mt-20 btn-white btn-ghost btn-lg" href="{{url('login')}}">สมัครใช้งานฟรี</a>
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
          <h5 class="theme-page-section-title">กิจกรรมของกลุ่ม AcmeTrader</h5>
          <p class="theme-page-section-subtitle"> “ความสำเร็จไม่ได้สร้างภายในวันเดียวและคนที่ไม่หยุดทำเท่านั้นที่จะได้รับมัน”</p>
        </div>
        <div class="row " data-gutter="10">


          <div class="col-md-12 ">

          <a href="https://www.alphame.co.th/run-for-pet-2019/">
          <img class="img-fluid" src="{{url('assets/image/Web-cover-run-for-pet-2019.jpg')}}" style="width:100%; margin-bottom:8px;">

          </a>
          </div>



          <div class="col-md-6 ">

            <!--
            <div class="banner _h-50vh banner-animate banner-animate-mask-in">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/events/1569318104.jpg')}});"></div>
              <div class="banner-mask"></div>
              <a class="banner-link" href="{{url('vampireday')}}"></a>
              <div class="banner-caption banner-caption-bottom banner-caption-grad">
                <h5 class="banner-title">Acme Vampire Day #2</h5>
                <p class="banner-subtitle">กิจกรรม “Acme Vampire Day” (แอ็คมี่ แวมไพร์ เดย์) กิจกรรมรณรงค์เพื่อบริจาคโลหิต ณ ศูนย์บริการโลหิตแห่งชาติ สภากาชาดไทย เมื่อวันที่ 2 พฤศจิกายน 2562  กิจกรรมในครั้งนี้ได้มีผู้เข้าร่วมบริจาคโลหิตให้กับศูนย์บริการโลหิตแห่งชาติ</p>
              </div>
            </div>
          -->
          <a href="{{url('unlock_events')}}">
          <img class="img-fluid" src="{{url('assets/home/img/unlock_events_post.png')}}" style="width:100%">
          </a>
          </div>

          <div class="col-md-6 ">

            <!--
            <div class="banner _h-50vh banner-animate banner-animate-mask-in">
              <div class="banner-bg" style="background-image:url({{url('assets/home/img/events/1569318104.jpg')}});"></div>
              <div class="banner-mask"></div>
              <a class="banner-link" href="{{url('vampireday')}}"></a>
              <div class="banner-caption banner-caption-bottom banner-caption-grad">
                <h5 class="banner-title">Acme Vampire Day #2</h5>
                <p class="banner-subtitle">กิจกรรม “Acme Vampire Day” (แอ็คมี่ แวมไพร์ เดย์) กิจกรรมรณรงค์เพื่อบริจาคโลหิต ณ ศูนย์บริการโลหิตแห่งชาติ สภากาชาดไทย เมื่อวันที่ 2 พฤศจิกายน 2562  กิจกรรมในครั้งนี้ได้มีผู้เข้าร่วมบริจาคโลหิตให้กับศูนย์บริการโลหิตแห่งชาติ</p>
              </div>
            </div>
          -->
          <a href="{{url('vampireday')}}">
          <img class="img-fluid" src="{{url('assets/home/img/events/1569318104.jpg')}}" style="width:100%">
          </a>
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
          <h5 class="theme-page-section-title">อุดมการณ์และคำพูดสร้างแรงบันดาลใจ</h5>

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
