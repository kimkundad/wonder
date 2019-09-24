@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')


<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">ข้อมูล Orders : #{{$objs->code_order}}</h4>
      </div>
      <div class="card-body">
        <form class="form-horizontal" action="{{$url}}" method="post" enctype="multipart/form-data">
            {{ method_field($method) }}
						{{ csrf_field() }}
          <div class="row">



            <div class="col-md-12">
              <br />
              <div class="form-group">
                <label class="bmd-label-floating">สินค้าที่สั่ง</label>
                <input type="text" class="form-control" value="{{$objs->p_name}}">
              </div>
            </div>


            <div class="col-md-12">

              <div class="form-group">
                <label class="bmd-label-floating">สถานะ</label>
                <select name="pay_status" class="form-control mb-md" required>

                  <option value="0"
                     @if($objs->pay_status == 0)
                     selected='selected'
                     @endif
                     > รอการชำระเงิน </option>

                     <option value="1"
                     @if($objs->pay_status == 1)
                     selected='selected'
                     @endif
                     > ชำระเงินแล้ว </option>

                     <option value="2"
                     @if($objs->pay_status == 2)
                     selected='selected'
                     @endif
                     > อยู่ระหว่างดำเนินการผลิต </option>

                     <option value="3"
                     @if($objs->pay_status == 3)
                     selected='selected'
                     @endif
                     > จัดส่งเรียบร้อย </option>

                     <option value="4"
                     @if($objs->pay_status == 4)
                     selected='selected'
                     @endif
                     > ยกเลิก </option>
              </div>
            </div>

            <div class="col-md-12">
              <br />
              <div class="form-group">
                <label class="bmd-label-floating">ยอดที่ต้องชำระ</label>
                <input type="text" class="form-control" value="{{$objs->p_pricec}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ems tracking no.</label>
                <input type="text" class="form-control" name="track_no" value="{{$objs->track_no}}">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ชื่อผู้สั่ง</label>
                <input type="text" class="form-control"  value="{{$objs->name_re}}">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">เบอร์ติดต่อ</label>
                <input type="text" class="form-control"  value="{{$objs->phone_re}}">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">อีเมล</label>
                <input type="text" class="form-control"  value="{{$objs->email_re}}">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ที่อยุ่จัดส่ง</label>
                <textarea class="form-control" rows="5" name="address_re">{{$objs->address_re}}</textarea>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">รหัสไปรษณีย์</label>
                <input type="text" class="form-control"  value="{{$objs->zip_re}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">จังหวัด</label>
                <input type="text" class="form-control"  value="{{$objs->pro_vin}}">

              </div>
            </div>






          </div>



          <button type="submit" class="btn btn-primary pull-right">บันทึกข้อมูล</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <img class="img-fluid" src="{{url('assets/home/img/products/'.$objs->p_image)}}">
  </div>
</div>


@stop

@section('scripts')

<script>
@if ($message = Session::get('edit_success'))
$.notify({
      icon: "add_alert",
      message: "แก้ไขข้อมูลสำเร็จ."

  },{
      type: 'success',
      timer: 4000
  });
  @endif
</script>



@stop('scripts')
