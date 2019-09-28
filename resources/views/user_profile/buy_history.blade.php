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
              <li class="active">
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
                <a href="{{url('logout')}}">
                  <i class="fa fa-lock"></i>ออกจากระบบ
                </a>
              </li>

            </ul>
          </nav>
        </div>
      </div>



      <div class="col-md-9-5 ">
        <h1 class="theme-account-page-title" style="font-size:28px;">ประวัติ การสั่งซื้อ</h1>
        <div class="theme-account-history">
          <table class="table">
            <thead>
              <tr>
                <th></th>
                <th>สินค้า</th>
                <th>สถานะ</th>
                <th>วันที่</th>
                <th>ราคา</th>
              </tr>
            </thead>
            <tbody>

              @if(isset($order))
                @foreach($order as $u)
              <tr>
                <td class="theme-account-history-type">
                  <i class="fa fa-cube theme-account-history-type-icon"></i> {{$u->code_order}}
                </td>
                <td>
                  <p class="theme-account-history-type-title">{{$u->p_name}}</p>
                  <a class="theme-account-history-item-name" href="#">ดูรายละเอียด</a>
                  <!--<a class="theme-account-history-item-name" href="{{url('order_detail/'.$u->id_de)}}">ดูรายละเอียด</a>-->
                </td>
                <td>
                  @if($u->pay_status == 0)
                  <a href="#" class="text-warning"><b>รอการยืนยัน</b></a>
                  @else
                  <a href="#" class="text-success"><b>จัดส่งแล้ว</b></a>
                  @endif

                </td>
                <td class="theme-account-history-tr-date">
                  <p class="theme-account-history-date">{{$u->created_ats}}</p>
                </td>
                <td>
                  <p class="theme-account-history-item-price">฿{{$u->p_pricec}} </p>
                </td>
              </tr>
                @endforeach
              @endif
              <!--

              <tr>
                <td class="theme-account-history-type">
                  <i class="fa fa-cube theme-account-history-type-icon"></i>
                </td>
                <td>
                  <p class="theme-account-history-type-title">UNLOCK ACME SHIRT</p>
                  <a class="theme-account-history-item-name" href="#">ดูรายละเอียด</a>
                </td>
                <td>
                  <a href="#" class="text-warning"><b>รอการยืนยัน</b></a>
                </td>
                <td class="theme-account-history-tr-date">
                  <p class="theme-account-history-date">Sep 23, 2017 &#8212; Sep 25, 2017</p>
                </td>
                <td>
                  <p class="theme-account-history-item-price">฿888.00</p>
                </td>
              </tr>



              <tr>
                <td class="theme-account-history-type">
                  <i class="fa fa-cube theme-account-history-type-icon"></i>
                </td>
                <td>
                  <p class="theme-account-history-type-title">UNLOCK ACME SHIRT</p>
                  <a class="theme-account-history-item-name" href="#">ดูรายละเอียด</a>
                </td>
                <td>
                  <a href="#" class="text-danger"><b>จัดส่งแล้ว</b></a>
                </td>
                <td class="theme-account-history-tr-date">
                  <p class="theme-account-history-date">Sep 23, 2017 &#8212; Sep 25, 2017</p>
                </td>
                <td>
                  <p class="theme-account-history-item-price">฿888.00</p>
                </td>
              </tr>


              <tr>
                <td class="theme-account-history-type">
                  <i class="fa fa-cube theme-account-history-type-icon"></i>
                </td>
                <td>
                  <p class="theme-account-history-type-title">UNLOCK ACME SHIRT</p>
                  <a class="theme-account-history-item-name" href="#">ดูรายละเอียด</a>
                </td>
                <td>
                  <a href="#" class="text-success"><b>จัดส่งแล้ว</b></a>
                </td>
                <td class="theme-account-history-tr-date">
                  <p class="theme-account-history-date">Sep 23, 2017 &#8212; Sep 25, 2017</p>
                </td>
                <td>
                  <p class="theme-account-history-item-price">฿888.00</p>
                </td>
              </tr>


              <tr>
                <td class="theme-account-history-type">
                  <i class="fa fa-cube theme-account-history-type-icon"></i>
                </td>
                <td>
                  <p class="theme-account-history-type-title">UNLOCK ACME SHIRT</p>
                  <a class="theme-account-history-item-name" href="#">ดูรายละเอียด</a>
                </td>
                <td>
                  <a href="#" class="text-warning"><b>รอการยืนยัน</b></a>
                </td>
                <td class="theme-account-history-tr-date">
                  <p class="theme-account-history-date">Sep 23, 2017 &#8212; Sep 25, 2017</p>
                </td>
                <td>
                  <p class="theme-account-history-item-price">฿888.00</p>
                </td>
              </tr>



              <tr>
                <td class="theme-account-history-type">
                  <i class="fa fa-cube theme-account-history-type-icon"></i>
                </td>
                <td>
                  <p class="theme-account-history-type-title">UNLOCK ACME SHIRT</p>
                  <a class="theme-account-history-item-name" href="#">ดูรายละเอียด</a>
                </td>
                <td>
                  <a href="#" class="text-danger"><b>จัดส่งแล้ว</b></a>
                </td>
                <td class="theme-account-history-tr-date">
                  <p class="theme-account-history-date">Sep 23, 2017 &#8212; Sep 25, 2017</p>
                </td>
                <td>
                  <p class="theme-account-history-item-price">฿888.00</p>
                </td>
              </tr>


            -->





            </tbody>
          </table>
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
