@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">ข้อมูลผู้ขอเข้าร่วม "อัพ รับ พอยท์" </h4>

      </div>
      <div class="card-body">


        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">

              <th>#</th>
              <th>Event</th>
              <th>ชื่อ</th>

              <th>สถานะ</th>

              <th></th>
            </thead>
            <tbody>

              @if($objs)
                @foreach($objs as $u)

                <tr id="{{$u->id_o}}">
                  <td>
                    @if($u->events_id == 5)
                    <img class="img-fluid" style="height:200px;" src="{{url('assets/home/img/unlock_img02.png')}}">
                    @else
                    <img class="img-fluid" style="height:200px;" src="{{url('assets/home/img/events/'.$u->e_image)}}">
                    @endif
                  </td>
                  <td>
                    {{$u->e_name}}
                  </td>
                  <td>
                    @if($u->provider == 'email')
                      <img src="{{url('assets/images/avatar/'.$u->avatar)}}" alt="{{$u->name}}" style="height:32px;" class="img-circle">
                    @else
                      <img src="{{$u->avatar}}" alt="{{$u->name}}" style="height:32px;" class="img-circle">
                    @endif
                    {{$u->name}}
                  </td>

                  <td>

                    @if($u->join_status == 0)
                          <span class="text-danger">รอการตรวจสอบ</span>
                          @elseif($u->join_status == 1)
                          <span class="text-success">สำเร็จแล้ว</span>

                          @else
                          <span class="text-muted">ไม่ผ่าน </span>

                          @endif

                  </td>






                  <td class="td-actions text-right">
                    <button type="button" data-toggle="modal" data-target="#exampleModal-{{$u->id_o}}" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                      <i class="material-icons">edit</i>
                    </button>



                    <!-- Modal -->
                      <div class="modal fade" id="exampleModal-{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">ข้อมูล {{$u->name}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body table-responsive">
                              <form class="form-horizontal" action="{{url('admin/edit_up_poiunt/'.$u->id_o)}}" method="post" enctype="multipart/form-data">

                      				{{ csrf_field() }}
                              <table class="table table-hover">

                                <tbody>
                                  <tr>
                                    <td>รูปที่ส่งมา</td>
                                    <td><img src="{{url('assets/home/img/regis/'.$u->image)}}" class="img-fluid" style="height:200px;" /></td>
                                  </tr>

                                  <tr>
                                    <td>สถานะ</td>
                                    <td>

                                      <div class="form-group">
                                        <select name="join_status" class="form-control mb-md" required>

                                          <option value="0"
                                             @if($u->join_status == 0)
                                             selected='selected'
                                             @endif
                                             > รอการตรวจสอบ </option>

                                             <option value="1"
                                             @if($u->join_status == 1)
                                             selected='selected'
                                             @endif
                                             > สำเร็จแล้ว </option>

                                             <option value="3"
                                             @if($u->join_status == 3)
                                             selected='selected'
                                             @endif
                                             > ไม่ผ่าน </option>

                                          </select>
                                      </div>

                                    </td>
                                  </tr>


                                </tbody>
                              </table>
                              <button type="submit" class="btn btn-primary pull-right">บันทึกข้อมูล</button>
                              <div class="clearfix"></div>
                            </form>

                            </div>

                          </div>
                        </div>
                      </div>
                  <!--  <button onclick="window.location.href = '{{url('admin/events/destroy_del/'.$u->id)}}';" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                      <i class="material-icons">close</i>
                    </button> -->
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
