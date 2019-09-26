@extends('layouts.template2')

@section('title')

@stop



@section('stylesheet')

@stop('stylesheet')



@section('content')





<div class="theme-page-section theme-page-section-lg">
  <div class="container">
    <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
      <div class="col-md-8 ">
        <div class="theme-payment-page-sections">

          @if (Auth::guest())
          <div class="theme-payment-page-sections-item">
            <div class="theme-payment-page-signin">
              <i class="theme-payment-page-signin-icon fa fa-user-circle-o"></i>
              <div class="theme-payment-page-signin-body">
                <h4 class="theme-payment-page-signin-title">กรุณาเข้าสู่ระบบ การสั่งซื้อสินค้า</h4>
                <p class="theme-payment-page-signin-subtitle">เพื่อสามารถสั่งซื้อสินค้าของคุณ และกรอกข้อมูลการจัดส่งชำระเงินได้</p>
              </div>
              <a class="btn theme-payment-page-signin-btn btn-primary" href="{{url('login')}}">เข้าสู่ระบบ</a>
            </div>
          </div>
          @else
          @endif

          <div class="theme-payment-page-sections-item">
            <div class="theme-search-results-item theme-payment-page-item-thumb">
              <div class="row" data-gutter="20">




                <div class="col-md-12 ">

                  <h5 class="theme-search-results-item-title">{{$objs->p_name}}</h5>
                  <p class="theme-search-results-item-flight-payment-info">{{$objs->p_detail}}</p>


                <!--  <div class="fotorama _mb-20" data-nav="thumbs" data-minwidth="80%" data-arrows="always" data-allowfullscreen="native">
                    <img src="{{url('assets/home/img/secret/Gbt64aPxRJijP64nAONh_SEC101M_2_540x.jpg')}}" alt="Image Alternative text" title="Image Title"/>
                    <img src="{{url('assets/home/img/secret/kZwNzfBQVmYPtY7871cA_SEC101M_5_1800x1800.jpg')}}" alt="Image Alternative text" title="Image Title"/>
                    <img src="{{url('assets/home/img/secret/m7m52hW6R2uJysRSb9XU_SEC101M_3_1800x1800.jpg')}}" alt="Image Alternative text" title="Image Title"/>
                    <img src="{{url('assets/home/img/secret/Qg44wzPQQeXol9VVvxpN_SEC101M_4_1800x1800.jpg')}}" alt="Image Alternative text" title="Image Title"/>
                    <img src="{{url('assets/home/img/secret/Qg44wzPQQeXol9VVvxpN_SEC101M_4_1800x1800.jpg')}}" alt="Image Alternative text" title="Image Title"/>
                    <img src="./img/1140x480.png" alt="Image Alternative text" title="Image Title"/>
                    <img src="./img/1140x480.png" alt="Image Alternative text" title="Image Title"/>
                    <img src="./img/1140x480.png" alt="Image Alternative text" title="Image Title"/>
                    <img src="./img/1140x480.png" alt="Image Alternative text" title="Image Title"/>
                    <img src="./img/1140x480.png" alt="Image Alternative text" title="Image Title"/>
                    <img src="./img/1140x480.png" alt="Image Alternative text" title="Image Title"/>
                    <img src="./img/1140x480.png" alt="Image Alternative text" title="Image Title"/>
                  </div>
                -->


                  <div class="theme-item-page-details-section">
                    <div class="row magnific-gallery row-col-gap" data-gutter="10">

                      @if($count_image > 0)

                      <div class="col-xs-6 ">
                        <div class="banner _h-60vh _h-mob-15vh banner-">
                          <div class="banner-bg img-thumbnail" style="background-image:url({{url('assets/home/img/gallery/'.$get_image[0]->image)}});"></div>
                          <a class="banner-link" href="{{url('assets/home/img/gallery/'.$get_image[0]->image)}}"></a>
                        </div>
                      </div>
                      <div class="col-xs-6 ">
                        <div class="banner _h-60vh _h-mob-15vh banner-">
                          <div class="banner-bg img-thumbnail" style="background-image:url({{url('assets/home/img/gallery/'.$get_image[1]->image)}});"></div>
                          <a class="banner-link" href="{{url('assets/home/img/gallery/'.$get_image[1]->image)}}"></a>
                        </div>
                      </div>
                      <div class="col-xs-4 ">
                        <div class="banner _h-40vh _h-mob-15vh banner-">
                          <<div class="banner-bg img-thumbnail" style="background-image:url({{url('assets/home/img/gallery/'.$get_image[2]->image)}});"></div>
                          <a class="banner-link" href="{{url('assets/home/img/gallery/'.$get_image[2]->image)}}"></a>
                        </div>
                      </div>
                      <div class="col-xs-4 ">
                        <div class="banner _h-40vh _h-mob-15vh banner-">
                          <div class="banner-bg img-thumbnail" style="background-image:url({{url('assets/home/img/gallery/'.$get_image[3]->image)}});"></div>
                          <a class="banner-link" href="{{url('assets/home/img/gallery/'.$get_image[3]->image)}}"></a>
                        </div>
                      </div>
                      <div class="col-xs-4 ">
                        <div class="banner _h-40vh _h-mob-15vh banner-">
                          <div class="banner-bg img-thumbnail" style="background-image:url({{url('assets/home/img/gallery/'.$get_image[4]->image)}});"></div>
                          <a class="banner-link" href="{{url('assets/home/img/gallery/'.$get_image[4]->image)}}"></a>
                        </div>
                      </div>
                      @else

                      <div class="col-xs-8 ">
                        <div class="banner _h-60vh _h-mob-15vh banner-">
                          <div class="banner-bg img-thumbnail" style="background-image:url({{url('assets/home/img/products/'.$objs->p_image)}});"></div>
                          <a class="banner-link" href="{{url('assets/home/img/products/'.$objs->p_image)}}"></a>
                        </div>
                      </div>
                      @endif


                    </div>
                  </div>



                </div>

              </div>
            </div>
          </div>

<!-- start form -->

<form  action="{{url('submit_product/'.$objs->id)}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

          @if($objs->p_size != 0)
          <div class="theme-payment-page-sections-item">


            <h3 class="theme-payment-page-sections-item-title">เลือกแบบของสินค้า</h3>
            <div class="theme-payment-page-form">
              <h3 class="theme-payment-page-form-title">เลือกรูปแบบสินค้า สีของสินค้า Size ตามที่ลูกค้าต้องการ</h3>
              <div class="row row-col-gap" data-gutter="20">
                <div class="col-md-6 ">
                  <div class="theme-payment-page-form-item form-group">
                    <i class="fa fa-angle-down"></i>
                    <select class="form-control" name="option1">
                      @if(isset($option1))
                        @foreach($option1 as $u)
                          <option value="{{$u->id}}">{{$u->item_name}}</option>
                        @endforeach
                      @endif
                    </select>
                  </div>
                </div>
                <div class="col-md-6 ">
                  <div class="theme-payment-page-form-item form-group">
                    <i class="fa fa-angle-down"></i>
                    <select class="form-control" name="option2">
                      @if(isset($option2))
                        @foreach($option2 as $u)
                          <option value="{{$u->id}}">{{$u->item_name}}</option>
                        @endforeach
                      @endif
                    </select>
                  </div>
                </div>

              </div>
            </div>

          </div>
          @endif



          @if (Auth::guest())


          @else


          <div class="theme-payment-page-sections-item">
            <h3 class="theme-payment-page-sections-item-title">กรอกข้อมูลในการจัดส่ง</h3>
            <div class="theme-payment-page-form _mb-20">
              <h3 class="theme-payment-page-form-title">กรอกชื่อ เบอร์ติดต่อ ที่อยู่จัดส่ง เพื่อความสะดวกในการจัดส่งสินค้าได้ถูกต้อง</h3>
              <div class="row row-col-gap" data-gutter="20">
                <div class="col-md-6 ">
                  <div class="theme-payment-page-form-item form-group">
                    <input class="form-control" type="text" placeholder="ชื่อผู้รับสินค้า" name="name_re"/>
                    <input class="form-control" type="hidden" name="product_id" value="{{$objs->id}}"/>

                  </div>
                </div>
                <div class="col-md-6 ">
                  <div class="theme-payment-page-form-item form-group">
                    <input class="form-control" type="text" placeholder="เบอร์ติดต่อ" name="phone_re"/>
                  </div>
                </div>

                <div class="col-md-12 ">
                  <div class="theme-payment-page-form-item form-group">
                    <input class="form-control" type="text" placeholder="อีเมล ส่ง order id" name="email_re"/>
                  </div>
                </div>

                <div class="col-md-12 ">
                  <div class="theme-payment-page-form-item form-group">
                    <textarea class="form-control" style="height:80px;" rows="5" name="address_re" placeholder="ที่อยู่ในการจัดส่ง"></textarea>
                  </div>
                </div>


                <div class="col-md-6 ">
                  <div class="theme-payment-page-form-item form-group">
                    <i class="fa fa-angle-down"></i>
                    <select class="form-control" name="pro_id_re">
                      <option value="">เลือกจังหวัด</option>
                      @if(isset($pro))
                        @foreach($pro as $u)
                        <option value="{{$u->PROVINCE_ID}}">{{$u->PROVINCE_NAME}}</option>
                        @endforeach
                      @endif
                    </select>
                  </div>
                </div>
                <div class="col-md-6 ">
                  <div class="theme-payment-page-form-item form-group">
                    <input class="form-control" type="text" name="zip_re" placeholder="รหัสไปรษณีย์"/>
                  </div>
                </div>
              </div>
            </div>




          </div>
          <div class="theme-payment-page-sections-item">
            <div class="theme-payment-page-booking">
              <div class="theme-payment-page-booking-header">
                <h3 class="theme-payment-page-booking-title">Total</h3>
                <p class="theme-payment-page-booking-subtitle">หมายเหตุ: กรณีสินค้าไม่ตรงกับที่โฆษณาเนื่องจากผู้ผลิตเปลี่ยนแปลงบรรจุภัณฑ์ Acmetrader ขอสงวนสิทธิ์จำหน่ายสินค้าดังกล่าวโดยไม่ต้องแจ้งให้ทราบล่วงหน้า</p>
                <p class="theme-payment-page-booking-price">฿{{$objs->p_pricec}}</p>
              </div>
              @if($objs->p_stock > 0)
              <button type="submit" class="btn _tt-uc btn-primary-inverse btn-lg btn-block" href="{{url('payment_success')}}">Book Now</button>
              @endif

            </div>
          </div>

          
          @endif











      </form>

<!-- end form -->



        </div>
      </div>
      <div class="col-md-4 ">
        <div class="sticky-col">

          <div class="theme-sidebar-section _mb-10">
            <h5 class="theme-sidebar-section-title">รหัสสินค้า {{$objs->p_code}}</h5>
            <div class="theme-sidebar-section-charges">
              <ul class="theme-sidebar-section-charges-list">
                <li class="theme-sidebar-section-charges-item">
                  <h5 class="theme-sidebar-section-charges-item-title">น้ำหนัก </h5>
                  <p class="theme-sidebar-section-charges-item-subtitle">ลิขสิทธิ์ของแท้</p>
                  <p class="theme-sidebar-section-charges-item-price">{{$objs->p_weight}}</p>
                </li>
                <li class="theme-sidebar-section-charges-item">
                  <h5 class="theme-sidebar-section-charges-item-title">Dimensions</h5>
                  <p class="theme-sidebar-section-charges-item-subtitle"></p>
                  <p class="theme-sidebar-section-charges-item-price">{{$objs->p_dimensions}}</p>
                </li>
              </ul>
              <p class="theme-sidebar-section-charges-total">ราคาพร้อมจัดส่ง
                <span>฿{{$objs->p_pricec}}</span>
              </p>
            </div>
          </div>
          <div class="theme-sidebar-section _mb-10">
                <h5 class="theme-sidebar-section-title">ช่องทางการชำระเงิน</h5>
                <img class="img-fluid" src="{{url('assets/home/img/payment.jpg')}}" />
              </div>
          <div class="theme-sidebar-section _mb-10">
            <ul class="theme-sidebar-section-features-list">
              <li>
                <h5 class="theme-sidebar-section-features-list-title">จัดส่งใน 2-5 วัน</h5>
                <p class="theme-sidebar-section-features-list-body">จัดส่งในเขตกรุงเทพฯ และปริมณฑลภายใน 1-2 วันทำการ
                  จัดส่งต่างจังหวัดภายใน 2-5 วันทำการ ตามขนาดพัสดุ สินค้านำเข้าใช้เวลาจัดส่งเพิ่มเติม 1 สัปดาห์โดยประมาณ</p>
              </li>
              <li>
                <h5 class="theme-sidebar-section-features-list-title">คืนสินค้าอย่างง่ายภายใน 15 วัน</h5>
                <p class="theme-sidebar-section-features-list-body">สามารถคืนด้วยเหตุผลเปลี่ยนใจได้ หากสินค้ายังไม่ถูกเปิดและอยู่ในสภาพสมบูรณ์</p>
              </li>
            </ul>
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
