@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')


<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">แก้ไขข้อมูลส่วนตัว</h4>
      </div>
      <div class="card-body">
        <form class="form-horizontal" action="{{$url}}" method="post" enctype="multipart/form-data">
            {{ method_field($method) }}
						{{ csrf_field() }}
          <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating">ชื่อ-นามสกุล</label>
                <input type="text" class="form-control" name="name" value="{{ $objs->name }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating">อีเมล</label>
                <input type="email" class="form-control" name="email" value="{{ $objs->email }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating">รหัสพนักงาน</label>
                <input type="text" class="form-control" name="id_card_no" value="{{ $objs->zipcode }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating">เบอร์โทรศัพท์มือถือ</label>
                <input type="text" class="form-control" name="phone" value="{{ $objs->phone }}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ระดับพนักงาน</label>
                <select name="level_employee" class="form-control mb-md" required>

															<option value="2"  @if( $objs->role_id == 2)
															 selected='selected'
															 @endif>Employee</option>
															<option value="1"  @if( $objs->role_id == 1)
															 selected='selected'
															 @endif>manager</option>
														</select>
              </div>
            </div>
          </div>



          <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
          <div class="clearfix"></div>
        </form>
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
            <img src="{{$objs->avatar}}" alt="{{$objs->name}}" class="img">
          @endif

        </a>
      </div>
      <div class="card-body">

        <h4 class="card-title">{{$objs->name}}</h4>

        <a href="#pablo" class="btn btn-primary btn-round">
              @if($objs->role_id == 1)
              Manager
              @else
              Employee
              @endif</a>
      </div>
    </div>
  </div>
</div>


@stop

@section('scripts')




@stop('scripts')
