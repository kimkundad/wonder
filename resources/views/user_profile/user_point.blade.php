@extends('layouts.template2')

@section('title')

@stop



@section('stylesheet')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<style>
.text-warning {
    color: #de9b28;
}
.dataTables_length{
  display: none;
}
.dataTables_filter{
  display: none;
}
.theme-account-history table > thead > tr > th {
    border: none;
    opacity: 1;
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
              <li class="active">
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
        <div class="theme-payment-page-signin">
                  <i class="theme-payment-page-signin-icon fa fa-gift text-danger" style="color:#d4147d"></i>
                  <div class="theme-payment-page-signin-body">
                    <h4 class="theme-payment-page-signin-title" style="font-size:22px;">Point คะแนนสะสม</h4>
                    <p class="theme-payment-page-signin-subtitle">ทุกครั้งที่มีการเข้าร่วมงาน Events หรือซื้อสินค้า Point จะเข้าสู่ระบบอัตโนมัติ</p>
                  </div>

                </div>
                <br />
        <div class="theme-account-history">


          <table class="table" >
            <thead>
              <tr>

                <th>กิจกรรม / ซื้อสินค้า</th>
                <th><a href="#" style="color:#d4147d; font-size:14px; opacity: 0.9 !important;"><b>Point รวม : {{$sum_point}}</b></a></th>
                <th>วันที่</th>

              </tr>
            </thead>
            <tbody >



              @if(isset($order))
                @foreach($order as $u)


                <tr >

                  <td>
                    <p class="theme-account-history-type-title">{{$u->detail_data}}</p>

                  </td>
                  <td>
                    <a href="#" style="color:#d4147d"><b><i class="fa fa-plus"></i> {{$u->get_point}}</b></a>
                  </td>
                  <td class="theme-account-history-tr-date">
                    <p class="theme-account-history-date">{{$u->created_at}}</p>
                  </td>

                </tr>



                @endforeach
              @endif



            </tbody>
          </table>
          <div class="pagination"> {{ $order->links() }} </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>

$(document).ready( function () {
  $('#example1').DataTable( {
      "order": [[ 3, "desc" ]]
  } );
} );

</script>

@stop('scripts')
