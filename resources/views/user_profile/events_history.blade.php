@extends('layouts.template2')

@section('title')

@stop



@section('stylesheet')
<style>
.text-warning {
    color: #de9b28;
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
        <div class="theme-account-bookmarks-item">
          <div class="row">
            <div class="col-md-8 ">
              <div class="theme-account-bookmarks-item-thumb">
                <a class="theme-account-bookmarks-item-thumb-link" href="#"></a>
                <div class="row row-eq-height" data-gutter="none">
                  <div class="col-md-6 ">
                    <div class="banner theme-account-bookmarks-item-img banner-sqr banner-">
                      <div class="banner-bg" style="background-image:url({{url('assets/home/img/events/1568873099054.jpg')}});"></div>
                      <a class="banner-link" href="#"></a>
                    </div>
                  </div>
                  <div class="col-md-6 ">
                    <div class="theme-account-bookmarks-item-thumb-body">
                      <div class="row">
                        <div class="col-xs-9 ">
                          <p class="theme-account-bookmarks-item-location">Hotel in New York</p>
                          <h5 class="theme-account-bookmarks-item-title">Park Central New York</h5>
                        </div>
                        <div class="col-xs-3 ">
                          <p class="theme-account-bookmarks-item-price">$109</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 ">
              <div class="theme-account-bookmarks-item-info">
                <p class="theme-account-bookmarks-item-date">Saved on June 23, 2018</p>
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
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')

<script>



</script>

@stop('scripts')
