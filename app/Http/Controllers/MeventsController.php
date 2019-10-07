<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\vam;
use App\user_event;
use App\list_point;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;
use App\qrcode;

class MeventsController extends Controller
{
    //


    public function event1(){

      $objs = DB::table('users')
          ->select(
          'users.*',
          'users.id as id_user',
          'users.created_at as created_ats',
          'user_events.*'
          )
          ->leftjoin('user_events', 'user_events.user_id',  'users.id')
          ->where('user_events.event_id', 4)
          ->paginate(15);

          $count_user = DB::table('users')
              ->select(
              'users.*',
              'users.id as id_user',
              'users.created_at as created_ats',
              'user_events.*'
              )
              ->leftjoin('user_events', 'user_events.user_id',  'users.id')
              ->where('user_events.event_id', 4)
              ->count();



        $data['objs'] = $objs;
        $data['count'] = $count_user;
        $data['datahead'] = "รายชื่อลูกค้า";

      return view('admin.event1.index', $data);
    }


    public function add_qty2_photo(Request $request){

      $qty2 = $request['qty2'];
      $ids = $request['ids'];

      $code_ch = $ids.'_unlock_clone';

      $get_point = DB::table('events')
          ->where('id', 4)
          ->first();

      $get_count = DB::table('list_points')
            ->where('data_check',$code_ch)
            ->count();

            $get_user = DB::table('users')
            ->where('id', $request->user_id)
            ->first();

            if($qty2 > $get_count){

              $package = new list_point();
              $package->detail_data = 'ร่วมกิจกรรม : Unlock Acme and his cloner';
              $package->admin_id = Auth::user()->id;
              $package->get_point = $get_point->e_point;
              $package->list_points_status = 1;
              $package->data_check = $code_ch;
              $package->user_id = $ids;
              $package->save();

            }else{

              $get_last_data = DB::table('list_points')
                ->where('data_check', $code_ch)
                ->where('user_id', $ids)
                ->orderby('id', 'desc')
                ->first();

                DB::table('list_points')
                ->where('id', $get_last_data->id)
                ->delete();

            }

            DB::table('user_events')
              ->where('user_id', $ids)
              ->where('event_id', 4)
              ->update(['multi_mode' => $qty2]);

      return Response::json([
            'status' => 1001
        ], 200);

    }


    public function search_event2(Request $request){
      $search_text = $request['search'];


      if($search_text == null){

        $objs = null;


      }else{


        $objs = DB::table('users')
            ->select(
            'users.*',
            'users.id as id_user',
            'users.created_at as created_ats'
            )
            ->Where('users.code_user','LIKE','%'.$search_text.'%')
            ->paginate(15)
            ->withPath('?search=' . $search_text);




      }

      if(isset($objs)){
        foreach($objs as $u){

          $get_value = DB::table('user_events')
              ->where('user_events.user_id', $u->id)
              ->where('event_id', 4)
              ->first();

            if(isset($get_value)){
              $u->get_value = $get_value->join_admin;
              $u->multi_mode  = $get_value->multi_mode;
            }else{
              $u->get_value = 0;
              $u->multi_mode  = 1;
            }


        }
      }

      $objs = $objs;

             return view('admin.event1.search_event1', compact(['objs']))
             ->with('search_text', $search_text);


    }


    public function api_event2_status(Request $request){


      $get_point = DB::table('events')
          ->where('id', 4)
          ->first();

          $code_ch = $request->user_id.'_Unlock_Acme_and_his_cloner';

      $count_user = DB::table('user_events')
          ->where('user_id', $request->user_id)
          ->where('event_id', 4)
          ->count();

        //  dd($count_user);

        if($count_user > 0){

          $check = DB::table('user_events')
          ->where('user_id', $request->user_id)
          ->where('event_id', 4)
          ->first();

        //  $user = user_event::findOrFail($request->user_id);

                    if($check->join_admin == 1){

                      DB::table('user_events')
                        ->where('user_id', $request->user_id)
                        ->where('event_id', 4)
                        ->update(['join_admin' => 0]);
                      //  $user->join_admin = 0;


                    } else {
                      //  $user->join_admin = 1;
                      DB::table('user_events')
                        ->where('user_id', $request->user_id)
                        ->where('event_id', 4)
                        ->update(['join_admin' => 1]);

                    }

            return response()->json([
            'data' => [
              'success' => true,
            ]
          ]);

        }else{

           $obj = new user_event();
           $obj->user_id = $request->user_id;
           $obj->event_id = 4;
           $obj->join_admin = 1;

        // dd($obj);


           return response()->json([
           'data' => [
             'success' => $obj->save(),
           ]
         ]);

        }


    }
}
