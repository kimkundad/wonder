<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\order;
use App\user_event;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function user_profile(){

      $user = User::find(Auth::user()->id);
      $data['objs'] = $user;
      return view('user_profile.user_profile', $data);
    }

    public function buy_history(){
      $user = User::find(Auth::user()->id);
      $data['objs'] = $user;

      $order = DB::table('orders')->select(
                    'orders.*',
                    'orders.id as id_de',
                    'orders.created_at as created_ats',
                    'products.*'
                    )
            ->leftjoin('products', 'products.id',  'orders.product_id')
            ->where('orders.user_id', Auth::user()->id)
            ->get();
      $data['order'] = $order;
      //dd($order);

      return view('user_profile.buy_history', $data);
    }

    public function user_point(){
      $user = User::find(Auth::user()->id);
      $data['objs'] = $user;
      return view('user_profile.user_point', $data);
    }

    public function payment_history(){

      $order = DB::table('bank_payments')->select(
                    'bank_payments.*',
                    'bank_payments.id as id_babk',
                    'orders.*',
                    'orders.id as id_de',
                    'orders.created_at as created_ats',
                    'products.*'
                    )
            ->leftjoin('orders', 'orders.code_order',  'bank_payments.order_id_c')
            ->leftjoin('products', 'products.id',  'orders.product_id')
            ->where('orders.user_id', Auth::user()->id)
            ->get();

          //  dd($order);
      $data['order'] = $order;


      $user = User::find(Auth::user()->id);
      $data['objs'] = $user;
      return view('user_profile.payment_history', $data);
    }

    public function events_history(){

      $get_event = DB::table('user_events')->select(
            'user_events.event_id',
            'user_events.created_at as created_ats',
            'events.*',
            'events.id as id_events'
            )
            ->leftjoin('events', 'events.id',  'user_events.event_id')
            ->where('user_events.user_id', Auth::user()->id)
            ->get();

            $data['get_event'] = $get_event;


          //  dd($get_event);

      $user = User::find(Auth::user()->id);
      $data['objs'] = $user;
      return view('user_profile.events_history', $data);
    }




    public function submit_product(Request $request, $id){

      $this->validate($request, [
           'name_re' => 'required',
           'phone_re' => 'required',
           'address_re' => 'required',
           'pro_id_re' => 'required',
           'zip_re' => 'required'
       ]);

        $randomSixDigitInt = (\random_int(1000000, 9999999));

        $package = new order();
        $package->user_id = Auth::user()->id;
        $package->product_id = $request['product_id'];
        $package->code_order = $randomSixDigitInt;
        $package->name_re = $request['name_re'];
        $package->phone_re = $request['phone_re'];
        $package->email_re = $request['email_re'];
        $package->address_re = $request['address_re'];
        $package->pro_id_re = $request['pro_id_re'];
        $package->zip_re = $request['zip_re'];
        $package->option1 = $request['option1'];
        $package->option2 = $request['option2'];
        $package->save();

        $message = $request['name_re']." มีการสั่งซื้อสินค้าเข้ามาใหม่ Order ID : ".$randomSixDigitInt." เบอร์ : ".$request['phone_re'];
        $lineapi = 'dff88NRNPnTuthud4kekuivCRIr7k6Rv5SYczXjqq3h';

        $mms =  trim($message);
        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=$mms");
        curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'',);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);
        if(curl_error($chOne)){
        echo 'error:' . curl_error($chOne);
        }else{
        $result_ = json_decode($result, true);
    //    echo "status : ".$result_['status'];
    //    echo "message : ". $result_['message'];
        }
        curl_close($chOne);




        $order = DB::table('orders')->select(
              'orders.*'
              )
              ->where('id', $package->id)
              ->first();


              $product = DB::table('products')->select(
                    'products.*'
                    )
                    ->where('id', $order->product_id)
                    ->first();

                    $prov = DB::table('province')->select(
                          'province.*'
                          )
                          ->where('PROVINCE_ID', $order->pro_id_re)
                          ->first();


        ////////////////////////////////////////////////////////////////////////////////////


        // send email
            $data_toview = array();
          //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";

          date_default_timezone_set("Asia/Bangkok");

          $data_toview['name_pro'] = $product->p_name;
          $data_toview['price_pro'] = $product->p_pricec;
          $data_toview['order_id'] = $order->code_order;

          $data_toview['name_re'] = $order->name_re;
          $data_toview['phone_re'] = $order->phone_re;
          $data_toview['email_re'] = $order->email_re;
          $data_toview['address_re'] = $order->address_re;
          $data_toview['prov'] = $prov->PROVINCE_NAME;
          $data_toview['zip_code'] = $order->zip_re;

          $data_toview['datatime'] = date("d-m-Y H:i:s");

            $email_sender   = 'Support@acdicator.live';
            $email_pass     = 'WhatIs1R2B#';


            $email_to       =  $request['email_re'];

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

                        Mail::send('mails.index', $data_toview, function($message) use ($data)
                        {
                            $message->from($data['sender'], 'Acdicator Co.,Ltd.');
                            $message->to($data['sender'])
                            ->replyTo($data['sender'], 'Acdicator Co.,Ltd..')
                            ->subject('มีรายการใหม่จาก Acdicator Co.,Ltd.');

                            //echo 'Confirmation email after registration is completed.';
                        });


                        Mail::send('mails.index', $data_toview, function($message) use ($data)
                        {
                            $message->from($data['sender'], 'Acdicator Co.,Ltd.');
                            $message->to($data['emailto'])
                            ->replyTo($data['sender'], 'Acdicator Co.,Ltd..')
                            ->subject('คุณได้ทำรายการจาก Acdicator Co.,Ltd.');

                            //echo 'Confirmation email after registration is completed.';
                        });

            }catch(\Swift_TransportException $e){
                $response = $e->getMessage() ;
                echo $response;

            }


            // Restore your original mailer
            Mail::setSwiftMailer($backup);
            // send email


            $order = DB::table('orders')->select(
                  'orders.*'
                  )
                  ->where('id', $package->id)
                  ->first();


                  $product = DB::table('products')->select(
                        'products.*'
                        )
                        ->where('id', $order->product_id)
                        ->first();


                        $data['order'] = $order;
                        $data['product'] = $product;
                        return view('payment_success', $data);

    }













}
