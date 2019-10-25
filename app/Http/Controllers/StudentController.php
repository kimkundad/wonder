<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\User;
use App\rfid;
use Redirect;

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

    public function add_rfid_user(Request $request){
      $rfid_key = $request['rfid_key'];
      $user_id = $request['user_id'];

      $count_rfid = DB::table('rfids')
          ->where('rfid_key', $rfid_key)
          ->count();

      if($count_rfid == 0){
        $package = new rfid();
        $package->rfid_key = $rfid_key;
        $package->user_id = $user_id;
        $package->save();
      }



       return redirect(url('admin/user_data/'.$user_id))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

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

        $check_count = DB::table('users')->select(
               'users.*'
               )
                   ->Where('users.name','LIKE','%'.$search_text.'%')
                   ->orWhere('users.code_user','LIKE','%'.$search_text.'%')
                   ->orWhere('users.phone','LIKE','%'.$search_text.'%')
                   ->orWhere('users.email','LIKE','%'.$search_text.'%')
                   ->count();

                   if($check_count > 0){

                     $objs = DB::table('users')->select(
                            'users.*'
                            )
                                ->Where('users.name','LIKE','%'.$search_text.'%')
                                ->orWhere('users.code_user','LIKE','%'.$search_text.'%')
                                ->orWhere('users.phone','LIKE','%'.$search_text.'%')
                                ->orWhere('users.email','LIKE','%'.$search_text.'%')
                                ->paginate(15)
                                ->withPath('?search_text=' . $search_text);

                   }else{

                     $get_data = DB::table('rfids')
                                ->Where('rfid_key', $search_text)
                                ->first();

                                if($get_data != null){
                                  $objs = DB::table('users')->select(
                                         'users.*'
                                         )
                                             ->whereIn('users.id', [$get_data->user_id])
                                             ->paginate(15)
                                             ->withPath('?search_text=' . $search_text);
                                }else{
                                  $objs = null;
                                }




                   }




      }



      return view('admin.student.search', compact(['objs']))
      ->with('search_text', $search_text)
      ->with('count', $count_user);

    }

    public function del_rfid($id){

      DB::table('rfids')
      ->where('id', $id)
      ->delete();

      return Redirect::back()->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }

    public function user_data($id){

      $get_rfid = DB::table('rfids')
            ->where('user_id', $id)
            ->get();

          //  dd($get_rfid);

            $data['get_rfid'] = $get_rfid;

      $order = DB::table('list_points')
            ->where('user_id', $id)
            ->get();




            $data['order'] = $order;

      $objs = User::find($id);

      $data['objs'] = $objs;
      return view('admin.student.edit', $data);
    }




















}
