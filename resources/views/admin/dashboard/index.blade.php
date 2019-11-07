@extends('admin.layouts.template')

@section('admin.stylesheet')
@stop('admin.stylesheet')

@section('admin.content')


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">ข้อมูลของการลงทะเบียนบริจาคเลือด</h4>

      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>ก่อนโทร / หลังโทร</th>
              <th>จำนวนคนที่มา</th>
              <th>ไม่มา</th>
              <th>
                เปอร์เซ็นต์
              </th>
              <th>
                ดูข้อมูล
              </th>

            </thead>
            <tbody>

              <tr>
                <td>
                  ก่อนโทร
                </td>
                <td>
                  {{$objs}}
                </td>
                <td>
                  {{$objs_x}}
                </td>

                <td>
                  {{number_format((float)$per, 2, '.', '')}} %
                </td>
                <td>
                  <a href="{{url('admin/vam_json')}}" target="_blank">ข้อมูล</a>
                </td>
              </tr>
              <tr>
                <td>
                  หลังโทร
                </td>
                <td>
                  {{$objs1}}
                </td>
                <td>
                  {{$objs1_x}}
                </td>

                <td>
                  {{number_format((float)$per2, 2, '.', '')}} %
                </td>
                <td>
                  <a href="{{url('admin/vam_json2')}}" target="_blank">ข้อมูล</a>
                </td>
              </tr>


            </tbody>

          </table>
        </div>

      </div>
    </div>
  </div>
</div>


@stop

@section('scripts')
@stop('scripts')
