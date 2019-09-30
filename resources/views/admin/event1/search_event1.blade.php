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
        <input type="text" name="search" class="form-control" value="{{$search_text}}" placeholder="Search...">
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
        <h4 class="card-title ">รายชื่อลูกค้าทั้งหมด</h4>

      </div>
      <div class="card-body">


        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">

              <th>ชื่อผู้ใช้งาน</th>
              <th>อีเมล</th>
              <th>ผ่านทาง</th>
              <th>วันที่สมัคร</th>
              <th>จำนวนวัน</th>
              <th>check</th>

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
                  <select name="multi_mode" id="selectbox1" class="form-control mb-md" required>

  															<option value="1"  @if( $u->multi_mode == 1)
  															 selected='selected'
  															 @endif>เข้าร่วมวันที่ 1</option>
  															<option value="2"  @if( $u->multi_mode == 2)
  															 selected='selected'
  															 @endif>เข้าร่วมวันที่ 2</option>
                                 <option value="3"  @if( $u->multi_mode == 3)
   															 selected='selected'
   															 @endif>เข้าร่วมวันที่ 3</option>
   															<option value="4"  @if( $u->multi_mode == 4)
   															 selected='selected'
   															 @endif>เข้าร่วมวันที่ 4</option>
                                 <option value="5"  @if( $u->multi_mode == 5)
   															 selected='selected'
   															 @endif>เข้าร่วมวันที่ 5</option>

  														</select>
                </td>

                <td>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" @if($u->get_value == 1)
                        checked="checked"
                        @endif>
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
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

    $('#selectbox1').change(function() {
      var user_id = $(this).closest('tr').attr('id');

      $.ajax({
              type:'POST',
              url:'{{url('api_event1_day_status')}}',
              headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
              data: { "user_id" : user_id, "selectbox1_selectedvalue" : $(this).val() },
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
