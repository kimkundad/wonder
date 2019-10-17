@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')


<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">เพิ่มรายชื่อผู้บริจาคเลือด</h4>
      </div>
      <div class="card-body">
        <form class="form-horizontal" action="{{url('admin/post_add_vam')}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
          <div class="row">

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ชื่อ - นามสกุล</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">รหัสประจำตัวประชาชน (ถ้าไม่มีใส่ไรไปก็ได้)</label>
                <input type="text" class="form-control" name="id_card" value="{{old('id_card')}}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">อายุ (ปี)</label>
                <input type="text" class="form-control" name="year_old" value="{{old('year_old')}}">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">Line ID</label>
                <input type="text" class="form-control" name="line" value="{{old('line')}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">เบอร์ติดต่อ</label>
                <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">อีเมล</label>
                <input type="text" class="form-control" name="email" value="{{old('email')}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">เลือกกรุ๊ปเลือด</label>
                <select  class="form-control" name="group_blood" required>
                    <option value="">-- เลือกกรุ๊ปเลือด --</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                  </select>
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">เลือกเพศ</label>
                <select  class="form-control" name="sex" required>
                    <option value="">-- เลือกเพศ --</option>
                    <option value="1">ชาย</option>
                    <option value="2">หญิง</option>
                  </select>
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">เลือกประเภทเข้าร่วม</label>
                <select  class="form-control" name="group_type" required>
                    <option value="">-- เลือกประเภทเข้าร่วม --</option>
                    <option value="1">เพื่อบริจาคโลหิต</option>
                    <option value="2">ร่วมเป็นอาสาสมัคร</option>
                  </select>
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ส่ง email หรือไม่</label>
                <select  class="form-control" name="email_on" required>

                    <option value="1">ไม่ส่ง</option>
                    <option value="2">ส่งอีเมล</option>
                  </select>
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


<script>
@if ($message = Session::get('error_0'))
$.notify({
      icon: "add_alert",
      message: "ลบข้อมูลสำเร็จ."

  },{
      type: 'success',
      timer: 4000
  });
  @endif
</script>

@stop('scripts')
