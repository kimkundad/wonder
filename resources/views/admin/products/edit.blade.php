@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')


<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">แก้ไข {{$objs->p_name}}</h4>
      </div>
      <div class="card-body">
        <form class="form-horizontal" action="{{$url}}" method="post" enctype="multipart/form-data">
            {{ method_field($method) }}
						{{ csrf_field() }}
          <div class="row">

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ชื่อสินค้า</label>
                <input type="text" class="form-control" name="p_name" value="{{$objs->p_name}}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">รายละเอียดสินค้า</label>
                <textarea class="form-control" rows="5" name="p_detail">{{$objs->p_detail}}</textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">รหัสสินค้า</label>
                <input type="text" class="form-control" name="p_code" value="{{$objs->p_code}}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">น้ำหนักสินค้า</label>
                <input type="text" class="form-control" name="p_weight" value="{{$objs->p_weight}}">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ขนาดสินค้า </label>
                <input type="text" class="form-control" name="p_dimensions" value="{{$objs->p_dimensions}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ราคา</label>
                <input type="text" class="form-control" name="p_pricec" value="{{$objs->p_pricec}}">
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
                <input type="text" class="form-control" name="p_stock" value="{{$objs->p_stock}}">
              </div>
            </div>



            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">Point </label>
                <input type="text" class="form-control" name="p_point" value="{{$objs->p_point}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">Tags สินค้า</label>
                <input type="text" class="form-control" name="p_tags" value="{{$objs->p_tags}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">เลือกออฟชั่น 1</label>
                <select name="p_size" class="form-control mb-md" required>
                  <option value="0">Free Size</option>
                  @if(isset($option))
                    @foreach($option as $u)
															<option value="{{$u->id}}"  @if( $objs->p_size == $u->id)
															 selected='selected'
															 @endif>{{$u->o_name}}</option>
                    @endforeach
									@endif
														</select>
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">เลือกออฟชั่น 2</label>
                <select name="p_color" class="form-control mb-md" required>
                  <option value="0">Free Size</option>
                  @if(isset($option))
                    @foreach($option as $u)
															<option value="{{$u->id}}"  @if( $objs->p_color == $u->id)
															 selected='selected'
															 @endif>{{$u->o_name}}</option>
                    @endforeach
									@endif
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
    <img class="img-fluid" src="{{url('assets/home/img/products/'.$objs->p_image)}}">
  </div>


  <div class="col-md-8">



    <div class="card">

      <div class="card-body">
        <form class="form-horizontal" action="{{url('admin/add_gallery/'.$objs->id)}}" method="post" enctype="multipart/form-data">

						{{ csrf_field() }}
          <div class="row">

            <div class="col-md-12">
              <br />
              <label class="bmd-label-floating">รูปสินค้า ประกอบ</label>
                <input type="file" name="g_image" >
                <hr />
            </div>

          </div>

          <button type="submit" class="btn btn-primary pull-right">บันทึกข้อมูล</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>



    <div class="table-responsive">
      <table class="table">

        <tbody>

          @if(isset($gal))
            @foreach($gal as $u)

            <tr>
              <td>
              <img class="img-fluid" src="{{url('assets/home/img/gallery/'.$u->image)}}">
              </td>




              <td class="td-actions text-right">

                <button onclick="window.location.href = '{{url('admin/options/destroy_del_gallery/'.$u->id)}}';" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                  <i class="material-icons">close</i>
                </button>
              </td>
            </tr>

            @endforeach
          @endif


        </tbody>

      </table>
    </div>



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

  @if ($message = Session::get('del_item_success'))
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
