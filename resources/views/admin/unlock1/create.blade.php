@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')


<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">เพิ่ม Item Unlock</h4>
      </div>
      <div class="card-body">
        <form class="form-horizontal" action="{{$url}}" method="post" enctype="multipart/form-data">
            {{ method_field($method) }}
						{{ csrf_field() }}
          <div class="row">

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">owner</label>
                <input type="text" class="form-control" name="owner" value="{{old('owner')}}">
              </div>
            </div>

            <div class="col-md-12">
              <br />
              <label class="bmd-label-floating">Image item unlock1</label>
                <input type="file" name="avatar" >
                <hr />
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">portsize</label>
                <input type="text" class="form-control" name="portsize" value="{{old('portsize')}}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">balance</label>
                <input type="text" class="form-control" name="balance" value="{{old('balance')}}">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">profit</label>
                <input type="text" class="form-control" name="profit" value="{{old('profit')}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">mt4</label>
                <input type="text" class="form-control" name="mt4" value="{{old('mt4')}}">
              </div>
            </div>





            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">inves_pass</label>
                <input type="text" class="form-control" name="inves_pass" value="{{old('inves_pass')}}">
              </div>
            </div>



            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">broker</label>
                <input type="text" class="form-control" name="broker" value="{{old('broker')}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">server</label>
                <input type="text" class="form-control" name="server" value="{{old('server')}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">url</label>
                <input type="text" class="form-control" name="url" value="{{old('url')}}">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">ลำดับการแสดง</label>
                <input type="text" class="form-control" name="sort" value="{{old('sort')}}">
              </div>
            </div>



          </div>



          <button type="submit" class="btn btn-primary pull-right">บันทึกข้อมูล</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-4">

  </div>
</div>


@stop

@section('scripts')




@stop('scripts')
