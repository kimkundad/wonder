@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">รายชื่อพนักงาน</h4>
        <p class="card-category"> คุณสามารถเปลี่ยนสถานะของพนักงานทั้งหมดได้</p>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>Level</th>
              <th>รหัสพนักงาน</th>
              <th>ชื่อ</th>
              <th>อีเมล</th>
              <th>เบอร์โทร</th>
              <th></th>
            </thead>
            <tbody>

              @if($objs)
                @foreach($objs as $u)

              <tr>
                <td>
                  @if($u->role_id == 1)
                        Manager
                        @else
                        Employee
                        @endif
                </td>
                <td>
                  <a href="{{url('admin/employee/'.$u->id_user.'/edit')}}">{{$u->zipcode}}</a>
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
                  {{$u->email}}
                </td>
                <td>
                  {{$u->phone}}
                </td>


                <td class="td-actions text-right">
                  <button type="button" onclick="window.location.href = '{{url('admin/employee/'.$u->id_user.'/edit')}}';" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                    <i class="material-icons">edit</i>
                  </button>
                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
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
@if ($message = Session::get('edit_success'))
$.notify({
      icon: "add_alert",
      message: "อัพเดทข้อมูลสำเร็จ."

  },{
      type: 'success',
      timer: 4000
  });
  @endif
</script>


@stop('scripts')
