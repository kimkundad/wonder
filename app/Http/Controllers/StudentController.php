<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\User;

class StudentController extends Controller
{
    //
    public function index(){

      $objs = DB::table('users')
          ->select(
          'users.*',
          'users.id as id_user',
          'role_user.*'
          )
          ->leftjoin('role_user', 'role_user.user_id',  'users.id')
          ->where('role_user.role_id', 3)
          ->orderby('users.id', 'desc')
          ->paginate(15);

          $count_user = DB::table('users')
              ->select(
              'users.*',
              'users.id as id_user',
              'role_user.*'
              )
              ->leftjoin('role_user', 'role_user.user_id',  'users.id')
              ->where('role_user.role_id', 3)
              ->count();

            //  dd($objs);

              $data['objs'] = $objs;
        $data['count'] = $count_user;
        $data['datahead'] = "รายชื่อลูกค้า";

      return view('admin.student.index', $data);
    }
}
