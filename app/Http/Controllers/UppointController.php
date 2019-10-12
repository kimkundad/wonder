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
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;

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


       $user_pro = DB::table('users')
        ->where('id', $user_id)
        ->first();

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





         // send email
             $data_toview = array();
           //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";

           date_default_timezone_set("Asia/Bangkok");


           $data_toview['user_name'] = $user_pro->name;

           $data_toview['email_re'] = $user_pro->email;
           $data_toview['event_name'] = $get_event->e_name;
          $data_toview['image'] = $join_content->image;

           $data_toview['datatime'] = date("d-m-Y H:i:s");

             $email_sender   = 'Support@acdicator.live';
             $email_pass     = 'WhatIs1R2B#';


             $email_to       =  $user_pro->email;

             $backup = \Mail::getSwiftMailer();

             try{

                         //https://accounts.google.com/DisplayUnlockCaptcha
                         // Setup your gmail mailer
                         $transport = new \Swift_SmtpTransport('smtp.gmail.com', 465, 'SSL');
                         $transport->setUsername($email_sender);
                         $transport->setPassword($email_pass);

                         // Any other mailer configuration stuff needed...
                         $gmail = new Swift_Mailer($transport);

                         // Set the mailer as gmail
                         \Mail::setSwiftMailer($gmail);

                         $data['emailto'] = $email_sender;
                         $data['sender'] = $email_to;
                         //Sender dan Reply harus sama



                         Mail::send('mails.reject', $data_toview, function($message) use ($data)
                         {
                             $message->from($data['emailto'], 'AcmeTrader.');
                             $message->to($data['sender'])
                             ->replyTo($data['sender'], 'AcmeTrader.')
                             ->subject('คุณได้ทำรายการจาก AcmeTrader.');

                             //echo 'Confirmation email after registration is completed.';
                         });

             }catch(\Swift_TransportException $e){
                 $response = $e->getMessage() ;
                 echo $response;

             }


             // Restore your original mailer
             Mail::setSwiftMailer($backup);
             // send email













        return redirect(url('admin/up_point/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
      }





    }















}
