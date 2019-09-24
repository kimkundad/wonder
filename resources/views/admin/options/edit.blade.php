@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')


<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">แก้ไข ออฟชั่น : {{$objs->o_name}}</h4>
      </div>
      <div class="card-body">
        <form class="form-horizontal" action="{{$url}}" method="post" enctype="multipart/form-data">
            {{ method_field($method) }}
						{{ csrf_field() }}
          <div class="row">

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ชื่อ ออฟชั่น</label>
                <input type="text" class="form-control" name="o_name" value="{{$objs->o_name}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating"> สินค้า</label>
                <input type="text" class="form-control" name="o_product" value="{{$objs->o_product}}">
              </div>
            </div>

          </div>

          <button type="submit" class="btn btn-primary pull-right">บันทึกข้อมูล</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>



  <div class="col-md-6">


    <div class="card">

      <div class="card-body">
        <form class="form-horizontal" action="{{url('admin/add_item/'.$objs->id)}}" method="post" enctype="multipart/form-data">

						{{ csrf_field() }}
          <div class="row">

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ชื่อ item</label>
                <input type="text" class="form-control" name="item_name" >
              </div>
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

          @if(isset($item))
            @foreach($item as $u)

            <tr>
              <td>
              {{$u->item_name}}
              </td>




              <td class="td-actions text-right">

                <button onclick="window.location.href = '{{url('admin/options/destroy_del_item/'.$u->id)}}';" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
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

  @if ($message = Session::get('add_item_success'))
  $.notify({
        icon: "add_alert",
        message: "เพิ่มข้อมูลสำเร็จ."

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
