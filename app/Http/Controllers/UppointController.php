<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\join_content;
use App\user_event;
use App\list_point;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class UppointController extends Controller
{
    //

    public function up_point(){

      $objs = DB::table('join_contents')->select(
                    'join_contents.*',
                    'join_contents.id as id_o',
                    'join_contents.created_at as created_ats',
                    'users.name',
                    'events.e_name',
                    'users.avatar',
                    'users.provider',
                    'events.e_image'
                    )
            ->leftjoin('users', 'users.id',  'join_contents.user_id')
            ->leftjoin('events', 'events.id',  'join_contents.events_id')
            ->orderby('join_contents.id', 'desc')
            ->paginate(15);

          //  dd($objs);


      $data['objs'] = $objs;
        return view('admin.up_point.index', $data);

    }

    public function edit_up_poiunt(Request $request, $id){

      $join_status = $request['join_status'];

      $join_content = DB::table('join_contents')
       ->where('id', $id)
       ->first();

       $user_id = $join_content->user_id;
       $event_id = $join_content->events_id;
       $code_ch = $id.'_up_point';

      $get_event = DB::table('events')
       ->where('id', $event_id)
       ->first();

      $package = join_content::find($id);
      $package->join_status = $request['join_status'];
      $package->save();

      if($join_status == 0){

        $count_step1 = DB::table('user_events')
         ->where('user_id', $user_id)
         ->where('event_id', $event_id)
         ->count();

         if($count_step1 == 0){
         }else{
           DB::table('user_events')
             ->where('user_id', $user_id)
             ->where('event_id', $event_id)
             ->update(['join_admin' => 0]);


             $count_step2 = DB::table('list_points')
              ->where('data_check', $code_ch)
              ->where('user_id', $user_id)
              ->count();

              if($count_step2 == 0){
              }else{

                DB::table('list_points')
                  ->where('data_check', $code_ch)
                  ->update(['list_points_status' => 0]);

                  $balance = DB::table('list_points')
                   ->where('user_id', $user_id)
                   ->where('list_points_status', 1)
                   ->sum('get_point');

                   DB::table('users')
                     ->where('id', $user_id)
                     ->update(['user_point' => $balance]);

              }

         }



        return redirect(url('admin/up_point/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
      }elseif($join_status == 1){


        $count_step1 = DB::table('user_events')
         ->where('user_id', $user_id)
         ->where('event_id', $event_id)
         ->count();

        // dd($count_step1);

         /// check step 1
         if($count_step1 == 0){

           $obj = new user_event();
           $obj->user_id = $user_id;
           $obj->event_id = $event_id;
           $obj->join_admin = 1;
           $obj->save();

           $count_step2 = DB::table('list_points')
            ->where('data_check', $code_ch)
            ->where('user_id', $user_id)
            ->count();

           /// check step 2
           if($count_step2 == 0){

             $package = new list_point();
             $package->detail_data = 'ร่วมกิจกรรม : '.$get_event->e_name;
             $package->admin_id = Auth::user()->id;
             $package->get_point = $get_event->e_point;
             $package->list_points_status = 1;
             $package->data_check = $code_ch;
             $package->user_id = $user_id;
             $package->save();

             $balance = DB::table('list_points')
              ->where('user_id', $user_id)
              ->where('list_points_status', 1)
              ->sum('get_point');

              DB::table('users')
                ->where('id', $user_id)
                ->update(['user_point' => $balance]);

           }else{

             DB::table('list_points')
               ->where('data_check', $code_ch)
               ->update(['list_points_status' => 1]);

               $balance = DB::table('list_points')
                ->where('user_id', $user_id)
                ->where('list_points_status', 1)
                ->sum('get_point');

                DB::table('users')
                  ->where('id', $user_id)
                  ->update(['user_point' => $balance]);

           }

           /// end check step 2

         }else{

           DB::table('user_events')
             ->where('user_id', $user_id)
             ->where('event_id', $event_id)
             ->update(['join_admin' => 1]);

             $count_step2 = DB::table('list_points')
              ->where('data_check', $code_ch)
              ->where('user_id', $user_id)
              ->count();

              if($count_step2 > 0){

                DB::table('list_points')
                  ->where('data_check', $code_ch)
                  ->update(['list_points_status' => 1]);

                  $balance = DB::table('list_points')
                   ->where('user_id', $user_id)
                   ->where('list_points_status', 1)
                   ->sum('get_point');

                   DB::table('users')
                     ->where('id', $user_id)
                     ->update(['user_point' => $balance]);

              }

         }

        // dd($count_step1);



        return redirect(url('admin/up_point/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

      }else{


        $count_step1 = DB::table('user_events')
         ->where('user_id', $user_id)
         ->where('event_id', $event_id)
         ->count();

         if($count_step1 == 0){
         }else{
           DB::table('user_events')
             ->where('user_id', $user_id)
             ->where('event_id', $event_id)
             ->update(['join_admin' => 0]);


             $count_step2 = DB::table('list_points')
              ->where('data_check', $code_ch)
              ->where('user_id', $user_id)
              ->count();

              if($count_step2 == 0){
              }else{

                DB::table('list_points')
                  ->where('data_check', $code_ch)
                  ->update(['list_points_status' => 0]);

                  $balance = DB::table('list_points')
                   ->where('user_id', $user_id)
                   ->where('list_points_status', 1)
                   ->sum('get_point');

                   DB::table('users')
                     ->where('id', $user_id)
                     ->update(['user_point' => $balance]);

              }

         }


        return redirect(url('admin/up_point/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
      }





    }















}
