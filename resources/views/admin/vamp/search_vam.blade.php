@extends('admin.layouts.template')

@section('admin.stylesheet')
<style>
#search_vam{
  display: none;
}
</style>
@stop('admin.stylesheet')

@section('admin.content')

<?php

            function DateThai($strDate)
            {
            $strYear = date("Y",strtotime($strDate))+543;
            $strMonth= date("n",strtotime($strDate));
            $strDay= date("j",strtotime($strDate));
            $strHour= date("H",strtotime($strDate));
            $strMinute= date("i",strtotime($strDate));
            $strSeconds= date("s",strtotime($strDate));
            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
            $strMonthThai=$strMonthCut[$strMonth];
            return "$strDay $strMonthThai $strYear $strHour:$strMinute.น";
            }

             ?>




<div class="row">
  <div class="col-md-6">
    <form class="navbar-form" action="{{url('admin/search_vam')}}" method="GET">
      {{ csrf_field() }}
      <div class="input-group no-border">
        <input type="text" name="search" class="form-control" value="{{$search_text}}" placeholder="Search..." >
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
        <h4 class="card-title ">รายชื่อผู้ลงทะเบียน  Acme Vampire Day #2 </h4>

      </div>
      <div class="card-body">


        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">

              <th>QR Code</th>
              <th>ชื่อผู้ลงทะเบียน</th>
              <th>อีเมล</th>
              <th>สถานะ</th>

              <th>วันที่ลงทะเบียน</th>
              <th>กรุ๊ปเลือด</th>
              <th></th>
            </thead>
            <tbody>


              @if($objs)
                 @foreach($objs as $u)
                      <tr id="{{$u->qrcode}}">


                      <td>{{$u->qrcode}}</td>
                       <td>{{$u->names}}</td>
                       <td>{{$u->emails}}</td>
                       <td>
                         <div class="form-check">
                           <label class="form-check-label">
                             <input class="form-check-input" type="checkbox" @if($u->join_admin == 1)
                               checked="checked"
                               @endif>
                             <span class="form-check-sign">
                               <span class="check"></span>
                             </span>
                           </label>
                         </div>
                       </td>


                       <td><?php echo DateThai($u->created_at); ?> </td>
                       <td>{{$u->group_blood}}</td>
                       <td>
                         @if($u->sex == 1)
                           <i class="fa fa-male text-success" style="font-size:18px;"></i>
                              @else
                              <i class="fa fa-female text-danger" style="font-size:18px;"></i>
                              @endif




                              <button type="button" data-toggle="modal" data-target="#exampleModal-{{$u->id}}" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
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
                                        <table class="table table-hover">

                                          <tbody>
                                            <tr>
                                              <td>ชื่อ - นามสกุล</td>
                                              <td>{{$u->names}}</td>

                                            </tr>
                                            <tr>
                                              <td>รหัสประจำตัวประชาชน</td>
                                              <td>{{$u->id_card}}</td>

                                            </tr>
                                            <tr>
                                              <td>อายุ (ปี)</td>
                                              <td>{{$u->year_old}}</td>

                                            </tr>
                                            <tr>
                                              <td>Line ID</td>
                                              <td>{{$u->line}}</td>

                                            </tr>
                                            <tr>
                                              <td>เบอร์ติดต่อ</td>
                                              <td>{{$u->phones}}</td>

                                            </tr>
                                            <tr>
                                              <td>อีเมล</td>
                                              <td>{{$u->emails}}</td>

                                            </tr>
                                            <tr>
                                              <td>กรุ๊ปเลือด</td>
                                              <td>{{$u->group_blood}}</td>

                                            </tr>
                                            <tr>
                                              <td>เพศ</td>
                                              <td><select name="sex" class="form-control mb-md" required>
                <option value="">--เลือกเพศ--</option>
                <option value="1" @if($u->sex == 1)
                    selected='selected'
                @endif>เพศชาย</option>
                <option value="2" @if($u->sex == 2)
                    selected='selected'
                @endif>เพศหญิง</option>

                </select></td>

                                            </tr>
                                            <tr>
                                              <td>ลงทะเบียน</td>
                                              <td><select name="group_type" class="form-control mb-md" required>

                <option value="">-- เลือกประเภทเข้าร่วม --</option>
                <option value="1"  @if($u->group_type == 1)
                    selected='selected'
                @endif>เพื่อบริจาคโลหิต</option>
                <option value="2" @if($u->group_type == 2)
                    selected='selected'
                @endif>ร่วมเป็นอาสาสมัคร</option>

                </select></td>

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
            url:'{{url('api_vam_status')}}',
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
