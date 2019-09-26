@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">แจ้งยอดชำระโอน ทั้งหมด </h4>

      </div>
      <div class="card-body">


        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>วันที่</th>
              <th>#order id</th>
              <th>ลูกค้า</th>
              <th>ประเภทโอน</th>
              <th>ยอดโอน</th>
              <th>สถานะ เช็ค</th>

              <th></th>
            </thead>
            <tbody>

              @if(isset($objs))
                @foreach($objs as $u)

                <tr id="{{$u->id}}">
                  <td>
                  #{{$u->day_tran}}
                  </td>
                  <td>
                    {{$u->order_id_c}}
                  </td>
                  <td>
                    {{$u->name_c}}
                  </td>

                  <td>
                    โอนผ่านบัญชีธนาคาร
                  </td>
                  <td>
                  {{$u->money_c}}
                  </td>
                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" @if($u->c_status == 1)
                          checked="checked"
                          @endif>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </td>

                  <td class="td-actions text-right">
                    <button type="button" data-toggle="modal" data-target="#exampleModal-{{$u->id}}" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                      <i class="material-icons">contact_support</i>
                    </button>
                    <button onclick="window.location.href = '{{url('admin/del_pay/'.$u->id)}}';" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                      <i class="material-icons">close</i>
                    </button>


                    <!-- Modal -->
                      <div class="modal fade" id="exampleModal-{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">ข้อมูล {{$u->name_c}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body table-responsive">
                              <table class="table table-hover">

                                <tbody>
                                  <tr>
                                    <td>หมายเลขสั่งซื้อ</td>
                                    <td>{{$u->order_id_c}}</td>
                                  </tr>
                                  <tr>
                                    <td>ชื่อ-นามสกุล</td>
                                    <td>{{$u->name_c}}</td>
                                  </tr>
                                  <tr>
                                    <td>อีเมล</td>
                                    <td>{{$u->email_c}}</td>
                                  </tr>
                                  <tr>
                                    <td>เบอร์ติดต่อ</td>
                                    <td>{{$u->phone_c}}</td>
                                  </tr>
                                  <tr>
                                    <td>ยอดโอน</td>
                                    <td>{{$u->money_c}}</td>
                                  </tr>

                                  <tr>
                                    <td>วัน-เวลาที่โอน</td>
                                    <td>{{$u->day_tran}} {{$u->time_tran}}</td>
                                  </tr>


                                  <tr>
                                    <td>หลักฐานการโอนเงิน</td>
                                    <td><img class="img-fluid" src="{{url('assets/home/img/slip/'.$u->image)}}" style="height:400px;"></td>
                                  </tr>

                                  <tr>
                                    <td>หมายเหตุ</td>
                                    <td>{{$u->re_mark}}</td>
                                  </tr>


                                </tbody>
                              </table>
                            </div>

                          </div>
                        </div>
                      </div>

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


<script type="text/javascript">
$(document).ready(function(){
  $("input:checkbox").change(function() {
    var user_id = $(this).closest('tr').attr('id');

    $.ajax({
            type:'POST',
            url:'{{url('api_pay_status')}}',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "user_id" : user_id },
            success: function(data){
              if(data.data.success){


                $.notify({
                      icon: "add_alert",
                      message: "เปลี่ยนข้อมูลสำเร็จ."

                  },{
                      type: 'success',
                      timer: 4000
                  });



              }
            }
        });
    });
});
</script>

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
