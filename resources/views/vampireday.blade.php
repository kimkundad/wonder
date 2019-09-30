<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>กิจกรรม Acme Vampire Day#2</title>


  <meta property="og:url"           content="" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="ร่วมทำความดี บริจาคโลหิตกับกิจกรรม Acme Vampire Day" />
  <meta property="og:description"   content=" AcmeTrader ร่วมกับ ศูนย์บริการโลหิตแห่งชาติ สภากาชาดไทย ขอเชิญผู้ร่วมอุดมการณ์ ร่วมบริจาคโลหิต เพื่อสานต่อชีวิตเพื่อนมนุษย์ สังคมเรา โลกของเรา เราต้องช่วยกัน จงช่วยเหลือคนที่สามารถช่วยเหลือผู้อื่นต่อได้" />
  <meta property="og:image"         content="{{url('assets/vampire/assets/image/banner-fb-share.png')}}" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{url('assets/vampire/assets/css/bootstrap.min.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{url('assets/vampire/assets/font-awesome/css/font-awesome.min.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{url('assets/vampire/assets/css/site.css')}}" media="screen" />

    <style>
    .btn-warning {
      color: #000;
      background-color: #ec971f;
      border-color: #d58512;
    }
    .btn-warning:hover {
      color: #000;

      background-color: #f0ad4e;
      border-color: #eea236;
    }

    @media screen and (max-width: 1920px){
      .regisevent{
        color: #000;
        font-size: 18px;
        font-weight: 700;
        margin-top: -475px;
        padding: 10px 35px;
        box-shadow: 0 1px 15px rgba(60,8,8,.8);
      }
    }

    @media screen and (max-width: 1600px){
      .regisevent{
        color:#000;
        font-size: 15px;
        font-weight: 700;
        margin-top:-345px;
        padding: 8px 24px;
        box-shadow: 0 1px 15px rgba(60,8,8,.8);
      }
    }

      @media screen and (max-width: 1200px){
        .regisevent{
          color:#000;
          font-size: 15px;
          font-weight: 700;
          margin-top:-305px;
          padding: 8px 24px;
          box-shadow: 0 1px 15px rgba(60,8,8,.8);
        }
      }


        @media screen and (max-width: 1070px){
          .regisevent{
            color:#000;
            font-size: 15px;
            font-weight: 700;
            margin-top:-275px;
            padding: 8px 24px;
            box-shadow: 0 1px 15px rgba(60,8,8,.8);
          }



}


    </style>


</head>
<body>
    <div id="app">



        <div class="container-fluid">
     <img class="img-responsive" alt="Acme Vampire Day" src="{{url('assets/vampire/assets/image/vampire_final.jpg')}}" />

 </div><!--end banner-->


    <div class="row hidden-sm hidden-xs" style="line-height: 0; background-color: #a90101; width:100%">
      <div class="col-md-12 text-center" style="line-height: 0;">


        @if (Auth::guest())
        <a class="btn btn-warning regisevent" role="button" id="photo_f">ลงทะเบียนร่วมกิจกรรม</a>

        @else
        <a class="btn btn-warning regisevent" href="{{url('vampireday/form')}}" role="button" >ลงทะเบียนร่วมกิจกรรม</a>
        @endif



      </div>
    </div>


 <div style="background-image: url('{{url('assets/vampire/assets/image/vamp-bg-jpg.jpg')}}'); background-repeat: no-repeat; background-size: cover;">
     <div class="container" style="background-color:#fff">
         <div class="row row-hr">
             <div class="col-lg-12 text-center">
               <div class="row" style="
                                  padding-top: 50px;
                              ">
                              <div class="col-md-1">
                                </div>
                              	<div class="col-md-2">
                              <img src="{{url('assets/vampire/assets/image/bloodlogo.png')}}" style="
                                  width: 100px;
                                  height: 200px;
                              ">
                                  </div>
                                  <div class="col-md-4" style="padding-top: 30px;">
                                    <h3 style="
                                  font-weight: bold;
                              ">ยอดรวมเลือดที่ประสงค์จะบริจาคของ <br />กลุ่ม AcmeTrader</h3>
                                    <p style="
                   font-weight: bold;
               ">อัพเดท: ( {{      date('Y/m/d')    }}   )</p>
                              	  <h1 style="
                                  color: #d6413c;
                                  font-weight: bold;
                              ">{{ $totalCC }} CC</h1>
                                  </div>

                                  <div class="col-md-4" style="padding-top: 30px;">
                                    <h3 style=" font-size: 22px;
                                  font-weight: bold;
                              ">จำนวนผู้เข้าร่วมกิจกรรม<br> (รวมผู้เข้าร่วมบริจาค และอาสาสมัคร)</h3>
                                    <p style="
                   font-weight: bold;
               ">อัพเดท: ( {{      date('Y/m/d')    }}   )</p>
                              	  <h1 style="
                                  color: #d6413c;
                                  font-weight: bold;
                              ">{{ $totalUser }} คน</h1>
                                  </div><div class="col-md-1">
                                </div></div>
               <div class="row visible-sm visible-xs" style="padding-top:50px">

                 @if (Auth::guest())
                 <a class="btn btn-warning" id="photo_i" role="button" style="box-shadow: 0 1px 15px rgba(60,8,8,.8);">ลงทะเบียนร่วมกิจกรรม</a>

                 @else
                 <a class="btn btn-warning" href="{{url('vampireday/form')}}" role="button" style="box-shadow: 0 1px 15px rgba(60,8,8,.8);">ลงทะเบียนร่วมกิจกรรม</a>
                 @endif


               </div>


                 <h1 class="page-header">คลิป กิจกรรม Acme VampireDay #1 เมื่อวันที่ 18 มีนาคม 2560</h1>



                 <h4 class="page-header-sub">กิจกรรมรณรงค์เพื่อการบริจาคโลหิต ให้กับศูนย์บริการโลหิตแห่งชาติ สภากาชาดไทย </h4>
             </div>

         </div> <!-- End Summary-->
         <div class="row row-hr" style="padding-top:10px; padding-bottom: 10px; ">
           <div class="col-md-1"></div>
             <div class="col-md-10">
                 <div class="embed-responsive embed-responsive-16by9">
                     <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/VJxwzN1aObw" frameborder="0" allowfullscreen></iframe>
                 </div>
             </div>
             <div class="col-md-1"></div>
         </div><!-- End video-->


         <div class="row" style="padding-top:20px; padding-bottom:20px;">
             <div class="col-md-8 ">
               <div class="well">
                 <h3 class="text-danger" style="margin-top: 15px;">ร่วมทำความดี บริจาคโลหิตกับ กิจกรรม Acme Vampire Day #2 </h3>
                 <p style="font-size: 14px; line-height: 1.8em;">สืบเนื่องจากงานกิจกรรม Acme Vampire Day กิจกรรมรณรงค์เพื่อการบริจาคโลหิต ให้กับศูนย์บริการโลหิตแห่งชาติ
                   สภากาชาดไทย ที่จัดขึ้นเมื่อวันที่ 18 มีนาคม 2017 ที่ผ่านมา มีผู้สนใจ และเข้าร่วมงานกว่า 2,000 คน กลุ่ม AcmeTrader เห็นถึงความสำคัญของการให้เลือดให้ชีวิต
                   เพื่อให้เหล่าสมาชิกสามารถไปช่วยเหลือคนอื่นต่อได้ จึงได้จัดกิจกรรมนี้ขึ้น

                   และในครั้งนี้ กลุ่ม AcmeTrader ได้กลับมาจัดงานนี้อีกครั้ง ในชื่อว่า AcmeVampireDay #2 โดยทำการเทรดสดเป็นเวลา 5 วัน 5 คืน นำโดยคุณ
                    แอ็คมี่ วรวัฒน์ นาคแนวดี ผู้ก่อตั้งกลุ่ม AcmeTrader ร่วมกับ เหล่าเทรดเดอร์ ของกลุ่ม AcmeTrader ตั้งแต่วันที่ 30 กันยายน – 4 ตุลาคม 2562
                    เพื่อรณรงค์ เรื่องการบริจาคโลหิตให้กับศูนย์บริการโลหิตแห่งชาติ สภากาชาดไทย  <br />
                    โดยหลังจากงานรณรงค์เสร็จสิ้น สมาชิกกลุ่ม AcmeTrader จะรวมตัวเพื่อ ร่วมกันบริจาคโลหิต ณ ศูนย์บริการโลหิตแห่งชาติ สภากาชาดไทยพร้อมเพรียงกัน
                    ในวันที่ 2 พฤศจิกายน 2562 ซึ่งผู้ที่เข้าร่วมกิจกรรมในครั้งนี้จะได้รับ เสื้อ  AcmeVampireDay #2 ฟรี ไม่ว่าจะเป็นผู้ที่มาบริจาคโลหิต หรืออาสาสมัคร ถือว่าเป็นของที่ระลึก
                    และเป็นกำลังใจให้แด่ “ คนที่สามารถช่วยเหลือผู้อื่นต่อได้ ” และเลือดทุกหยดที่ทุก ๆ คน ได้ร่วมบริจาคนั้น ถือเป็นการส่งต่อความช่วยเหลือผู้อื่นสืบต่อไป
                    <br />
                    จึงขอเชิญชวน “ ผู้ร่วมเดินทาง และผู้ร่วมอุดมการณ์ ” ทุกท่าน มาร่วมกันทำความดี บริจาคเลือดครั้งนี้ ณ ศูนย์บริการโลหิตแห่งชาติ สภากาชาดไทย เพื่อเป็นการส่งต่อ และนำเลือดไปใช้ในการดูแลผู้ป่วยในโรงพยาบาล
                    <br />
                    ** กิจกรรมในครั้งนี้ฟรี !! ไม่มีค่าใช้จ่ายใด ๆ เตรียมร่างกายให้พร้อม และแข็งแรง เพื่อมาร่วมช่วยสังคมกับพวกเรา **

                  </p>
<br>
               </div>
             </div>

             <div class="col-md-4 ">

               <div class="well danger">
                 <h3 class="tata"><i class="fa fa-tint"></i> ตารางกิจกรรม</h3>
                 <p class="tata" style="font-size: 15px;">วันเสาร์ที่ 2 พฤศจิกายน 2562<br>ณ ศูนย์บริการโลหิตแห่งชาติ สภากาชาดไทย</p>
                 <br>
                  <table class="table" style="margin-bottom: 0px;">
                    <tr>
                        <td>08:00 น. </td>
                        <td>ลงทะเบียน</td>
                    </tr>
                    <tr>
                        <td>08:30 น.</td>
                        <td> เริ่มเปิดรับบริจาคโลหิต</td>
                    </tr>
                    <tr>
                        <td>12:00 น.</td>
                        <td> ร่วมรับประทานอาหารกลางวัน</td>
                    </tr>
                    <tr>
                        <td>15:30 น.</td>
                        <td> ปิดรับบริจาคโลหิต</td>
                    </tr>
                    <tr>
                        <td>16:00 น.</td>
                        <td> พบกลุ่ม  AcmeTrader</td>
                    </tr>
                    <tr>
                        <td>17:00 น.</td>
                        <td> ปิดงาน ถ่ายรูปร่วมกัน</td>
                    </tr>
                  </table>
               </div>

               <div class="well gay" style="padding: 5px;">
                 <a href="https://www.facebook.com/acmetrader/photos/a.105631154160749/125339455523252/?type=3&theater" target="_blank">
                 <img src="{{url('assets/vampire/assets/image/share-btn.png')}}" class="img-responsive" style="height:50px;margin: 0 auto;">
               </a>
               </div>


             </div>
         </div><!-- end booking btn-->



         <div class="row" style=" padding-bottom:20px;">
             <div class="col-md-6 ">
               <h3 class="text-danger" >เตรียมพร้อมอย่างไรก่อนบริจาคโลหิต</h3>
               <ul>
                 <li> เป็นผู้มีสุขภาพแข็งแรง ไม่มีโรคประจำตัว</li>
                 <li> อายุ 18 – 60 ปี</li>
                 <li> น้ำหนักตั้งแต่ 45 กิโลกรัมขึ้นไป</li>
                 <li> ไม่อยู่ในระหว่างรับประทานยาปฏิชีวนะ ยาป้องกันเลือดแข็งตัว ฮอร์โมนเพศ</li>
                 <li> ไม่มีประวัติเป็นโรคมาลาเรียในระยะเวลา 3 ปี</li>
                 <li> ไม่ได้รับการถอนฟันหรือขูดหินปูน ภายใน 72 ชั่วโมงก่อนบริจาคเลือด</li>
                 <li> ไม่มีบาดแผลสดหรือแผลติดเชื้อใดๆ ตามร่างกาย</li>
                 <li> ผู้หญิงที่ไม่อยู่ในระยะตั้งครรภ์หรือให้นมบุตร</li>
               </ul>
             </div>
             <div class="col-md-6 ">
               <h3 class="text-danger" >ใครบ้างที่ไม่สามารถบริจาคโลหิตได้ </h3>
               <ul>
                 <li>ผู้ที่เป็นโรคหัวใจ โรคปอด มะเร็ง ลมชัก โรคเลือดออกง่ายแต่หยุดยาก</li>
                 <li>ผู้ที่เป็นหรือเคยเป็นไวรัสตับอักเสบบี หรือคู่ครองเป็นไวรัสตับอักเสบบี/ซี</li>
                 <li> ผู้ติดเชื้อเอสไอวีหรือซิฟิลิส</li>
                 <li> ผู้เสพยาเสพติดชนิดใช้เข็มฉีดยา</li>
                 <li> ผู้ที่มีพฤติกรรมเสี่ยงทางเพศ เปลี่ยนคู่นอนบ่อยๆ ผู้ชายมีเพศสัมพันธ์กับชาย</li>
                 <li> น้ำหนักตัวลดลงโดยไม่ทราบสาเหตุ ต่อมน้ำเหลืองโต หรือมีไข้โดยไม่ทราบสาเหตุ</li>
               </ul>

               <div class="well warning">
                 *** หากไม่สามารถร่วมบริจาคโลหิตได้ สามารถลงทะเบียนเป็นอาสาสมัคร
                  บริจาค “แรงกาย” โดยผู้ลงทะเบียนร่วมกิจกรรมจะได้รับเสื้อยืดฟรี (จำนวนจำกัด)
               </div>

             </div>
         </div><!-- end booking btn-->



<hr>
<br>
         <div class="row col-md-offset-1" style=" padding-bottom:20px;">

             <div class="col-lg-2 col-md-6 text-center" style="padding-right: 23px; padding-left: 23px;">
               <img src="{{url('assets/vampire/assets/image/img-prepare/01.png')}}" class="img-circle img-responsive" style="margin:0 auto">
               <p class="text-muted">ดื่มน้ำมากๆ เพื่อให้ร่างกายสดชื่น เลือดไหลเวียนดี</p>
             </div>

             <div class="col-lg-2 col-md-6 text-center" style="padding-right: 23px; padding-left: 23px;">
               <img src="{{url('assets/vampire/assets/image/img-prepare/02.png')}}" class="img-circle img-responsive" style="margin:0 auto">
               <p class="text-muted">งดดื่มสุราหรือเครื่องดื่มที่มีแอลกอฮอล์</p>
             </div>

             <div class="col-lg-2 col-md-6 text-center" style="padding-right: 23px; padding-left: 23px;">
               <img src="{{url('assets/vampire/assets/image/img-prepare/03.png')}}" class="img-circle img-responsive" style="margin:0 auto">
               <p class="text-muted">นอนหลับพักผ่อนเพียงพอประมาณ 6 ชั่วโมง</p>
             </div>

             <div class="col-lg-2 col-md-6 text-center" style="padding-right: 23px; padding-left: 23px;">
               <img src="{{url('assets/vampire/assets/image/img-prepare/04.png')}}" class="img-circle img-responsive" style="margin:0 auto">
               <p class="text-muted">ไม่ควรเล่นกีฬา
ที่ต้องเสียเหงื่อมาก ก่อนบริจาคโลหิต <br>1 วัน</p>
             </div>

             <div class="col-lg-2 col-md-6 text-center" style="padding-right: 23px; padding-left: 23px;">
               <img src="{{url('assets/vampire/assets/image/img-prepare/05.png')}}" class="img-circle img-responsive" style="margin:0 auto">
               <p class="text-muted">รับประทานอาหารก่อน บริจาคโลหิตประมาณ 4 ชั่วโมง</p>
             </div>
             <br>



         </div><!-- end booking btn-->



<div class="row">
         <div class="col-md-10 col-md-offset-1" style="padding-bottom:40px;">
           <h3 class="text-danger" >หลังการบริจาคโลหิตเสร็จแล้ว </h3>
           <p>หลังการบริจาคโลหิตเสร็จแล้ว
         นั่งพักประมาณ 10-15 นาที รับประทานขนมหรืออาหารว่าง ดื่มน้ำ 1-2 แก้ว แล้วรับประทานอาหารตามปกติ ไม่ควรงดอาหาร โดยเฉพาะเนื้อสัตว์ ตับ ไข่ เลือดหมู เลือดไก่ ผักใบเขียว และผักที่มีสีเหลือง
         <br><b>** งดสูบบุหรี่ และดื่มเครื่องดื่มที่มีแอลกอฮอล์หลังบริจาคโลหิตอย่างน้อยครึ่งชั่วโมง</b></p>
         </div>
 </div>

     </div>
 </div>
 <div class="container" style="background-color:#000">
     <div class="row" style="margin-top:10px;">
         <div class="col-lg-12">
            <!-- <img class="img-responsive" alt="Acme Vampire Day" src="{{url('assets/vampire/assets/image/footer-web-n3.png')}}" /> -->
         </div>
     </div>
 </div>
    </div>
    <script src="{{url('assets/home/js/jquery.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    $('#photo_f').on('click', function () {
    swal("กรุณาทำการ สมัครสมาชิก ก่อนเข้าร่วมกิจกรรม เพื่อผลประโยชน์เกี่ยวกับการรับ Point และของกิจกรรมในงาน")
    .then((value) => {
      window.location.href = "{{url('get_sessoin_vam')}}";
    });
    });


    $('#photo_i').on('click', function () {
    swal("กรุณาทำการ สมัครสมาชิก ก่อนเข้าร่วมกิจกรรม เพื่อผลประโยชน์เกี่ยวกับการรับ Point และของกิจกรรมในงาน")
    .then((value) => {
      window.location.href = "{{url('get_sessoin_vam')}}";
    });
    });


    </script>
    <div id="fb-root"></div>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>
