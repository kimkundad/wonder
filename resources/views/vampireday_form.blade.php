<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>กิจกรรม Acme Vampire Day</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{url('assets/vampire/assets/css/bootstrap.min.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{url('assets/vampire/assets/font-awesome/css/font-awesome.min.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{url('assets/vampire/assets/css/site.css')}}" media="screen" />
    <link rel="stylesheet" href="{{asset('./assets/vendor/pnotify/pnotify.custom.css')}}">

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
    .text-danger{
      font-weight: 700;
      font-size: 16px;
    }
    .box_style_1 {

    background-color: #0175c6;
    padding: 10px 20px 10px 18px;
    color: #fff;
    border: 1px solid #fff;
    -webkit-border-top-left-radius: 3px;
    text-align: center;
    -webkit-border-top-right-radius: 3px;
    -moz-border-radius-topleft: 3px;
    -moz-border-radius-topright: 3px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}

@media screen and (min-width: 1070px){
  .box_style_1{
    height: 150px;
  }
}

.checkbox-custom {
    position: relative;
    padding: 0 0 0 25px;
    margin-bottom: 7px;
    margin-top: 0;
}
.checkbox-custom input[type="checkbox"] {
    opacity: 0;
    position: absolute;
    top: 50%;
    left: 3px;
    margin: -6px 0 0 0;
    z-index: 2;
    cursor: pointer;
}
.checkbox-custom label {
  font-weight: 500;
    cursor: pointer;
    margin-bottom: 0;
    text-align: left;
    line-height: 1.2;
}
.checkbox-custom label:before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    margin-top: -9px;
    width: 19px;
    height: 18px;
    display: inline-block;
    border-radius: 2px;
    border: 1px solid #bbb;
    background: #fff;
}
.checkbox-custom input[type="checkbox"]:checked + label:after {
    position: absolute;
    display: inline-block;
    font-family: 'FontAwesome';
    content: '\F00C';
    top: 50%;
    left: 4px;
    margin-top: -5px;
    font-size: 11px;
    line-height: 1;
    width: 16px;
    height: 16px;
    color: #333;
}
.alert-danger{
    background: #e41f1c;
    color: rgba(255, 255, 255, 0.7);
}
.alert-success{
  background: #47a447;
  color: rgba(255, 255, 255, 0.7);
}
.ui-pnotify .ui-pnotify-title {
    font-size: 14px;
    letter-spacing: 0;
}
.ui-pnotify-title {
    display: block;
    margin-bottom: .4em;
    margin-top: 0;
    height: 18px;
}
.text-danger {
    font-size: 13px;
}
    </style>


</head>
<body>
    <div id="app">


      <div class="navbar navbar-inverse navbar-fixed-top" style="height: 80px;">
              <div class="container">
                  <div class="navbar-header">

                      <a asp-area="" asp-controller="Home" asp-action="Index" class="navbar-brand" href="{{url('/')}}">
                          <img src="{{url('assets/home/img/Group-207.png')}}" style="height:55px;">
                      </a>
                  </div>

              </div>
            </div>






 <div style="background-image: url('{{url('assets/vampire/assets/image/vamp-bg-jpg.jpg')}}'); background-repeat: no-repeat; background-size: cover;">
     <div class="container" style="background-color:#fff; margin-top: 50px;" >















<div class="row">
         <div class="col-md-10 col-xs-12 col-md-offset-1 " style="padding-bottom:40px; padding-top:40px; min-height:500px;">



          <!-- <h3 class="text-center">ทำการปิดลงทะเบียน </h3>
           <hr>
           <p class="text-center">ท่านที่ต้องการลงทะเบียน สามารถมาลงทะเบียนที่หน้างานกิจกรรมได้</p>
           <p class="text-center">ณ ศูนย์บริการโลหิตแห่งชาติ สภากาชาดไทย</p>

           <p class="text-center"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9218.171660403286!2d100.52888385144365!3d13.732748106484614!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4e9beb6ae9e12782!2z4Lio4Li54LiZ4Lii4LmM4Lia4Lij4Li04LiB4Liy4Lij4LmC4Lil4Lir4Li04LiV4LmB4Lir4LmI4LiH4LiK4Liy4LiV4Li0IOC4quC4oOC4suC4geC4suC4iuC4suC4lOC5hOC4l-C4og!5e0!3m2!1sth!2sth!4v1489749491386"
           height="450" frameborder="0" style="border:0; width:100%" allowfullscreen></iframe></p>
           <br>

 -->



<form class="form-horizontal" action="{{url('vampireday/config_form')}}" id="formID"  method="post" enctype="multipart/form-data">
{{ csrf_field() }}

           <h3 class="text-danger" style="margin-left:10px;"><i class="fa fa-tint" style="font-size:24px;"></i> กรอกข้อมูลสำหรับผู้ลงทะเบียน</h3>
           <br>
           <div class="row col-md-offset-2" id="main-element" style="">

           <div class="col-sm-7">


              <div class="form-group">
                <label for="inputEmail3" class="col-sm-5">*ชื่อ - นามสกุล</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name[]" value="{{ old('name.0') }}" required="true">
                  @if ($errors->has('name'))
                        <span class="text-danger">
                            <strong>ต้องกรอก ชื่อ - นามสกุล</strong>
                        </span>
                    @endif
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-5 ">*รหัสประจำตัวประชาชน</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="id_card[]" value="{{ old('id_card.0') }}" required>
                  @if ($errors->has('id_card'))
                        <span class="text-danger">
                            <strong>ต้องกรอก รหัสประจำตัวประชาชน หรือใช้ไปแล้ว</strong>
                        </span>
                    @endif
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-5 ">*อายุ (ปี)</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="year_old[]" value="{{ old('year_old.0') }}" required>
                  @if ($errors->has('year_old'))
                        <span class="text-danger">
                            <strong>ต้องกรอก อายุ</strong>
                        </span>
                    @endif
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-5 ">*Line ID</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="line[]"  value="{{ old('line.0') }}" required>
                  @if ($errors->has('line'))
                        <span class="text-danger">
                            <strong>ต้องกรอก Line ID</strong>
                        </span>
                    @endif
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-5 ">*เบอร์ติดต่อ</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="phone[]"  value="{{ old('phone.0') }}" required>
                  @if ($errors->has('phone'))
                        <span class="text-danger">
                            <strong>ต้องกรอก เบอร์ติดต่อ</strong>
                        </span>
                    @endif
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-5 ">*อีเมล</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="email[]"  value="{{ old('email.0') }}" required>
                  @if ($errors->has('email'))
                        <span class="text-danger">
                            <strong>อีเมลของท่านได้ถูกลงทะเบียนไปแล้ว</strong>
                        </span>
                    @endif
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-5 ">*กรุ๊ปเลือด</label>
                <div class="col-sm-7">
                  <select  class="form-control" name="group_blood[]" required>
                      <option value="">-- เลือกกรุ๊ปเลือด --</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="AB">AB</option>
                      <option value="O">O</option>
                    </select>
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-5 ">*เพศ</label>
                <div class="col-sm-7">
                  <select  class="form-control" name="sex[]" required>
                      <option value="">-- เลือกเพศ --</option>
                      <option value="1">ชาย</option>
                      <option value="2">หญิง</option>
                    </select>
                </div>
              </div>




            </div>




            <div class="col-sm-4">
              <div class="box_style_1 text-center ">
                <br>
                  <h5 style="font-weight:700; font-size: 15px;">ต้องการลงทะเบียน</h5>
                  <br>
                  <div class="form-group" style="padding-left:10px; padding-right:10px;">



                      <select  class="form-control" name="group_type[]" required>
                          <option value="">-- เลือกประเภทเข้าร่วม --</option>
                          <option value="1">เพื่อบริจาคโลหิต</option>
                          <option value="2">ร่วมเป็นอาสาสมัคร</option>
                        </select>

                  </div>



              </div>
            </div>

            </div>


            <div class="headeradd hidden">
              <h3 class="text-danger" style="margin-left:10px;"><i class="fa fa-tint" style="font-size:24px;"></i> สมาชิกที่ต้องการลงทะเบียนแทน</h3>
              <br>
            </div>


            <div class="cpelement">

            </div>

            <hr>


          <!--  <div class="row col-md-offset-7" style="padding-left: 20px;">
              <a class="cp_btn" style="    cursor: pointer;"><i class="fa fa-plus-circle"></i> เพิ่มสมาชิกที่ต้องการลงทะเบียนแทน</a>
            </div> -->

              <div class="row">
                <div class="col-md-12 text-center">
                  <br>
                   <button class="btn btn-warning" type="submit" role="button" style="box-shadow: 0 1px 15px rgba(60,8,8,.8); padding: 10px 30px; font-size: 18px;">ลงทะเบียนร่วมกิจกรรม</button>
                </div>
              </div>



            </form>






         </div>
 </div>

     </div>
 </div>
 <div class="container" style="background-color:#000">
     <div class="row" style="margin-top:10px;">
         <div class="col-lg-12">
          <!--   <img class="img-responsive" alt="Acme Vampire Day" src="{{url('assets/vampire/assets/image/footer-web-n3.png')}}" /> -->
         </div>
     </div>
 </div>
    </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="{{asset('/assets/vendor/pnotify/pnotify.custom.js')}}"></script>
  <script>
$(document).ready(function(){
    $(".cp_btn").click(function(){
        var hrs = "<div class='col-md-12'><hr></div>";
        $("#main-element").clone().attr('id', "#newId").find("input:text").val("").end().appendTo(".cpelement").append(hrs);

        $('html, body').animate({
        scrollTop: $(".cp_btn").offset().top
    }, 1000);

    var count = $('.cpelement').children().length;
    //alert(count);
    if(count > 0){
      $(".headeradd").removeClass("hidden");
    }

    });

});


</script>

<script>
var form = document.getElementById('formID'); // form has to have ID: <form id="formID">
form.noValidate = true;
form.addEventListener('submit', function(event) { // listen for form submitting
        if (!event.target.checkValidity()) {
            event.preventDefault(); // dismiss the default functionality
            alert('กรุณากรอกข้อมูลให้ครบด้วยค่ะ'); // error message
        }
    }, false);
</script>


@if ($message = Session::get('error'))
<script type="text/javascript">
PNotify.prototype.options.styling = "fontawesome";
new PNotify({
      title: 'เสียใจด้วย',
      text: '{{$message}}',
      type: 'error'
    });
</script>
@endif


<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148981903-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-148981903-1');
</script>
</body>
</html>
