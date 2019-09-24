@extends('layouts.template2')

@section('title')

@stop



@section('stylesheet')

@stop('stylesheet')



@section('content')



<div class="theme-page-section theme-page-section-lg">
  <div class="container">
    <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
      <div class="col-md-3 ">


      </div>

      <div class="col-md-6 ">
        <div class="theme-payment-page-sections">
          <div class="theme-payment-page-sections-item">
            <div class="theme-payment-page-signin">
              <i class="theme-payment-page-signin-icon fa fa-user-circle-o"></i>
              <div class="theme-payment-page-signin-body">
                <h4 class="theme-payment-page-signin-title">Sign in if you have an account</h4>
                <p class="theme-payment-page-signin-subtitle">We will retrieve saved travelers and credit cards for faster checkout</p>
              </div>
              <a class="btn theme-payment-page-signin-btn btn-primary" href="#">Sign in</a>
            </div>
          </div>
          <div class="theme-payment-page-sections-item">
            <div class="theme-search-results-item theme-payment-page-item-thumb">
              <div class="row" data-gutter="20">


                <div class="col-md-12 ">
                  <p class="theme-search-results-item-flight-payment-airline">You are flying Virgin Atlantic Airways</p>
                  <h5 class="theme-search-results-item-title">London, LHR &nbsp;&rarr;&nbsp; New York, JFK</h5>
                  <p class="theme-search-results-item-flight-payment-info">Round-trip, Economy, 1 Adult</p>



                </div>

              </div>
            </div>
          </div>





          <div class="theme-payment-page-sections-item">
            <div class="theme-payment-page-booking">
              <div class="theme-payment-page-booking-header">
                <h3 class="theme-payment-page-booking-title">Total</h3>
                <p class="theme-payment-page-booking-subtitle">By clicking book now button you agree with terms and conditionals and money back gurantee. Thank you for trusting our service.</p>
                <p class="theme-payment-page-booking-price">$670.00</p>
              </div>
              <a class="btn _tt-uc btn-primary-inverse btn-lg btn-block" href="#">Book Now</a>
            </div>
          </div>
        </div>
      </div>



      <div class="col-md-3 ">


      </div>




    </div>
  </div>
</div>

@endsection

@section('scripts')

<script>



</script>

@stop('scripts')
