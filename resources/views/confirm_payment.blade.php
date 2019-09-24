@extends('layouts.template2')

@section('title')

@stop



@section('stylesheet')
<link href="{{url('assets/home/air-datepicker/css/bootstrap-datepicker.css')}}" rel="stylesheet">
<link href="{{url('assets/home/icheck/skins/all.css?v=1.0.2')}}" rel="stylesheet">
<style>
ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
.demo-list ul li {
    position: relative;
    padding: 0 0 18px 42px;
}
#label-r{
  color: #666;
  font-size: 13px;
}
.theme-sidebar-section-features-list-title {
    font-size: 13px;
    margin-bottom: 5px;
    color: #af4444;
    margin-top: 0;
    line-height: 1.4em;
}
</style>
@stop('stylesheet')



@section('content')



<div class="theme-page-section theme-page-section-lg">
  <div class="container">
    <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
      <div class="col-md-2 ">


      </div>

      <div class="col-md-8 theme-sidebar-section _mb-10">
        <div class="theme-payment-page-sections">
          <div class="theme-payment-page-sections-item">
            <div class="theme-payment-page-signin">
              <i class="theme-payment-page-signin-icon fa fa-credit-card"></i>
              <div class="theme-payment-page-signin-body">
                <h4 class="theme-payment-page-signin-title">แจ้งการชำระเงิน</h4>
                <p class="theme-payment-page-signin-subtitle">โปรดกรอกข้อมูลรายละเอียดการชำระเงินอย่างครบถ้วน เพื่อประโยชน์แก่ท่านเอง </p>
              </div>

            </div>
          </div>
          <div class="theme-payment-page-sections-item">
            <div class="theme-search-results-item theme-payment-page-item-thumb">
              <div class="row" data-gutter="20">

                <div class="col-md-12 ">



                  @if ($errors->has('order_id_c'))
                      <h5 class="theme-sidebar-section-features-list-title text-dager"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก หมายเลขสั่งซื้อด้วยค่ะ!</h5>

                  @endif

                  @error('name_c')
                      <h5 class="theme-sidebar-section-features-list-title text-dager"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก ชื่อผู้แจ้งด้วยค่ะ!</h5>
                  @enderror

                  @error('email_c')
                      <h5 class="theme-sidebar-section-features-list-title text-dager"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก อีเมลด้วยค่ะ!</h5>
                  @enderror

                  @error('phone_c')
                      <h5 class="theme-sidebar-section-features-list-title text-dager"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก เบอร์ติดต่อด้วยค่ะ!</h5>
                  @enderror

                  @error('money_c')
                      <h5 class="theme-sidebar-section-features-list-title text-dager"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก ยอดชำระเงินด้วยค่ะ!</h5>
                  @enderror


                  @error('day_tran')
                      <h5 class="theme-sidebar-section-features-list-title text-dager"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก ยอดชำระเงินด้วยค่ะ!</h5>
                  @enderror


                  @error('image')
                      <h5 class="theme-sidebar-section-features-list-title text-dager"><i class="fa fa-info" aria-hidden="true"></i> กรุณาแบนหลักฐานการชำระเงินด้วยค่ะ!</h5>
                  @enderror

                  <br />
                </div>

                <div class="col-md-12 ">



                  <!-- Start form -->
                  <form  action="{{url('post_confirm_payment/')}}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}

                  <div class="theme-payment-page-form">
                  <div class="row row-col-gap" data-gutter="20">
                    <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input class="form-control" type="text" placeholder="หมายเลขสั่งซื้อ (ไม่ต้องใส่เครื่องหมาย #)" name="order_id_c" value="{{ old('order_id_c')}}">
                      </div>
                    </div>
                    <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input class="form-control" type="text" placeholder="ชื่อ-นามสกุล" name="name_c" value="{{ old('name_c')}}">
                      </div>
                    </div>
                    <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input class="form-control" type="text" placeholder="อีเมล" name="email_c" value="{{ old('email_c')}}">
                      </div>
                    </div>
                    <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input class="form-control" type="text" placeholder="เบอร์ติดต่อ" name="phone_c" value="{{ old('phone_c')}}">
                      </div>
                    </div>
                  </div>
                </div>

                <br /><br />
                <h5 class="theme-search-results-sidebar-section-title">โอนเงินเข้าธนาคารไหน?</h5>
                <div class="demo-callbacks ">
                  <div class="demo-list">


                  <ul>
                    <li>
                      <img src="https://www.masterphotonetwork.com/assets/images/bank/1539933252.png" class="img-responsive" style="height:25px; float:left; margin-right:6px;">
                      <input tabindex="3" type="radio" id="input-3" name="bank" value="1">
                      <label for="input-3" id="label-r" style="padding-left:10px;">Kasikorn Bank <span style="padding-left:10px;">047-3-29595-4</span> 	<span style="padding-left:10px;">Acdicator Co.,Ltd.</span></label>
                    </li>



                  </ul>

                  </div>
                </div>


                <br />
                <div class="theme-payment-page-form">
                <div class="row row-col-gap" data-gutter="20">
                  <div class="col-md-6 ">
                    <div class="theme-payment-page-form-item form-group">
                      <input class="form-control" type="text" placeholder="จำนวนเงิน" name="money_c" value="{{ old('money_c')}}">
                    </div>
                  </div>
                  <div class="col-md-12 ">

                  </div>
                  <div class="col-md-6 ">
                    <div class="theme-payment-page-form-item form-group">
                      <label id="label-r">วันที่-เวลาโอนเงิน</label>

                      <input id="inputdatepicker" class="form-control datepicker" data-date-format="mm/dd/yyyy" name="day_tran" value="{{ old('day_tran')}}">

                    </div>
                  </div>
                  <div class="col-md-3 ">
                    <div class="theme-payment-page-form-item form-group">
                      <label id="label-r">เวลา (ชั่วโมง : นาที)</label>
                      <input class="form-control" type="text" placeholder="10:30" name="time_tran" value="{{ old('time_tran')}}">
                    </div>
                  </div>


                  <div class="col-md-12 ">
                    <div class="theme-payment-page-form-item form-group">
                      <label id="label-r">สลิปการโอนเงิน</label>
                      <input class="" type="file" name="image">

                    </div>
                  </div>


                  <div class="col-md-12 ">
                    <div class="theme-payment-page-form-item form-group">
                      <label id="label-r">หมายเหตุ</label>
                      <textarea class="form-control" style="height:150px;" placeholder="ข้อความถึงทีมงาน" name="re_mark">{{ old('re_mark')}}</textarea>
                    </div>
                  </div>


                  <div class="col-md-12 text-center">
                    <hr />
                    <button type="submit" class="btn btn-primary-inverse btn-lg" >แจ้งชำระเงิน</button>

                  </div>

                  <br />





                </div>
              </div>


</form>

              <!-- End form -->

                </div>

              </div>
            </div>
          </div>






        </div>
      </div>



      <div class="col-md-2 ">


      </div>




    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="{{url('assets/home/air-datepicker/js/bootstrap-datepicker-custom.js')}}"></script>
<script src="{{url('assets/home/air-datepicker/locales/bootstrap-datepicker.th.min.js')}}"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>


@if ($message = Session::get('error_confirm'))
swal("หมายเลขสั่งซื้อ ไม่ถูกต้อง!", "ตรวจสอบให้แน่ใจ ว่าไม่ได้ใส่เครื่องหมาย # ลงไปด้วย");
  @endif
</script>





<script>
$(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: true,
                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true              //Set เป็นปี พ.ศ.
            }).datepicker("setDate", "0");  //กำหนดเป็นวันปัจุบัน
        });


$('#input-3').iCheck('check');

$(document).ready(function(){

  $('.demo-list input').on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function(event){

  }).iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%'
  });
});

</script>

@stop('scripts')
