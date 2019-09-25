@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')


<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">แก้ไข slide</h4>
      </div>
      <div class="card-body">
        <form class="form-horizontal" action="{{$url}}" method="post" enctype="multipart/form-data">
            {{ method_field($method) }}
						{{ csrf_field() }}
          <div class="row">

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ชื่อรูป</label>
                <input type="text" class="form-control" name="name_slide" value="{{$objs->name_slide}}">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">หัวข้อรอง</label>
                <input type="text" class="form-control" name="sub_slide" value="{{$objs->sub_slide}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">url ปลายทาง</label>
                <input type="text" class="form-control" name="url_slide" value="{{$objs->url_slide}}">
              </div>
            </div>


            <div class="col-md-12">
              <br />
              <label class="bmd-label-floating">Image Events</label>
                <input type="file" name="image" >
                <hr />
            </div>







          </div>



          <button type="submit" class="btn btn-primary pull-right">บันทึกข้อมูล</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <img class="img-fluid" src="{{url('assets/home/img/slide/'.$objs->image)}}">
  </div>
</div>


@stop

@section('scripts')




@stop('scripts')
