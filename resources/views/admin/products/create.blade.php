@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')


<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">เพิ่ม สินค้า</h4>
      </div>
      <div class="card-body">
        <form class="form-horizontal" action="{{$url}}" method="post" enctype="multipart/form-data">
            {{ method_field($method) }}
						{{ csrf_field() }}
          <div class="row">

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ชื่อสินค้า</label>
                <input type="text" class="form-control" name="p_name" value="{{old('p_name')}}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">รายละเอียดสินค้า</label>
                <textarea class="form-control" rows="5" name="p_detail">{{old('p_detail')}}</textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">รหัสสินค้า</label>
                <input type="text" class="form-control" name="p_code" value="{{old('p_code')}}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">น้ำหนักสินค้า</label>
                <input type="text" class="form-control" name="p_weight" value="{{old('p_weight')}}">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ขนาดสินค้า </label>
                <input type="text" class="form-control" name="p_dimensions" value="{{old('p_dimensions')}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ราคา</label>
                <input type="text" class="form-control" name="p_pricec" value="{{old('p_pricec')}}">
              </div>
            </div>


            <div class="col-md-12">
              <br />
              <label class="bmd-label-floating">รูปสินค้า</label>
                <input type="file" name="p_image" >
                <hr />
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">จำนวนสินค้าในคลัง</label>
                <input type="text" class="form-control" name="p_stock" value="{{old('p_stock')}}">
              </div>
            </div>



            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">Point </label>
                <input type="text" class="form-control" name="p_point" value="{{old('p_point')}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">Tags สินค้า</label>
                <input type="text" class="form-control" name="p_tags" value="{{old('p_tags')}}">
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
