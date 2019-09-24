@extends('admin.layouts.template')

@section('admin.stylesheet')
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
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-warning card-header-icon">
        <div class="card-icon">
          A
        </div>
        <p class="card-category">กรุ๊ปเลือด</p>
        <h3 class="card-title">{{$b_a}}

        </h3>
      </div>

    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-success card-header-icon">
        <div class="card-icon">
          AB
        </div>
        <p class="card-category">กรุ๊ปเลือด</p>
        <h3 class="card-title">{{$b_ab}}</h3>
      </div>

    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          O
        </div>
        <p class="card-category">กรุ๊ปเลือด</p>
        <h3 class="card-title">{{$b_o}}</h3>
      </div>

    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-info card-header-icon">
        <div class="card-icon">
          B
        </div>
        <p class="card-category">กรุ๊ปเลือด</p>
        <h3 class="card-title">{{$b_b}}</h3>
      </div>

    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">รายชื่อผู้ลงทะเบียน  Acme Vampire Day #2 (ทั้งหมด {{$count_vam}})</h4>

      </div>
      <div class="card-body">


        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">

              <th>QR Code</th>
              <th>ชื่อผู้ลงทะเบียน</th>
              <th>อีเมล</th>
              <th>ID Card</th>

              <th>วันที่ลงทะเบียน</th>
              <th>กรุ๊ปเลือด</th>
              <th></th>
            </thead>
            <tbody>


              @if($objs)
                 @foreach($objs as $u)
                      <td>{{$u->qrcode}}</td>
                       <td>{{$u->name}}</td>
                       <td>{{$u->email}}</td>
                       <td>{{$u->id_card}}</td>


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
                                              <td>{{$u->name}}</td>

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
                                              <td>{{$u->phone}}</td>

                                            </tr>
                                            <tr>
                                              <td>อีเมล</td>
                                              <td>{{$u->email}}</td>

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
