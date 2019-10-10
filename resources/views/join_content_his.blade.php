@extends('layouts.template2')

@section('title')
อุดมการณ์และคำพูดสร้างแรงบันดาลใจ ของกลุ่ม “AcmeTrader”
@stop



@section('stylesheet')
<style>
.tx10{
  font-size: 11px;
}
.btn-ghost.btn-white {
    border-color: #666;
    color: #666;
}
.theme-account-bookmarks-item-title {

    height: 100%;

}
</style>
@stop('stylesheet')



@section('content')



<div class="theme-page-section theme-page-section-lg">
  <div class="container">
    <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
      <div class="col-md-2 ">


      </div>

      <div class="col-md-8 ">
        <div class="theme-payment-page-sections">
          <div class="theme-payment-page-sections-item">
            <div class="theme-payment-page-signin">

              <div class="theme-payment-page-signin-body">
                <h2 class="theme-page-header-title" style="color: #444; font-size: 28px;     line-height: 1.5;">กิจกรรมพิเศษ! สำหรับผู้ที่เคยร่วม Events </h2>
                <p class="theme-page-header-subtitle" style=" font-size: 14px;">AcmeTrader ได้เปิดให้ทดลองใช้งานระบบ TraderPoint (TP) ขึ้น เพื่อตอบแทน และมอบความสุขแก่สมาชิกทุกท่าน
                  โดยระบบดังกล่าวจะเปิดให้ใช้สำหรับผู้ที่เคยร่วมกิจกรรมหลักหรือกิจกรรมอื่น ๆ ของ กลุ่ม AcmeTrader
                  ต่าง ๆ ที่ผ่านมา เพื่อยืนยันการรับ TraderPoint (TP) เพียงคุณส่งรูปที่เคยเข้ามาร่วมกิจกรรมที่ผ่านมา กับกลุ่ม AcmeTrader โดยแต่ละกิจกรรมนั้นจะมีจำนวน TraderPoint (TP) ที่แตกต่างกันออกไป ตามที่ระบบได้กำหนดไว้ให้</p>
              </div>

            </div>
          </div>
          <div class="theme-payment-page-sections-item">
            <div class="theme-search-results-item theme-payment-page-item-thumb">
              <div class="row magnific-gallery row-col-gap" data-gutter="10">

                <div class="col-md-6 ">
                  <img src="{{url('assets/home/img/th_2016_01.png')}}" class="img-responsive" />
                </div>
                <div class="col-md-6 ">
                  <div style="padding: 20px 0px 10px 20px;">
                    <h2 class="theme-page-header-title" style="color: #444; font-size: 28px;">เลือกรูปที่เคยเข้าร่วม Event ที่ผ่านมา..!! </h2>
                    <br />
                    <p class="theme-page-header-subtitle" style=" font-size: 15px;"> ทำการ Login เข้าสู่ระบบ เพื่อเริ่มต้นใช้งาน
                    </p>
                    <br />
                    <p class="theme-page-header-subtitle" style=" font-size: 15px;"> เลือกรูปภาพ 1 รูป เพื่อทำการอัปโหลด โดยสามารถอัปโหลดได้ 1 รูป ต่อ 1 กิจกรรมเท่านั้น
                    </p>
                    <br />
                    <p class="theme-page-header-subtitle" style=" font-size: 15px;">  รอการตรวจสอบจากทีมงาน ภายใน 1-2 วัน
                    </p>
                    <br />
                    <p class="theme-page-header-subtitle" style=" font-size: 15px;">  หลังจากผ่านการตรวจสอบระบบจะเพิ่ม TraderPoint (TP) ให้กับบัญชีของท่าน
                    </p>
                    <br />
                    <p class="theme-page-header-subtitle" style=" font-size: 15px;">ท่านสามารถตรวจสอบ TraderPoint (TP) ได้ที่เมนู ‘Point คะแนนสะสม’
                    </p>
                    <br />

                  </div>

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


<div class="theme-page-section theme-page-section-gray theme-page-section-lg">
  <div class="container">
    <div class="row">
      <div class="col-md-2 ">


      </div>

      <div class="col-md-8 ">




      <h2 class="theme-page-header-title" style="color: #444; font-size: 22px;">เลือก upload รูปภาพ 1 รูปสำหรับงาน Events </h2>
      <br />
      <div class="theme-account-bookmarks-item">
        <div class="row">
          <div class="col-md-8 ">
            <div class="theme-account-bookmarks-item-thumb">
              <a class="theme-account-bookmarks-item-thumb-link" href="#"></a>
              <div class="row row-eq-height" data-gutter="none">
                <div class="col-md-6 ">
                  <img src="{{url('assets/home/img/unlock_img02.png')}}" style="min-height:90px;" class="img-responsive" />
                </div>
                <div class="col-md-6 ">
                  <div class="theme-account-bookmarks-item-thumb-body">
                    <div class="row">
                      <div class="col-xs-12 ">
                        <p class="theme-account-bookmarks-item-location">Acme Unlock People <a href="#" style="color:#d4147d; padding-left:7px;"><b><i class="fa fa-plus"></i> 1,000</b></a></p>
                        <h5 class="theme-account-bookmarks-item-title">กิจกรรม Acme unlock people เป็นกิจกรรมที่รวมผู้ที่เสียหายจากการลงทุน ทั้งจาก แชร์ลูกโซ่ ,ฝากเทรด Forex , หุ้น และ Bitcoin จากผู้เสียหาย 5 คน รวมมูลค่าความเสียหายกว่า 79,100 usd หรือ 2,800,000 บาท</h5>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="theme-account-bookmarks-item-info">

              <ul class="theme-account-bookmarks-item-actions">
                <li>

                  @if (Auth::guest())

                  <a href="#" class="photo_f btn _tt-uc btn-white btn-ghost"  >
                    <i class="fa fa-cloud-upload"></i> อัพโหลดรูป
                  </a>

                  @else
                  <a href="#" class="photo_f btn _tt-uc btn-white btn-ghost"  id="photo_f">
                    <i class="fa fa-cloud-upload"></i> อัพโหลดรูป
                  </a>
                  @endif



                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>



      <div class="theme-account-bookmarks-item">
        <div class="row">
          <div class="col-md-8 ">
            <div class="theme-account-bookmarks-item-thumb">
              <a class="theme-account-bookmarks-item-thumb-link" href="#"></a>
              <div class="row row-eq-height" data-gutter="none">
                <div class="col-md-6 ">
                  <img src="{{url('assets/home/img/test_events10.png')}}" style="min-height:90px;" class="img-responsive" />
                </div>
                <div class="col-md-6 ">
                  <div class="theme-account-bookmarks-item-thumb-body">
                    <div class="row">
                      <div class="col-xs-12 ">
                        <p class="theme-account-bookmarks-item-location">Acme Green Day <a href="#" style="color:#d4147d; padding-left:7px;"><b><i class="fa fa-plus"></i> 1,000</b></a></p>
                        <h5 class="theme-account-bookmarks-item-title">Acme Green Day กิจกรรมบริจาคแรงกายในการปลูกต้นไม้ จัดขึ้นเมื่อวันที่ 12 ธันวาคม 2016 เพื่อร่วมกันปลูกต้นกรีนเพาโลเนีย ณ ศูนย์วิจัยและขยายพันธุ์กรีนเพาโลเนีย จังหวัดนครราชสีมา โดยมีผู้เข้าร่วมงานกว่า 300 คน</h5>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="theme-account-bookmarks-item-info">

              <ul class="theme-account-bookmarks-item-actions">
                <li>
                  <a href="#" class="photo_f btn _tt-uc btn-white btn-ghost"  id="photo_f">
                    <i class="fa fa-cloud-upload"></i> อัพโหลดรูป
                  </a>
                </li>

              </ul>

            </div>
          </div>
        </div>
      </div>





      <div class="theme-account-bookmarks-item">
        <div class="row">
          <div class="col-md-8 ">
            <div class="theme-account-bookmarks-item-thumb">
              <a class="theme-account-bookmarks-item-thumb-link" href="#"></a>
              <div class="row row-eq-height" data-gutter="none">
                <div class="col-md-6 ">
                  <img src="{{url('assets/home/img/test_events7.png')}}" style="min-height:90px;" class="img-responsive" />
                </div>
                <div class="col-md-6 ">
                  <div class="theme-account-bookmarks-item-thumb-body">
                    <div class="row">
                      <div class="col-xs-12 ">
                        <p class="theme-account-bookmarks-item-location">Keep Patong Clean <a href="#" style="color:#d4147d; padding-left:7px;"><b><i class="fa fa-plus"></i> 500</b></a></p>
                        <h5 class="theme-account-bookmarks-item-title">Keep Patong Clean จัดขึ้นในวันที่ 1 ม.ค. 2560 เนื่องจากวันก่อนหน้าเป็นวันปีใหม่ ทำให้มีคนไทยและนักท่องเที่ยวจำนวนมากใช้พื้นที่บริเวณหน้าหาดป่าตอง จ.ภูเก็ต มีขยะจำนวนมากบริเวณชายหาดป่าตอง</h5>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="theme-account-bookmarks-item-info">

              <ul class="theme-account-bookmarks-item-actions">
                <li>
                  <a href="#" class="photo_f btn _tt-uc btn-white btn-ghost"  id="photo_f">
                    <i class="fa fa-cloud-upload"></i> อัพโหลดรูป
                  </a>
                </li>

              </ul>

            </div>
          </div>
        </div>
      </div>



      <div class="theme-account-bookmarks-item">
        <div class="row">
          <div class="col-md-8 ">
            <div class="theme-account-bookmarks-item-thumb">
              <a class="theme-account-bookmarks-item-thumb-link" href="#"></a>
              <div class="row row-eq-height" data-gutter="none">
                <div class="col-md-6 ">
                  <img src="{{url('assets/home/img/event_vam.png')}}" style="min-height:90px;" class="img-responsive" />
                </div>
                <div class="col-md-6 ">
                  <div class="theme-account-bookmarks-item-thumb-body">
                    <div class="row">
                      <div class="col-xs-12 ">
                        <p class="theme-account-bookmarks-item-location">Acme Vampire Day <a href="#" style="color:#d4147d; padding-left:7px;"><b><i class="fa fa-plus"></i> 500</b></a></p>
                        <h5 class="theme-account-bookmarks-item-title">Acme Vampire Day กิจกรรมรณรงค์เพื่อการบริจาคโลหิต ให้กับศูนย์บริการโลหิตแห่งชาติ สภากาชาติไทย จัดขึ้นเมื่อวันที่ 18 มีนาคม 2017 มีผู้เข้าร่วมงานกว่า 2000 คน</h5>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="theme-account-bookmarks-item-info">

              <ul class="theme-account-bookmarks-item-actions">
                <li>
                  <a href="#" class="photo_f btn _tt-uc btn-white btn-ghost"  id="photo_f">
                    <i class="fa fa-cloud-upload"></i> อัพโหลดรูป
                  </a>
                </li>

              </ul>

            </div>
          </div>
        </div>
      </div>


      <div class="theme-account-bookmarks-item">
        <div class="row">
          <div class="col-md-8 ">
            <div class="theme-account-bookmarks-item-thumb">
              <a class="theme-account-bookmarks-item-thumb-link" href="#"></a>
              <div class="row row-eq-height" data-gutter="none">
                <div class="col-md-6 ">
                  <img src="{{url('assets/home/img/Untitled-8.png')}}" style="min-height:90px;" class="img-responsive" />
                </div>
                <div class="col-md-6 ">
                  <div class="theme-account-bookmarks-item-thumb-body">
                    <div class="row">
                      <div class="col-xs-12 ">
                        <p class="theme-account-bookmarks-item-location">Acme Farmer Day <a href="#" style="color:#d4147d; padding-left:7px;"><b><i class="fa fa-plus"></i> 500</b></a></p>
                        <h5 class="theme-account-bookmarks-item-title">ACME Farmer Day กิจกรรมเรียนรู้วิถึไทย ใช้ชีวิตแบบเกษตรกร จัดขึ้นเมื่อวันที่ 27 มกราคม 2018 ณ สวนปาล์มฟาร์มนก จ.ฉะเชิงเทรา โซนวิถีไทย เดินทางด้วย รถบัส เดินทางจากกรุงเทพมหานคร มีผู้เข้าร่วมงานประมาน 100 คน</h5>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="theme-account-bookmarks-item-info">

              <ul class="theme-account-bookmarks-item-actions">
                <li>
                  <a href="#" class="photo_f btn _tt-uc btn-white btn-ghost"  id="photo_f">
                    <i class="fa fa-cloud-upload"></i> อัพโหลดรูป
                  </a>
                </li>

              </ul>

            </div>
          </div>
        </div>
      </div>



      <div class="theme-account-bookmarks-item">
        <div class="row">
          <div class="col-md-8 ">
            <div class="theme-account-bookmarks-item-thumb">
              <a class="theme-account-bookmarks-item-thumb-link" href="#"></a>
              <div class="row row-eq-height" data-gutter="none">
                <div class="col-md-6 ">
                  <img src="{{url('assets/home/img/Untitled-2.png')}}" style="min-height:90px;" class="img-responsive" />
                </div>
                <div class="col-md-6 ">
                  <div class="theme-account-bookmarks-item-thumb-body">
                    <div class="row">
                      <div class="col-xs-12 ">
                        <p class="theme-account-bookmarks-item-location">Acme Cattle Free Day <a href="#" style="color:#d4147d; padding-left:7px;"><b><i class="fa fa-plus"></i> 300</b></a></p>
                        <h5 class="theme-account-bookmarks-item-title">ACME CATTLE FREE DAY กิจกรรมรณรงค์ไถ่ชีวิตโค – กระบือ เพื่อมอบให้แก่ธนาคารโค-กระบือฯ รักษาไว้ให้เกษตรกรยืมใช้ทำเกษตรกรรมต่อไป โดยเปิดให้ร่วมบริจาคตั้งแต่วันที่ 3 ธันวาคม 2017 จนถึงวันที่ 29 มกราคม 2018 </h5>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="theme-account-bookmarks-item-info">

              <ul class="theme-account-bookmarks-item-actions">
                <li>
                  <a href="#" class="photo_f btn _tt-uc btn-white btn-ghost"  id="photo_f">
                    <i class="fa fa-cloud-upload"></i> อัพโหลดรูป
                  </a>
                </li>

              </ul>

            </div>
          </div>
        </div>
      </div>


      <div class="theme-account-bookmarks-item">
        <div class="row">
          <div class="col-md-8 ">
            <div class="theme-account-bookmarks-item-thumb">
              <a class="theme-account-bookmarks-item-thumb-link" href="#"></a>
              <div class="row row-eq-height" data-gutter="none">
                <div class="col-md-6 ">
                  <img src="{{url('assets/home/img/Untitled-3.png')}}" style="min-height:90px;" class="img-responsive" />
                </div>
                <div class="col-md-6 ">
                  <div class="theme-account-bookmarks-item-thumb-body">
                    <div class="row">
                      <div class="col-xs-12 ">
                        <p class="theme-account-bookmarks-item-location">Acme Blind Never Blind Day <a href="#" style="color:#d4147d; padding-left:7px;"><b><i class="fa fa-plus"></i> 300</b></a></p>
                        <h5 class="theme-account-bookmarks-item-title">กิจกรรมรณรงค์เพื่อช่วยเหลือผู้ทุพพลภาพทางสายตาและการมองเห็น “Acme Blind Never Blind Day” จัดขึ้นเมื่อวันที่ 01 กันยายน 2018 ณ มูลนิธิช่วยคนตาบอดแห่งประเทศไทยฯ อนุสาวรีย์ชัยสมรภูมิ</h5>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="theme-account-bookmarks-item-info">

              <ul class="theme-account-bookmarks-item-actions">
                <li>
                  <a href="#" class="photo_f btn _tt-uc btn-white btn-ghost"  id="photo_f">
                    <i class="fa fa-cloud-upload"></i> อัพโหลดรูป
                  </a>
                </li>

              </ul>

            </div>
          </div>
        </div>
      </div>




      <div class="theme-account-bookmarks-item">
        <div class="row">
          <div class="col-md-8 ">
            <div class="theme-account-bookmarks-item-thumb">
              <a class="theme-account-bookmarks-item-thumb-link" href="#"></a>
              <div class="row row-eq-height" data-gutter="none">
                <div class="col-md-6 ">
                  <img src="{{url('assets/home/img/Untitled-4.png')}}" style="min-height:90px;" class="img-responsive" />
                </div>
                <div class="col-md-6 ">
                  <div class="theme-account-bookmarks-item-thumb-body">
                    <div class="row">
                      <div class="col-xs-12 ">
                        <p class="theme-account-bookmarks-item-location">Acme Crypto Currency <a href="#" style="color:#d4147d; padding-left:7px;"><b><i class="fa fa-plus"></i> 300</b></a></p>
                        <h5 class="theme-account-bookmarks-item-title">เสวนาเชิงปฏิบัติอบรมสุดยอดนักลงทุนตอน “เรียนลัดจัดหนักสกุลเงินดิจิทัล” Acme Crypto Currency Workshop” จัดขึ้นในวันที่ 26 สิงหาคม 2018 ณ ห้องถอดรหัสสกุลเงินดิจิทัล โดยเป็นกิจกรรมให้ความรู้พื้นฐานเรื่อง Crypto Currency</h5>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="theme-account-bookmarks-item-info">

              <ul class="theme-account-bookmarks-item-actions">
                <li>
                  <a href="#" class="photo_f btn _tt-uc btn-white btn-ghost"  id="photo_f">
                    <i class="fa fa-cloud-upload"></i> อัพโหลดรูป
                  </a>
                </li>

              </ul>

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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$('.photo_f').on('click', function () {
swal("กรุณาทำการ สมัครสมาชิก ก่อนเข้าร่วมกิจกรรม เพื่อผลประโยชน์เกี่ยวกับการรับ Point และของกิจกรรมในงาน")
.then((value) => {

});
});


</script>

@stop('scripts')
