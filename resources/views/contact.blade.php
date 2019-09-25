@extends('layouts.template2')

@section('title')

@stop



@section('stylesheet')

@stop('stylesheet')



@section('content')



<div class="theme-page-section theme-page-section-lg">
  <div class="container">
    <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">


      <div class="col-md-7 ">
        <div class="theme-payment-page-sections">
          <div class="theme-payment-page-sections-item">
            <div class="theme-payment-page-signin">

              <div class="theme-payment-page-signin-body">

                <h3 class="theme-contact-title">CONTACT US</h3>

                <form action="{{url('/post_contact')}}" method="post" enctype="multipart/form-data" name="product">
                          {{ csrf_field() }}

                  <div class="form-group theme-contact-form-group">
                    <input class="form-control" type="text" placeholder="Name">
                    @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>Please enter your name</strong>
                                  </span>
                              @endif
                  </div>
                  <div class="form-group theme-contact-form-group">
                    <input class="form-control" type="text" name="email" placeholder="Email">
                    @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>Please enter your email address</strong>
                                  </span>
                              @endif
                  </div>


                  <div class="form-group theme-contact-form-group">
                    <div class="g-recaptcha" data-sitekey="6LfRSboUAAAAAJmVKa3249MhXM0QDw0Mvn9yUlKM"></div>
                    @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>Robot?!</strong>
                                    </span>
                                @endif
                  </div>


                  <div class="form-group theme-contact-form-group">
                    <textarea class="form-control" rows="5" name="detail" placeholder="Message"></textarea>
                    @if ($errors->has('detail'))
                                  <span class="help-block">
                                      <strong>Please enter your question!</strong>
                                  </span>
                              @endif
                  </div>
                  <button type="submit" class="btn btn-uc btn-primary btn-lg" >Send Your Message</button>
                   </form>

              </div>

            </div>
          </div>







        </div>
      </div>



      <div class="col-md-5 ">
        <div class="theme-sidebar-section _mb-10">
          <h4 class="theme-payment-page-signin-title">CONTACT INFORMATION</h4>
          <ul class="theme-search-results-item-hotel-room-features">
            <li><i class="fa fa-home"></i> 283/1 Thanon Sukhonthasawat, Khwaeng Lat Phrao, Khet Lat Phrao, Bangkok 10230</li>
            <li><i class="fa fa-phone"></i> +6621131330</li>
            <li><i class="fa fa-envelope"></i> support@acmetrader.club</li>
            <li><i class="fa fa-clock-o"></i> Everyday 9:00-0:00</li>
          </ul>
        </div>
        <br />

        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7748.4426650988835!2d100.619977!3d13.825744!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbc204078396efd2a!2sAcdicator%20Building!5e0!3m2!1sen!2sth!4v1568892827995!5m2!1sen!2sth"
        style="width:100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>




    </div>
  </div>
</div>

@endsection

@section('scripts')

<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>


@stop('scripts')
