@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')


<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">แก้ไข Events : {{$objs->e_name}}</h4>
      </div>
      <div class="card-body">
        <form class="form-horizontal" action="{{$url}}" method="post" enctype="multipart/form-data">
            {{ method_field($method) }}
						{{ csrf_field() }}
          <div class="row">

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ชื่องาน Events</label>
                <input type="text" class="form-control" name="e_name" value="{{$objs->e_name}}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">รายละเอียดงาน Events</label>
                <textarea class="form-control" rows="5" name="e_detail">{{$objs->e_detail}}</textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">เริ่มวันที่ 2019-09-17</label>
                <input type="text" class="form-control" name="e_start" value="{{$objs->e_start}}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">วันที่สิ้นสุด 2019-09-17</label>
                <input type="text" class="form-control" name="e_end" value="{{$objs->e_end}}">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">จำนวนสูงสุดที่รับคน Events</label>
                <input type="text" class="form-control" name="e_max_person" value="{{$objs->e_max_person}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">Link Events</label>
                <input type="text" class="form-control" name="e_url" value="{{$objs->e_url}}">
              </div>
            </div>


            <div class="col-md-12">
              <br />
              <label class="bmd-label-floating">Image Events</label>
                <input type="file" name="e_image" >
                <hr />
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">Point Events</label>
                <input type="text" class="form-control" name="e_point" value="{{$objs->e_point}}">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">Point Events</label>
                <input type="text" class="form-control" name="e_location" value="{{$objs->e_location}}">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">สถานที่จัด Events</label>
                <input type="text" class="form-control" name="e_location" value="{{$objs->e_location}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">google map Events</label>
                <input type="text" class="form-control" name="e_map" value="{{$objs->e_map}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">Tags Events</label>
                <input type="text" class="form-control" name="e_tags" value="{{$objs->e_tags}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">เรียงลำดับ Events</label>
                <input type="text" class="form-control" name="e_sort" value="{{$objs->e_sort}}">
                <p class="text-danger">
                  *เรียงจากมากไปหาน้อย

                </p>
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">


                <label class="bmd-label-floating">อายุของผู้เข้าร่วมงาน Events</label>
                <input type="text" class="form-control" name="e_level" value="{{$objs->e_level}}">
                <p class="text-danger">
                  *ตัวอย่าง (ต้องมีอายุ 20 ปีขึ้นไป)

                </p>
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">หมายเหตุ Events</label>
                <textarea class="form-control" rows="5" name="e_remark">{{$objs->e_remark}}</textarea>
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
    <img class="img-fluid" src="{{url('assets/home/img/events/'.$objs->e_image)}}">
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
