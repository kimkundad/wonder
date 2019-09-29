<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\vam;
use App\user_event;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;
use App\qrcode;

class VamsController extends Controller
{
    public function vampire_admin(){

      $check_count = DB::table('vams')
        ->count();

        $data['count_vam'] = $check_count;

        $b_a = vam::where('group_blood', 'A')
      ->groupBy('id_card')
      ->get()
          ->count();
      $data['b_a'] = $b_a;

      $b_b = vam::where('group_blood', 'B')
      ->groupBy('id_card')
      ->get()
          ->count();
      $data['b_b'] = $b_b;

      $b_ab = vam::where('group_blood', 'AB')
      ->groupBy('id_card')
      ->get()
          ->count();
      $data['b_ab'] = $b_ab;

      $b_o = vam::where('group_blood', 'O')
      ->groupBy('id_card')
      ->get()
          ->count();
      $data['b_o'] = $b_o;

      $objs = DB::table('vams')
                  ->select(
                    'vams.*',
                    'vams.id as id_user',
                    'users.*',
                    'vams.name as names',
                    'vams.email as emails',
                    'vams.phone as phones',
                    'user_events.*',
                    'vams.created_at as created_ats'
                  )
                  ->leftjoin('users', 'users.code_user',  'vams.qrcode')
                  ->leftjoin('user_events', 'user_events.user_id',  'users.id')
                  ->groupBy('vams.qrcode')
                 ->orderBy('vams.id', 'desc')
                 ->paginate(15);


                 $get_come = DB::table('vams')
                             ->select(
                               'vams.*',
                               'vams.id as id_user',
                               'users.*',
                               'vams.name as names',
                               'vams.email as emails',
                               'vams.phone as phones',
                               'user_events.*',
                               'vams.created_at as created_ats'
                             )
                             ->leftjoin('users', 'users.code_user',  'vams.qrcode')
                             ->leftjoin('user_events', 'user_events.user_id',  'users.id')
                             ->where('user_events.join_admin', 1)
                             ->where('user_events.event_id', 2)
                            ->orderBy('vams.id', 'desc')
                            ->count();

    //  $objs = vam::paginate(15);
      $data['objs'] = $objs;
      $data['get_come'] = $get_come;
        return view('admin.vamp.index', $data);

    }


    public function event1(){

      $objs = DB::table('users')
          ->select(
          'users.*',
          'users.id as id_user',
          'users.created_at as created_ats',
          'user_events.*'
          )
          ->leftjoin('user_events', 'user_events.user_id',  'users.id')
          ->where('user_events.event_id', 3)
          ->paginate(15);

          $count_user = DB::table('users')
              ->select(
              'users.*',
              'users.id as id_user',
              'users.created_at as created_ats',
              'user_events.*'
              )
              ->leftjoin('user_events', 'user_events.user_id',  'users.id')
              ->where('user_events.event_id', 3)
              ->count();



              $data['objs'] = $objs;
        $data['count'] = $count_user;
        $data['datahead'] = "รายชื่อลูกค้า";

      return view('admin.event1.index', $data);
    }

    public function api_event1_status(Request $request){


      $count_user = DB::table('user_events')
          ->where('user_id', $request->user_id)
          ->where('event_id', 3)
          ->count();

        //  dd($count_user);

        if($count_user > 0){

          $check = DB::table('user_events')
          ->where('user_id', $request->user_id)
          ->where('event_id', 3)
          ->first();

        //  $user = user_event::findOrFail($request->user_id);

                    if($check->join_admin == 1){

                      DB::table('user_events')
                        ->where('user_id', $request->user_id)
                        ->where('event_id', 3)
                        ->update(['join_admin' => 0]);
                      //  $user->join_admin = 0;
                    } else {
                      //  $user->join_admin = 1;
                      DB::table('user_events')
                        ->where('user_id', $request->user_id)
                        ->where('event_id', 3)
                        ->update(['join_admin' => 1]);
                    }

            return response()->json([
            'data' => [
              'success' => true,
            ]
          ]);

        }else{

           $package = new user_event();
           $package->user_id = $request->user_id;
           $package->event_id = 3;
           $package->join_admin = 1;

           return response()->json([
           'data' => [
             'success' => $package->save(),
           ]
         ]);

        }


    }


    public function search_event1(Request $request){
      $search_text = $request['search'];


      if($search_text == null){

        $objs = DB::table('users')
            ->select(
            'users.*',
            'users.id as id_user',
            'users.created_at as created_ats',
            'user_events.*'
            )
            ->leftjoin('user_events', 'user_events.user_id',  'users.id')
            ->where('user_events.event_id', 3)
            ->paginate(15)
            ->withPath('?search=' . $search_text);


      }else{


        $objs = DB::table('users')
            ->select(
            'users.*',
            'users.id as id_user',
            'users.created_at as created_ats',
            'user_events.*'
            )
            ->leftjoin('user_events', 'user_events.user_id',  'users.id')
            ->Where('users.code_user','LIKE','%'.$search_text.'%')
            ->where('user_events.event_id', 3)
            ->paginate(15)
            ->withPath('?search=' . $search_text);


      }

      $objs = $objs;

             return view('admin.event1.search_event1', compact(['objs']))
             ->with('search_text', $search_text);


    }


    public function search_vam(Request $request){
      $search_text = $request['search'];

      if($search_text == null){

        $cat = DB::table('vams')
                    ->select(
                      'vams.*',
                      'vams.id as id_user',
                      'users.*',
                      'vams.name as names',
                      'vams.email as emails',
                      'vams.phone as phones',
                      'user_events.*',
                      'vams.created_at as created_ats'
                    )
                    ->leftjoin('users', 'users.code_user',  'vams.qrcode')
                    ->leftjoin('user_events', 'user_events.user_id',  'users.id')
                    ->where('user_events.event_id', 2)
                   ->orderBy('vams.id', 'desc')
                   ->paginate(15)
                   ->withPath('?search=' . $search_text);

      }else{

        $cat = DB::table('vams')
                    ->select(
                    'vams.*',
                    'vams.id as id_user',
                    'users.*',
                    'vams.name as names',
                    'vams.email as emails',
                    'vams.phone as phones',
                    'user_events.*',
                    'vams.created_at as created_ats'
                    )
                    ->leftjoin('users', 'users.code_user',  'vams.qrcode')
                    ->leftjoin('user_events', 'user_events.user_id',  'users.id')
                   ->Where('vams.qrcode','LIKE','%'.$search_text.'%')
                   ->where('user_events.event_id', 2)
                   ->orderBy('vams.id', 'desc')
                   ->paginate(15)
                   ->withPath('?search=' . $search_text);


      }

      $objs = $cat;
             $datahead = "order สั่งสินค้า";
             return view('admin.vamp.search_vam', compact(['objs']))
             ->with('search_text', $search_text);



    }

    public function api_vam_status(Request $request){
      /*$user = vam::findOrFail($request->user_id);

                if($user->status == 1){
                    $user->status = 0;
                } else {
                    $user->status = 1;
                }
                $user->save(); */

                $get_user = DB::table('users')
                ->where('code_user', $request->user_id)
                ->first();

                //dd($get_user);

                $count_user = DB::table('user_events')
                    ->where('user_id', $get_user->id)
                    ->where('event_id', 2)
                    ->count();

                  //  dd($count_user);

                  if($count_user > 0){

                    $check = DB::table('user_events')
                    ->where('user_id', $get_user->id)
                    ->where('event_id', 2)
                    ->first();

                  //  $user = user_event::findOrFail($request->user_id);

                              if($check->join_admin == 1){

                                DB::table('user_events')
                                  ->where('user_id', $get_user->id)
                                  ->where('event_id', 2)
                                  ->update(['join_admin' => 0]);
                                //  $user->join_admin = 0;
                              } else {
                                //  $user->join_admin = 1;
                                DB::table('user_events')
                                  ->where('user_id', $get_user->id)
                                  ->where('event_id', 2)
                                  ->update(['join_admin' => 1]);
                              }

                      return response()->json([
                      'data' => [
                        'success' => true,
                      ]
                    ]);

                  }else{

                     $package = new user_event();
                     $package->user_id = $get_user->id;
                     $package->event_id = 2;
                     $package->join_admin = 1;

                     return response()->json([
                     'data' => [
                       'success' => $package->save(),
                     ]
                   ]);

                  }



      /*  return response()->json([
        'data' => [
          'success' => $user->save(),
        ]
      ]);*/



    }

    public function config_form(Request $request)
    {

    //  echo $_SERVER['REMOTE_ADDR'];

      $this->validate($request, [
       'name' => 'required',
       'id_card' => 'required|unique:vams',
       'email' => 'required|unique:vams',
       'line' => 'required',
       'phone' => 'required',
       'group_type' => 'required',
       'group_blood' => 'required',
       'sex' => 'required'
     ]);

     $name = request()->get('name');
     $id_card = request()->get('id_card');
     $year_old = request()->get('year_old');
     $line = request()->get('line');
     $phone = request()->get('phone');
     $email = request()->get('email');
     $group_type = request()->get('group_type');
     $sex = request()->get('sex');
     $group_blood = request()->get('group_blood');


     if (Auth::user()) {   // Check is user logged in

       $check_count = DB::table('user_events')
         ->where('user_id', Auth::user()->id)
         ->count();

         if($check_count == 0){
           $values = new user_event;
           $values->user_id = Auth::user()->id;
           $values->event_id = 2;
           $values->save();
         }



      } else {

      }


    $input = Input::all();
    if(Input::get('name.0') == ""){
      return back()->with('error','กรุณาใส่ ชื่อ - นามสกุล ของท่านด้วย');
    }


    $countvamp = DB::table('vams')
      ->count();
    $randomSixDigitInt = Auth::user()->code_user;
    $qrcode = $randomSixDigitInt;


    $admins = array();

    for ($idx = 0; $idx < count(Input::get('name')); $idx++)
            {


              $admins[] = [
                           'name' => $input['name'][$idx],
                           'email' => $input['email'][$idx],
                           'group_type' => $input['group_type'][$idx],
                       ];




                $values = new vam;
                $values->name = $input['name'][$idx];
                $values->id_card = $input['id_card'][$idx];
                $values->year_old = $input['year_old'][$idx];
                $values->line = $input['line'][$idx];
                $values->phone = $input['phone'][$idx];
                $values->sex = $input['sex'][$idx];
                $values->group_blood = $input['group_blood'][$idx];
                $values->email = $input['email'][$idx];
                $values->ip_address = $_SERVER['REMOTE_ADDR'];
                $values->status = 0;
                $values->qrcode = $qrcode;
                $values->group_type = $input['group_type'][$idx];
                $values->save();



            }

          //  dd(count($admins));

            for ($idx = 0; $idx < count($admins); $idx++)
            {


              // send email

                $data_toview = array();
              //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";
                $data_toview['qrcode'] = $qrcode;
                $data_toview['data'] = $admins;
                $data_toview['userss'] = $admins[$idx]['name'];
                $data_toview['email'] = $admins[$idx]['email'];


                $email_sender   = 'Support@acdicator.live';
                $email_pass     = 'WhatIs1R2B#';


             $email_to       =  $admins[$idx]['email'];
             //echo $admins[$idx]['email'];
             // Backup your default mailer
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

                         $data['emailto'] = $email_to;

                         //dd($data['emailto']);
                         $data['sender'] = $email_sender;
                         //Sender dan Reply harus sama

                         Mail::send('email.index', $data_toview, function($message) use ($data)
                         {

                           $message->from($data['sender'], 'AcmeTrader');
                           $message->to($data['emailto'])
                           ->replyTo($data['emailto'], 'บริจาคโลหิตกับกิจกรรม Acme Vampire Day#2.')
                           ->subject('ร่วมทำความดี บริจาคโลหิตกับกิจกรรม Acme Vampire Day#2');

                             //echo 'Confirmation email after registration is completed.';
                         });



             }catch(\Swift_TransportException $e){
                 $response = $e->getMessage() ;
                 echo $response;

             }


             // Restore your original mailer
             Mail::setSwiftMailer($backup);
             // send email




            }

            //  dd($admins);


    return redirect(url('vampireday/thank_you'))->with('success', $qrcode);

    }

    public function thank_you()
    {
        return view('vampireday.thx');
    }


}
