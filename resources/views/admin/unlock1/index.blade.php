@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')


<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">แก้ไข Unlock 1 </h4>
      </div>
      <div class="card-body">
        <form class="form-horizontal" action="{{$url}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
          <div class="row">

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">text_1</label>
                <input type="text" class="form-control" name="text_1" value="{{$objs->text_1}}">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">text_2</label>
                <textarea class="form-control" rows="5" name="text_2">{{$objs->text_2}}</textarea>
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">text_sub_1</label>
                <input type="text" class="form-control" name="text_sub_1" value="{{$objs->text_sub_1}}">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">text_sub_2</label>
                <textarea class="form-control" rows="5" name="text_sub_2">{{$objs->text_sub_2}}</textarea>
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">time_count</label>
                <input type="text" class="form-control" name="time_count" value="{{$objs->time_count}}">
              </div>
            </div>



            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">score_left_1</label>
                <input type="text" class="form-control" name="score_left_1" value="{{$objs->score_left_1}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">score_left_2</label>
                <input type="text" class="form-control" name="score_left_2" value="{{$objs->score_left_2}}">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">score_mid</label>
                <input type="text" class="form-control" name="score_mid" value="{{$objs->score_mid}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">score_r_1</label>
                <input type="text" class="form-control" name="score_r_1" value="{{$objs->score_r_1}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">score_r_2</label>
                <input type="text" class="form-control" name="score_r_2" value="{{$objs->score_r_2}}">
              </div>
            </div>




          </div>



          <button type="submit" class="btn btn-primary pull-right">บันทึกข้อมูล</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>












  <div class="col-md-6">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Item Unlock <button onclick="window.location.href = '{{url('admin/unlock_events_creat')}}';" type="submit" style="margin-left:20px; height: 38px; width: 40px;min-width: 40px;    margin: 0rem 1px 0rem 20px;" class="btn btn-white btn-round btn-just-icon">
        <i class="fa fa-plus"></i>
        </button></h4>
      </div>
      <div class="card-body">


        <div class="table-responsive">
          <table class="table">

            <tbody>

              @if(isset($item))
                @foreach($item as $u)

              <tr id="{{$u->id}}">
                <td>
                  {{$u->sort}}
                </td>
                <td>
                  <img src="{{url('assets/home/img/avatar/'.$u->avatar)}}" alt="{{$u->owner}}" style="height:32px;" class="img-circle">
                  {{$u->owner}}
                </td>

                <td>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" @if($u->status == 1)
                        checked="checked"
                        @endif>
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </td>


                <td class="td-actions text-right">
                  <button type="button" onclick="window.location.href = '{{url('admin/edit_item_unlock/'.$u->id)}}';" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                    <i class="material-icons">edit</i>
                  </button>
                  <button type="button" onclick="window.location.href = '{{url('admin/del_item_unlock/'.$u->id)}}';" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
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


<script type="text/javascript">
$(document).ready(function(){
  $("input:checkbox").change(function() {
    var user_id = $(this).closest('tr').attr('id');

    $.ajax({
            type:'POST',
            url:'{{url('api_item_unlock_status')}}',
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


@if ($message = Session::get('add_item_success'))
$.notify({
      icon: "add_alert",
      message: "แก้ไขข้อมูลสำเร็จ."

  },{
      type: 'success',
      timer: 4000
  });
  @endif

@if ($message = Session::get('edit_success'))
$.notify({
      icon: "add_alert",
      message: "แก้ไขข้อมูลสำเร็จ."

  },{
      type: 'success',
      timer: 4000
  });
  @endif
</script>



@stop('scripts')
