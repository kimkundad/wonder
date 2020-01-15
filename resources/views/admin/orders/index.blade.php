@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Orders สินค้าทั้งหมด </h4>

      </div>
      <div class="card-body">


        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">

              <th>#order id</th>
              <th>ลูกค้า</th>
              <th>สินค้า</th>
              <th>ยอดโอน</th>
              <th>สถานะ</th>
              <th>วันที่</th>
              <th></th>
            </thead>
            <tbody>

              @if($objs)
                @foreach($objs as $u)

                <tr>
                  <td>
                  #{{$u->code_order}}
                  </td>
                  <td>
                    {{$u->name_re}}
                  </td>
                  <td>
                    {{$u->p_name}}
                  </td>

                  <td>
                    {{$u->p_pricec}}
                  </td>
                  <td>
                    @if($u->pay_status == 0)
                          <span class="text-muted">รอการชำระเงิน</span>
                          @elseif($u->pay_status == 1)
                          <span class="text-success">ชำระเงินแล้ว</span>

                          @elseif($u->pay_status == 2)
                          <span class="text-warning">อยู่ระหว่างดำเนินการผลิต</span>

                          @elseif($u->pay_status == 3)
                          <span class="text-primary">จัดส่งเรียบร้อย</span>

                          @else
                          <span class="text-muted">ยกเลิก </span>

                          @endif
                  </td>
                  <td>
                    {{$u->created_ats}}
                  </td>

                  <td class="td-actions text-right">
                    <button type="button" onclick="window.location.href = '{{url('admin/order_admin/'.$u->id_o.'/edit')}}';" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                      <i class="material-icons">edit</i>
                    </button>
                    <button onclick="window.location.href = '{{url('admin/order_admin/destroy_del/'.$u->id_o)}}';" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                      <i class="material-icons">close</i>
                    </button>
                  </td>
                </tr>

                @endforeach
              @endif


            </tbody>

          </table>
          <div class="pagination"> {{ $objs->links() }} </div>
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
