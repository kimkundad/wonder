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

      $objs = vam::paginate(15);
      $data['objs'] = $objs;

        return view('admin.vamp.index', $data);

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
    $randomSixDigitInt = 'VPD-'.(\random_int(1000, 9999)).'-'.(\random_int(1000, 9999)).'-'.(\random_int(1000, 9999));
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

                           $message->from($data['sender'], 'Acmeinvestor');
                           $message->to($data['emailto'])
                           ->replyTo($data['emailto'], 'บริจาคโลหิตกับกิจกรรม Acme Vampire Day.')
                           ->subject('ร่วมทำความดี บริจาคโลหิตกับกิจกรรม Acme Vampire Day');

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
