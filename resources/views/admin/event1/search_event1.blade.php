@extends('admin.layouts.template')

@section('admin.stylesheet')
<style>
#search_vam{
  display: none;
}
.value-button {
  display: inline-block;
  border: 1px solid #ddd;
  margin: 0px;
  width: 40px;
  height: 20px;
  text-align: center;
  vertical-align: middle;
  padding: 11px 0;
  background: #eee;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.value-button:hover {
  cursor: pointer;
}

 #decrease {
  margin-right: -4px;
  border-radius: 8px 0 0 8px;
}

 #increase {
  margin-left: -4px;
  border-radius: 0 8px 8px 0;
}

 #input-wrap {
  margin: 0px;
  padding: 0px;
}

input#number {
  text-align: center;
  border: none;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  margin: 0px;
  width: 40px;
  height: 40px;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
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
        <h4 class="card-title ">รายชื่อ Unlock Acme and his cloner</h4>

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
                  <form id="cutproduct" class="typePay2 " novalidate="novalidate" action="" method="post"  role="form">
                    <input type="hidden" id="id_user" name="ids" value="{{$u->id_user}}">
                  <div class="value-button" style="height: 40px;" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                    <input name="quantity" type="number" id="number" value="{{$u->multi_mode}}" />
                    <div class="value-button" style="height: 40px;" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                    </form>
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

function increaseValue() {
var value = parseInt(document.getElementById('number').value, 10);
value = isNaN(value) ? 0 : value;
value++;
document.getElementById('number').value = value;

    //  var ids = parseInt($('#id_user').text());
      var ids = document.getElementById('id_user').value;

if(value !== 0){

          $.ajax({
            type: "POST",
            url: "{{url('add_qty2_photo')}}",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: {
              qty2 : value,
              ids : ids
            },
            dataType: "json",
         success: function(json){
             if(json.status == 1001) {

               $.notify({
                     icon: "add_alert",
                     message: "เปลี่ยนข้อมูลสำเร็จ."

                 },{
                     type: 'success',
                     timer: 4000
                 });


              } else {


              }
            },
            failure: function(errMsg) {
              alert(errMsg.Msg);
            }
          });


        }

console.log(value);
}

function decreaseValue() {
var value = parseInt(document.getElementById('number').value, 10);
value = isNaN(value) ? 0 : value;
value < 1 ? value = 1 : '';
value--;
document.getElementById('number').value = value;


var ids = document.getElementById('id_user').value;



    $.ajax({
      type: "POST",
      url: "{{url('add_qty2_photo')}}",
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data: {
        qty2 : value,
        ids : ids
      },
      dataType: "json",
   success: function(json){
       if(json.status == 1001) {

         $.notify({
               icon: "add_alert",
               message: "เปลี่ยนข้อมูลสำเร็จ."

           },{
               type: 'success',
               timer: 4000
           });


        } else {


        }
      },
      failure: function(errMsg) {
        alert(errMsg.Msg);
      }
    });



console.log(value);
}


$(document).ready(function(){



  $("input:checkbox").change(function() {
    var user_id = $(this).closest('tr').attr('id');

    $.ajax({
            type:'POST',
            url:'{{url('api_event2_status')}}',
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
