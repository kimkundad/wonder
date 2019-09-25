@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">

        <h4 class="card-title ">Slide show หน้าแรก <button onclick="window.location.href = '{{url('admin/slide/create')}}';" type="submit" style="margin-left:20px; height: 38px; width: 40px;min-width: 40px;    margin: 0rem 1px 0rem 20px;" class="btn btn-white btn-round btn-just-icon">
        <i class="fa fa-plus"></i>
        </button></h4>
      </div>
      <div class="card-body">


        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">

              <th>Image</th>
              <th>หัวข้อ</th>

              <th>สถานะ ปิด/เปิด</th>

              <th></th>
            </thead>
            <tbody>


              @if($objs)
                @foreach($objs as $u)

                <tr id="{{$u->id}}">
                  <td>
                  <img src="{{url('assets/home/img/slide/'.$u->image)}}" class="img-thumbnail" style="height:200px;" />
                  </td>
                  <td>
                    {{$u->name}}
                  </td>


                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" @if($u->slide_status == 1)
                          checked="checked"
                          @endif>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </td>



                  <td class="td-actions text-right">
                    <button type="button" onclick="window.location.href = '{{url('admin/slide/'.$u->id.'/edit')}}';" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                      <i class="material-icons">edit</i>
                    </button>
                    <button onclick="window.location.href = '{{url('admin/slide_del/'.$u->id)}}';" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
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
            url:'{{url('api_slide_status')}}',
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
