@extends('layouts.template2')

@section('title')

@stop



@section('stylesheet')
<style>
.text-warning {
    color: #de9b28;
}
.banner-bg {
    -webkit-background-size: cover;
    -moz-background-size: cover;
    /* background-size: cover; */
    /* background-position: center center; */
    /* background-repeat: no-repeat; */
    position: absolute;
    top: 0;
    left: 0;
    height: 250px;
    width: 100%;
    z-index: 1;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -ms-backface-visibility: hidden;
    backface-visibility: hidden;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.banner-link {
    position: absolute;
    top: 0;
    left: 0;
    height: 250px;
    width: 100%;
    z-index: 6;
}
</style>
@stop('stylesheet')



@section('content')



<div class="theme-page-section theme-page-section-gray theme-page-section-lg">
  <div class="container">
    <div class="row">
      <div class="col-md-2-5 ">
        <div class="theme-account-sidebar">
          <div class="theme-account-avatar">


            @if($objs->provider == 'email')
            <img class="theme-account-avatar-img" src="{{url('assets/images/avatar/'.$objs->avatar)}}" alt="{{$objs->anme}}" title="{{$objs->name}}"/>
            @else
            <img class="theme-account-avatar-img" src="{{$objs->avatar}}" alt="{{$objs->name}}" title="{{$objs->name}}"/>
            @endif

            <p class="theme-account-avatar-name">Welcome,
              <br/>{{$objs->name}}
            </p>
          </div>
          <nav class="theme-account-nav">
            <ul class="theme-account-nav-list">
              <li >
                <a href="{{url('user_profile')}}">
                  <i class="fa fa-cog"></i>ข้อมูลส่วนตัว
                </a>
              </li>
              <li >
                <a href="{{url('buy_history')}}">
                  <i class="fa fa-history"></i>ประวัติ การสั่งซื้อ
                </a>
              </li>
              <li>
                <a href="{{url('user_point')}}">
                  <i class="fa fa-gift"></i>Point คะแนนสะสม
                </a>
              </li>
              <li >
                <a href="{{url('payment_history')}}">
                  <i class="fa fa-credit-card"></i>ประวัติ การชำระเงิน
                </a>
              </li>
              <li class="active">
                <a href="{{url('events_history')}}">
                  <i class="fa fa-paw"></i>Event ที่เข้าร่วม
                </a>
              </li>
              <li>
                <a href="{{url('logout')}}">
                  <i class="fa fa-lock"></i>ออกจากระบบ
                </a>
              </li>

            </ul>
          </nav>
        </div>
      </div>



      <div class="col-md-9-5 ">



        <h1 class="theme-account-page-title" style="font-size:28px;">Event ที่เข้าร่วม</h1>



        @if(isset($get_event))
        @foreach($get_event as $u)

        <div class="theme-account-bookmarks-item">
          <div class="row">

            <div class="col-md-8 " >
              <div class="theme-account-bookmarks-item-thumb" style="height: 250px;">
                <a class="theme-account-bookmarks-item-thumb-link" href="#"></a>
                <div class="row row-eq-height" data-gutter="none">
                  <div class="col-md-8 ">
                    <div class=" theme-account-bookmarks-item-img banner-sqr banner-">
                      <div class="banner-bg" style="background-image:url({{url('assets/home/img/events/'.$u->e_image)}});"></div>
                      <a class="banner-link" href="#"></a>
                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="theme-account-bookmarks-item-thumb-body">
                      <div class="row">
                        <div class="col-xs-12 ">
                          <p class="theme-account-bookmarks-item-location">{{$u->e_image}}</p>
                          <h5 class="theme-account-bookmarks-item-title">{{$u->e_detail}}</h5>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 ">
              <div class="theme-account-bookmarks-item-info">
                <p class="theme-account-bookmarks-item-date">Saved on {{$u->created_ats}}</p>
                <ul class="theme-account-bookmarks-item-actions">
                  <li>
                    <a href="#">
                      <i class="lin lin-menu theme-account-bookmarks-item-action-icon"></i>See all
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="lin lin-share theme-account-bookmarks-item-action-icon"></i>Share
                    </a>
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

<script>



</script>

@stop('scripts')
