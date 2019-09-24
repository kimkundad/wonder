@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">สินค้าทั้งหมด <button onclick="window.location.href = '{{url('admin/products/create')}}';" type="submit" style="margin-left:20px; height: 38px; width: 40px;min-width: 40px;    margin: 0rem 1px 0rem 20px;" class="btn btn-white btn-round btn-just-icon">
        <i class="fa fa-plus"></i>
        </button></h4>

      </div>
      <div class="card-body">


        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">

              <th>ชื่อสินค้า</th>
              <th>ราคา</th>
              <th>ยอดขาย</th>
              <th>คงเหลือ</th>
              <th>วันที่</th>
              <th></th>
            </thead>
            <tbody>

              @if($objs)
                @foreach($objs as $u)

                <tr>
                  <td>
                  {{$u->p_name}}
                  </td>
                  <td>
                    {{$u->p_pricec}}
                  </td>
                  <td>
                    0
                  </td>

                  <td>
                    {{$u->p_stock}}
                  </td>
                  <td>
                    {{$u->created_at}}
                  </td>

                  <td class="td-actions text-right">
                    <button type="button" onclick="window.location.href = '{{url('admin/products/'.$u->id.'/edit')}}';" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                      <i class="material-icons">edit</i>
                    </button>
                    <button onclick="window.location.href = '{{url('admin/products/destroy_del/'.$u->id)}}';" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
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
  </div>
</div>

@stop

@section('scripts')


<script>
@if ($message = Session::get('add_success'))
$.notify({
      icon: "add_alert",
      message: "เพิ่มข้อมูลสำเร็จ."

  },{
      type: 'success',
      timer: 4000
  });
  @endif
</script>

<script>
@if ($message = Session::get('delete'))
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
