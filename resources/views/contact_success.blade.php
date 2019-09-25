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
          <div class="theme-payment-success-box text-center">

            <p class="theme-payment-success-check-order">กลับไปยังหน้าหลักของเว็บไซต์
              <a href="{{url('/')}}">Homepage</a>.
            </p>
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
