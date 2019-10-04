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
    <form class="navbar-form" action="{{url('admin/search_student')}}" method="GET">
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
        <h4 class="card-title ">รายชื่อลูกค้าทั้งหมด</h4>

      </div>
      <div class="card-body">


        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>#ID</th>
              <th>ชื่อผู้ใช้งาน</th>
              <th>อีเมล</th>
              <th>ผ่านทาง</th>
              <th>วันที่สมัคร</th>

              <th></th>
            </thead>
            <tbody>

              @if($objs)
                @foreach($objs as $u)

              <tr>
                <td>
                  {{$u->code_user}}
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
                  {{$u->provider}}
                </td>
                <td id="{{ $day = date('n', strtotime($u->created_at))}}">{{$u->created_at}}</td>

                <td class="td-actions text-right">
                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
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
          <div class="pagination"> {{ $objs->links() }} </div>
        </div>

      </div>
    </div>
  </div>
</div>

@stop

@section('scripts')
@stop('scripts')
