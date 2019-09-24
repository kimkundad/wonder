@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')


<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">เพิ่มงาน Events</h4>
      </div>
      <div class="card-body">
        <form class="form-horizontal" action="{{$url}}" method="post" enctype="multipart/form-data">
            {{ method_field($method) }}
						{{ csrf_field() }}
          <div class="row">

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ชื่องาน Events</label>
                <input type="text" class="form-control" name="e_name" value="{{old('e_name')}}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">รายละเอียดงาน Events</label>
                <textarea class="form-control" rows="5" name="e_detail">{{old('e_detail')}}</textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">เริ่มวันที่ 2019-09-17</label>
                <input type="text" class="form-control" name="e_start" value="{{old('e_start')}}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">วันที่สิ้นสุด 2019-09-17</label>
                <input type="text" class="form-control" name="e_end" value="{{old('e_end')}}">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">จำนวนสูงสุดที่รับคน Events</label>
                <input type="text" class="form-control" name="e_max_person" value="{{old('e_max_person')}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">Link Events</label>
                <input type="text" class="form-control" name="e_url" value="{{old('e_url')}}">
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
                <input type="text" class="form-control" name="e_point" value="{{old('e_point')}}">
              </div>
            </div>



            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">สถานที่จัด Events</label>
                <input type="text" class="form-control" name="e_location" value="{{old('e_location')}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">google map Events</label>
                <input type="text" class="form-control" name="e_map" value="{{old('e_map')}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">Tags Events</label>
                <input type="text" class="form-control" name="e_tags" value="{{old('e_tags')}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">


                <label class="bmd-label-floating">อายุของผู้เข้าร่วมงาน Events</label>
                <input type="text" class="form-control" name="e_level" value="{{old('e_level')}}">
                <p class="text-danger">
                  *ตัวอย่าง (ต้องมีอายุ 20 ปีขึ้นไป)

                </p>
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">หมายเหตุ Events</label>
                <textarea class="form-control" rows="5" name="e_remark">{{old('e_remark')}}</textarea>
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

  </div>
</div>


@stop

@section('scripts')




@stop('scripts')
