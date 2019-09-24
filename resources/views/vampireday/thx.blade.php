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
    </style>


</head>
<body>
    <div id="app">


      <div class="navbar navbar-inverse navbar-fixed-top">
              <div class="container">
                  <div class="navbar-header">

                      <a asp-area="" asp-controller="Home" asp-action="Index" class="navbar-brand" href="{{url('/')}}">
                          <img src="{{url('assets/vampire/assets/image/Acmelogo.png')}}" style="height:25px;">
                      </a>
                  </div>

              </div>
            </div>






 <div style="background-image: url('{{url('assets/vampire/assets/image/vamp-bg-jpg.jpg')}}'); background-repeat: no-repeat; background-size: cover;">
     <div class="container" style="background-color:#fff; margin-top: 50px;" >










<div class="row">
         <div class="col-md-10 col-xs-12 col-md-offset-1 " style="text-align: center;padding-bottom:40px;padding-top:40px;">

           <h3 class="text-center">ขอบคุณที่เข้าร่วมกิจกรรม </h3>
           <hr>
           <p class="text-center">กรุณาตรวจสอบอีเมล เพื่อทำการรับเสื้อในวันจัดกิจกรรม Acme Vampire Day <br>
           วันเสาร์ที่ 18 มีนาคม 2560 08:00 น. ช่วงลงทะเบียน</p>
           <br>
           <p>
            ระบบทำการส่ง <b>QR Code</b> ไปยัง Email ของท่าน
           </p>
           <br>
           <p>หมายเหตุ : เก็บรหัสลงทะเบียน หรือ QR Code ไว้ตรวจสอบการลงทะเบียน</p>
           <br>
           <a type="button" href="{{url('/')}}" class="btn btn-success">กลับหน้าหลัก</a>
           <br><br>
           <img src="{{url('assets/vampire/assets/image/da.jpg')}}" style="margin:0 auto;" class="img-responsive" >





           <div class="row col-md-offset-2" id="main-element" style="">








            </div>









         </div>
 </div>

     </div>
 </div>
 <div class="container" style="background-color:#000">
     <div class="row" style="margin-top:10px;">
         <div class="col-lg-12">
             <img class="img-responsive" alt="Acme Vampire Day" src="{{url('assets/vampire/assets/image/footer-web-n3.png')}}" />
         </div>
     </div>
 </div>
    </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="{{asset('/assets/vendor/pnotify/pnotify.custom.js')}}"></script>



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

</body>
</html>
