@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')


<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">ข้อมูลของ : {{$objs->name}}</h4>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table class="table">
          <thead>
            <tr>

              <th>กิจกรรม / ซื้อสินค้า</th>
              <th>Point</th>
              <th>วันที่</th>

            </tr>
          </thead>
          <tbody {{$s = 0}}>

            @if(isset($order))
              @foreach($order as $u)


              <tr {{$s+=$u->get_point}}>

                <td>
                  <p class="theme-account-history-type-title">{{$u->detail_data}}</p>
                </td>
                <td>
                  <a href="#" style="color:#d4147d"><b><i class="fa fa-plus"></i> {{$u->get_point}}</b></a>
                </td>
                <td class="theme-account-history-tr-date">
                  <p class="theme-account-history-date">{{$u->created_at}}</p>
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
  <div class="col-md-4">


    <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    @if($objs->provider == 'email')
                      <img src="{{url('assets/images/avatar/'.$objs->avatar)}}" alt="{{$objs->name}}" class="img">
                    @else
                      <img src="{{$objs->avatar}}" alt="{{$objs->name}}"  class="img">
                    @endif

                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">POINT <b>{{$objs->user_point}}</b></h6>
                  <h4 class="card-title">{{$objs->code_user}}</h4>
                  <p class="card-description">
                    {{$objs->phone}}
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">{{$objs->email}}</a>
                </div>
              </div>



              <div class="card card-profile">
                <div class="card-body">
                  <a href="#pablo" data-toggle="modal" data-target="#exampleModal-{{$objs->id}}" class="btn btn-primary btn-round">Add RFID</a>


                  <div class=" table-responsive">
                    <table class="table table-hover">

                      <tbody>
                        @if(isset($get_rfid))
                        @foreach($get_rfid as $u)
                        <tr>
                          <td>
                            #{{$u->id}}
                          </td>
                          <td>
                            <input type="password" class="form-control" value="{{$u->rfid_key}}">
                          </td>
                          <td>
                            <a href="{{url('admin/del_rfid/'.$u->id)}}" title="Remove" class="btn btn-danger btn-link btn-sm">
                              <i class="material-icons">close</i>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                        @endif

                      </tbody>
                    </table>
                  </div>


                  <!-- Modal -->
                    <div class="modal fade" id="exampleModal-{{$objs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">เพิ่ม RFID ให้แก่ User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body table-responsive">
                            <table class="table table-hover">

                              <tbody>

                                <tr>
                                  <td>
                                    <form class="form-horizontal" action="{{url('admin/add_rfid_user')}}" method="post" enctype="multipart/form-data">
                            						{{ csrf_field() }}
                                    <input type="text" class="form-control" name="rfid_key" value="{{old('rfid_key')}}">
                                    <input type="hidden" class="form-control" name="user_id" value="{{$objs->id}}">
                                    <button type="submit" class="btn btn-primary pull-right">บันทึกข้อมูล</button>
                                    <div class="clearfix"></div>
                                  </form>
                                  </td>
                                </tr>

                              </tbody>
                            </table>
                          </div>

                        </div>
                      </div>
                    </div>



                </div>
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


  @if ($message = Session::get('delete'))
  $.notify({
        icon: "add_alert",
        message: "แก้ไขข้อมูลสำเร็จ."

    },{
        type: 'success',
        timer: 4000
    });
    @endif




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



@stop('scripts')
