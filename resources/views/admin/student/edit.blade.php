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
              <th>Point คงเหลือ</th>
            </tr>
          </thead>
          <tbody {{$s = 0}}>

            @if(isset($order))
              @foreach($order as $u)


              <tr {{$s+=$u->get_point}}>

                <td>
                  <p class="theme-account-history-type-title">{{$u->get_event->e_name}}</p>
                  <a class="theme-account-history-item-name" href="{{url($u->get_event->e_url)}}" target="_blank">ดูรายละเอียด</a>
                </td>
                <td>
                  <a href="#" style="color:#d4147d"><b><i class="fa fa-plus"></i> {{$u->get_point}}</b></a>
                </td>
                <td class="theme-account-history-tr-date">
                  <p class="theme-account-history-date">{{$u->created_at}}</p>
                </td>
                <td>
                  <p class="theme-account-history-item-price">{{number_format($s)}}</p>
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
</script>



@stop('scripts')
