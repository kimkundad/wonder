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
.theme-sidebar-section1 {
    background: #fff;
    padding: 25px 30px;
    border: 1px solid #8a8787;
    border-radius: 2px;
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
            <div class="theme-search-results-item theme-payment-page-item-thumb">
              <div class="row  row-col-gap" data-gutter="10">

                <div class="col-md-8 col-md-offset-2">
            <div class="theme-payment-success">
              <div class="theme-payment-success-header">
                <i class="fa fa-check-circle theme-payment-success-header-icon"></i>
                <h1 class="theme-payment-success-title">{{$text_show}}</h1>
                <p class="theme-payment-success-subtitle">{{$text_show2}}</p>

              </div>

              <div class="row">
                <div class="col-md-6">
                  <br />
                  <img src="{{url('assets/home/img/'.$get_iamge)}}" class="img-responsive" style="width:200px;" />
                  <br />
                </div>
                <div class="col-md-6">
                  <br />
                  <img src="{{url('assets/home/img/regis/'.$get_users->image)}}" class="img-responsive" style="width:200px;" />
                  <br />
                </div>
              </div>

              <div class="text-center" style="margin-bottom:120px;">
                <ul class="theme-payment-success-actions">

                <li>
                  <a href="{{url('join_content_his')}}" class="theme-sidebar-section1">
                    <i class="fa fa-history"></i>
                    <p>กลับหน้า Events
                      <br>เพื่อทำการอัพโหลด Events อื่นๆ
                    </p>
                  </a>
                </li>

              </ul>
              </div>

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





@endsection

@section('scripts')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>




</script>

@stop('scripts')
