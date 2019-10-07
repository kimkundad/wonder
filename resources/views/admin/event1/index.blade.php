@extends('admin.layouts.template')

@section('admin.stylesheet')
<style>
#search_vam{
  display: none;
}
</style>
@stop('admin.stylesheet')

@section('admin.content')


<div class="row">
  <div class="col-md-6">
    <form class="navbar-form" action="{{url('admin/search_event1')}}" method="GET">
      {{ csrf_field() }}
      <div class="input-group no-border">
        <input type="text" name="search" class="form-control" placeholder="Search...">
        <button type="submit" class="btn btn-white btn-round btn-just-icon">
          <i class="material-icons">search</i>
          <div class="ripple-container"></div>
        </button>
      </div>
    </form>
    </div>
    <div class="col-md-6">

      </div>

  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">รายชื่อผู้มาร่วม Unlock Acme and his cloner</h4>

      </div>
      <div class="card-body">


        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">

              <th>ชื่อผู้ใช้งาน</th>
              <th>อีเมล</th>
              <th>ผ่านทาง</th>
              <th>วันที่สมัคร</th>
              <th>จำนวนเข้าร่วม</th>

            </thead>
            <tbody>

              @if($objs)
                @foreach($objs as $u)

              <tr id="{{$u->id_user}}">

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
                  {{$u->provider}}
                </td>
                <td id="{{ $day = date('n', strtotime($u->created_at))}}">{{$u->created_ats}}</td>


                <td>
                 {{$u->multi_mode}}
                </td>

              </tr>
              @endforeach
              @endif

            </tbody>
            <div class="pagination"> {{ $objs->links() }} </div>
          </table>
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
            url:'{{url('api_event1_status')}}',
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


@stop('scripts')
