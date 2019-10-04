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

    public function search_student(Request $request){

      $search_text = $request['search'];

      $count_user = DB::table('users')
          ->select(
          'users.*',
          'users.id as id_user',
          'role_user.*'
          )
          ->leftjoin('role_user', 'role_user.user_id',  'users.id')
          ->where('role_user.role_id', 3)
          ->count();

      if($search_text == null){

        $objs = null;

      }else{

        $objs = DB::table('users')->select(
               'users.*'
               )
                   ->Where('users.name','LIKE','%'.$search_text.'%')
                   ->orWhere('users.code_user','LIKE','%'.$search_text.'%')
                   ->orWhere('users.phone','LIKE','%'.$search_text.'%')
                   ->orWhere('users.email','LIKE','%'.$search_text.'%')
                   ->paginate(15)
                   ->withPath('?search_text=' . $search_text);

      }



      return view('admin.student.search', compact(['objs']))
      ->with('search_text', $search_text)
      ->with('count', $count_user);

    }




















}
