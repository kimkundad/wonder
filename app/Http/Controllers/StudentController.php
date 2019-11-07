<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;
use App\rfid;
use App\list_point;
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
        //  ->where('role_user.role_id', 3)
          ->orderby('users.user_point', 'desc')
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

    public function del_product_user($id){

      $get_point = DB::table('list_points')
            ->where('id', $id)
            ->first();

            DB::table('list_points')
              ->where('id', $id)
              ->update(['list_points_status' => 0]);

              $balance = DB::table('list_points')
               ->where('user_id', $get_point->user_id)
               ->where('list_points_status', 1)
               ->sum('get_point');

               DB::table('users')
                 ->where('id', $get_point->user_id)
                 ->update(['user_point' => $balance]);

                 $user_id = $get_point->user_id;



            DB::table('list_points')
            ->where('id', $id)
            ->delete();


            return redirect(url('admin/user_data/'.$user_id))->with('del_product_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }

    public function add_product_user(Request $request){

      $this->validate($request, [
           'product_id' => 'required',
           'user_id' => 'required'
       ]);

      $product_id = $request['product_id'];
      $user_id = $request['user_id'];
      $randomSixDigitInt = (\random_int(1000000, 9999999));

      $get_product = DB::table('products')
            ->where('id', $product_id)
            ->first();


            $package = new list_point();
            $package->detail_data = 'ซื้อสินค้า : '.$get_product->p_name;
            $package->admin_id = Auth::user()->id;
            $package->get_point = $get_product->p_pricec;
            $package->list_points_status = 1;
            $package->data_check = $randomSixDigitInt;
            $package->user_id = $user_id;
            $package->spec_off = 1;
            $package->save();

            $balance = DB::table('list_points')
             ->where('user_id', $user_id)
             ->where('list_points_status', 1)
             ->sum('get_point');

             DB::table('users')
               ->where('id', $user_id)
               ->update(['user_point' => $balance]);

               return redirect(url('admin/user_data/'.$user_id))->with('add_product_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }

    public function add_point_user(Request $request){

      $this->validate($request, [
           'detail_point' => 'required',
           'point_total' => 'required',
           'user_id' => 'required'
       ]);

       $randomSixDigitInt = (\random_int(1000000, 9999999));

      $detail_point = $request['detail_point'];
      $point_total = $request['point_total'];
      $user_id = $request['user_id'];


      $package = new list_point();
      $package->detail_data = $detail_point;
      $package->admin_id = Auth::user()->id;
      $package->get_point = $point_total;
      $package->list_points_status = 1;
      $package->data_check = $randomSixDigitInt;
      $package->user_id = $user_id;
      $package->spec_off = 1;
      $package->save();

      $balance = DB::table('list_points')
       ->where('user_id', $user_id)
       ->where('list_points_status', 1)
       ->sum('get_point');

       DB::table('users')
         ->where('id', $user_id)
         ->update(['user_point' => $balance]);

         return redirect(url('admin/user_data/'.$user_id))->with('add_product_success','คุณทำการเพิ่มอสังหา สำเร็จ');

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


            $get_product = DB::table('products')->get();
            $data['get_product'] = $get_product;
          //  dd($get_rfid);

            $data['get_rfid'] = $get_rfid;

      $order = DB::table('list_points')
            ->where('user_id', $id)
            ->orderby('id','desc')
            ->get();




            $data['order'] = $order;

      $objs = User::find($id);

      $data['objs'] = $objs;
      return view('admin.student.edit', $data);
    }




















}
