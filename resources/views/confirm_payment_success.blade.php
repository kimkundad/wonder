@extends('layouts.template2')

@section('title')

@stop



@section('stylesheet')

@stop('stylesheet')



@section('content')



<div class="theme-page-section theme-page-section-xl theme-page-section-gray">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="theme-payment-success">
          <div class="theme-payment-success-header">
            <i class="fa fa-check-circle theme-payment-success-header-icon"></i>
            <h1 class="theme-payment-success-title">คุณทำรายการสำเร็จ</h1>
            <p class="theme-payment-success-subtitle">ทางทีมงานจะรีบตรวจสอบให้เร็วที่สุด</p>
          </div>
          <div class="theme-payment-success-box">
            <ul class="theme-payment-success-summary">
              <li>Order ID
                <span>{{$objs->order_id_c}}</span>
              </li>
              <li>วันที่
                <span>{{$objs->day_tran}} / {{$objs->time_tran}}</span>
              </li>
              <li>ชื่อผู้ส่งเรื่อง
                <span>{{$objs->name_c}}</span>
              </li>
              <li>เลือกชำระเงิน
                <span>โอนผ่านธนาคาร</span>
              </li>
              <li>อีเมล
                <span>{{$objs->email_c}}</span>
              </li>
              <li>เบอร์ติดต่อ
                <span>{{$objs->phone_c}}</span>
              </li>
              <li>ยอดที่ต้องชำระ
                <span>฿{{$objs->money_c}}</span>
              </li>
            </ul>
            <p class="theme-payment-success-check-order">คุณสามารถตรวจสอบรายละเอียดการสั่งซื้อของคุณได้
              <a href="{{url('buy_history')}}">ประวัติ การสั่งซื้อ</a>.
            </p>
          </div>
          <ul class="theme-payment-success-actions">
            <li>
              <a href="#">
                <i class="fa fa-file-pdf-o"></i>
                <p>PDF
                  <br/>receipt
                </p>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-print"></i>
                <p>Print
                  <br/>receipt
                </p>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-envelope-o"></i>
                <p>SMS
                  <br/>receipt
                </p>
              </a>
            </li>
          </ul>
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
