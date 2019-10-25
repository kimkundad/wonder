@extends('layouts.template2')

@section('title')

@stop



@section('stylesheet')

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
              <li class="active">
                <a href="{{url('user_profile')}}">
                  <i class="fa fa-cog"></i>ข้อมูลส่วนตัว
                </a>
              </li>
              <li>
                <a href="{{url('buy_history')}}">
                  <i class="fa fa-history"></i>ประวัติ การสั่งซื้อ
                </a>
              </li>
              <li>
                <a href="{{url('user_point')}}">
                  <i class="fa fa-gift"></i>Point คะแนนสะสม
                </a>
              </li>
              <li>
                <a href="{{url('payment_history')}}">
                  <i class="fa fa-credit-card"></i>ประวัติ การชำระเงิน
                </a>
              </li>
              <li>
                <a href="{{url('events_history')}}">
                  <i class="fa fa-paw"></i>Event ที่เข้าร่วม
                </a>
              </li>
              <li>
                <a href="{{url('join_content_his')}}">กิจกรรม "อัปรูป รับพอยท์" </a>
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
        <h1 class="theme-account-page-title" style="font-size:28px;">ข้อมูลส่วนตัว</h1>
        <div class="row">
          <div class="col-md-9 ">
            <div class="theme-account-preferences">


              <div class="theme-account-preferences-item">
                <div class="row">
                  <div class="col-md-3 ">
                    <h5 class="theme-account-preferences-item-title">QR CODE</h5>
                  </div>
                  <div class="col-md-7 ">
                    {!!DNS2D::getBarcodeHTML($objs->code_user, "QRCODE")!!}


                  </div>
                </div>
              </div>


              <div class="theme-account-preferences-item">
                <div class="row">
                  <div class="col-md-3 ">
                    <h5 class="theme-account-preferences-item-title">หมายเลขสมาชิก</h5>
                  </div>
                  <div class="col-md-7 ">
                    <p class="theme-account-preferences-item-value">{{$objs->code_user}}</p>
                  </div>
                </div>
              </div>


              <div class="theme-account-preferences-item">
                <div class="row">
                  <div class="col-md-3 ">
                    <h5 class="theme-account-preferences-item-title">อีเมล</h5>
                  </div>
                  <div class="col-md-7 ">
                    <p class="theme-account-preferences-item-value">{{$objs->email}}</p>
                  </div>
                </div>
              </div>


              <div class="theme-account-preferences-item">
                <div class="row">
                  <div class="col-md-3 ">
                    <h5 class="theme-account-preferences-item-title">ชื่อผู้ใช้งาน</h5>
                  </div>
                  <div class="col-md-7 ">
                    <p class="theme-account-preferences-item-value">{{$objs->name}}</p>
                    <div class="collapse" id="ChangeHomeAirportChange">
                      <div class="theme-account-preferences-item-change">

                        <div class="form-group theme-account-preferences-item-change-form">
                          <input class="form-control" type="text" value="{{$objs->name}}"/>
                        </div>
                        <div class="theme-account-preferences-item-change-actions">
                          <a class="btn btn-sm btn-primary" href="#">Save changes</a>
                          <a class="btn btn-sm btn-default" href="#ChangeHomeAirportChange" data-toggle="collapse" aria-expanded="false" aria-controls="ChangeHomeAirportChange">Cancel</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 ">
                    <a class="theme-account-preferences-item-change-link" href="#ChangeHomeAirportChange" data-toggle="collapse" aria-expanded="false" aria-controls="ChangeHomeAirportChange">
                      <i class="fa fa-pencil"></i>edit
                    </a>
                  </div>
                </div>
              </div>
              <div class="theme-account-preferences-item">
                <div class="row">
                  <div class="col-md-3 ">
                    <h5 class="theme-account-preferences-item-title">เบอร์ติดต่อ</h5>
                  </div>
                  <div class="col-md-7 ">
                    <p class="theme-account-preferences-item-value">{{$objs->phone}}</p>
                    <div class="collapse" id="ChangeHomeSite">
                      <div class="theme-account-preferences-item-change">

                        <div class="form-group theme-account-preferences-item-change-form">
                          <input class="form-control" type="text" value="{{$objs->phone}}"/>
                        </div>
                        <div class="theme-account-preferences-item-change-actions">
                          <a class="btn btn-sm btn-primary" href="#">Save changes</a>
                          <a class="btn btn-sm btn-default" href="#ChangeHomeSite" data-toggle="collapse" aria-expanded="false" aria-controls="ChangeHomeSite">Cancel</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 ">
                    <a class="theme-account-preferences-item-change-link" href="#ChangeHomeSite" data-toggle="collapse" aria-expanded="false" aria-controls="ChangeHomeSite">
                      <i class="fa fa-pencil"></i>edit
                    </a>
                  </div>
                </div>
              </div>




              <div class="theme-account-preferences-item">
                <div class="row">
                  <div class="col-md-3 ">
                    <h5 class="theme-account-preferences-item-title">ที่อยู่</h5>
                  </div>
                  <div class="col-md-7 ">
                    <p class="theme-account-preferences-item-value">{{$objs->address}}</p>
                    <div class="collapse" id="ChangeLanguage">
                      <div class="theme-account-preferences-item-change">
                        <div class="form-group theme-account-preferences-item-change-form">
                          <textarea class="form-control" rows="5" placeholder="Message">{{$objs->address}}</textarea>
                        </div>
                        <div class="theme-account-preferences-item-change-actions">
                          <a class="btn btn-sm btn-primary" href="#">Save changes</a>
                          <a class="btn btn-sm btn-default" href="#ChangeLanguage" data-toggle="collapse" aria-expanded="false" aria-controls="ChangeLanguage">Cancel</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 ">
                    <a class="theme-account-preferences-item-change-link" href="#ChangeLanguage" data-toggle="collapse" aria-expanded="false" aria-controls="ChangeLanguage">
                      <i class="fa fa-pencil"></i>edit
                    </a>
                  </div>
                </div>
              </div>

              <br /><br /><br /><br />




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
