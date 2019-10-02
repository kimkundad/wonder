<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vam;
use App\User;
use App\product;
use App\option;
use App\contact;
use App\option_item;
use App\bank_payment;
use App\subscribe;
use App\gallery;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $slide = DB::table('slides')
      ->where('slide_status', 1)
      ->get();

      $data['slide'] = $slide;

        $objs = product::all();
        $data['objs'] = $objs;
        return view('welcome', $data);
    }


    public function unlock_events_shared($id){

      $user = User::find($id);
      $data['user'] = $user;
        return view('unlock1.shared_unlock', $data);
    }

    public function get_sessoin_vam(){
      Session::put('status_user', 1);

      return redirect(url('login/'))->with('contact_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    public function get_sessoin_vam2(){
    //  Session::put('status_user', 1);

      dd(Session::get('status_user'));
    }


    public function post_subscribe(Request $request){

      $this->validate($request, [
           'email' => 'required'
       ]);

       $count_sub = DB::table('subscribes')->select(
             'subscribes.*'
             )
             ->where('email', $request['email'])
             ->count();

       if($count_sub == 0){

         $package = new subscribe();
         $package->email = $request['email'];
         $package->save();

         $response = array(
             'status' => 'success',
             'msg' => 'ขอบคุณที่ Subscribe เว็บไซต์ของเรา',
         );

       }else{

         $response = array(
             'status' => 'success',
             'msg' => 'Email ของคุณอยู่ในระบบแล้ว',
         );

       }
    return response()->json($response);

    }

    public function vampireday(){

      $totalFemale = vam::where('sex',2)->where('group_type',1)->groupBy('id_card')->get()->count();
      $totalMale = vam::where('sex',1)->where('group_type',1)->groupBy('id_card')->get()->count();
      $totalUsers = vam::groupBy('id_card')->get()->count();
      $totalCC =  ($totalMale * 500) + ($totalFemale*400);
      $data = [];
      //dd($totalFemale);
      $data['totalCC'] = $totalCC;
      $data['totalUser'] = $totalUsers;
      $data['obj'] = 'vampireday';
      return view('vampireday', $data);
    }


    public function post_contact(Request $request){

      $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'detail' => 'required',
            'g-recaptcha-response' => 'required'
        ]);
        $token = $request->input('g-recaptcha-response');

        $package = new contact();
         $package->name = $request['name'];
         $package->email = $request['email'];
         $package->detail = $request['detail'];
         $package->save();

         return redirect(url('contact_success/'))->with('contact_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }

    public function vampireday_form(){
      $data['obj'] = 'vampireday';
      return view('vampireday_form', $data);
    }


    public function contact_success(){
      $data['obj'] = 'vampireday';
      return view('contact_success', $data);
    }

    public function post_confirm_payment(Request $request){

      $image = $request->file('image');
      $this->validate($request, [
           'image' => 'required|max:8048',
           'name_c' => 'required',
           'email_c' => 'required',
           'phone_c' => 'required',
           'money_c' => 'required',
           'day_tran' => 'required',
           'order_id_c' => 'required'
       ]);


       $check = DB::table('orders')
       ->where('code_order', $request['order_id_c'])
       ->count();

       if($check > 0){

         $get_code = DB::table('orders')
         ->where('code_order', $request['order_id_c'])
         ->first();

         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

         $destinationPath = asset('assets/image/product/');
         $img = Image::make($image->getRealPath());
         $img->resize(800, 800, function ($constraint) {
         $constraint->aspectRatio();
       })->save('assets/home/img/slip/'.$input['imagename']);

       $input['imagename_small'] = time().'_small.'.$image->getClientOriginalExtension();

        $img = Image::make($image->getRealPath());
        $img->resize(240, 240, function ($constraint) {
        $constraint->aspectRatio();
      })->save('assets/home/img/slip/'.$input['imagename_small']);

         $package = new bank_payment();
          $package->order_id_c = $request['order_id_c'];
          $package->name_c = $request['name_c'];
          $package->email_c = $request['email_c'];
          $package->phone_c = $request['phone_c'];
          $package->bank = $request['bank'];
          $package->image = $input['imagename'];
          $package->money_c = $request['money_c'];
          $package->day_tran = $request['day_tran'];
          $package->time_tran = $request['time_tran'];
          $package->re_mark = $request['re_mark'];
          $package->save();



          $message = $request['name_c']." ได้ทำการแจ้งชำระเงินมาที่ Order ID : ".$request['order_id_c']." เบอร์ : ".$request['phone_c'];


              $image_thumbnail_url = url('assets/home/img/slip/'.$input['imagename_small']);  // max size 240x240px JPEG
              $image_fullsize_url = url('assets/home/img/slip/'.$input['imagename']); //max size 1024x1024px JPEG
              $imageFile = 'copy/240.jpg';
              $sticker_package_id = '';  // Package ID sticker
              $sticker_id = '';    // ID sticker

              $message_data = array(
              'imageThumbnail' => $image_thumbnail_url,
              'imageFullsize' => $image_fullsize_url,
              'message' => $message,
              'imageFile' => $imageFile,
              'stickerPackageId' => $sticker_package_id,
              'stickerId' => $sticker_id
              );

            $lineapi = 'IRiZbKU5DCvEF6HxEvGnKCD5hvLgYitFM0roVALMye8';

            $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$lineapi );
            $mms =  trim($message);
            $chOne = curl_init();
            curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
            curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($chOne, CURLOPT_POST, 1);
            curl_setopt($chOne, CURLOPT_POSTFIELDS, $message_data);
            curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($chOne);
            if(curl_error($chOne)){
            echo 'error:' . curl_error($chOne);
            }else{
            $result_ = json_decode($result, true);
          //  echo "status : ".$result_['status'];
          //  echo "message : ". $result_['message'];
            }
            curl_close($chOne);



          return redirect(url('confirm_payment_success/'.$get_code->code_order))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

       }else{
          return redirect(url('confirm_payment/'))->with('error_confirm','คุณทำการเพิ่มอสังหา สำเร็จ');
       }







    }

    public function confirm_payment_success($id){

      $get_code = DB::table('bank_payments')
      ->where('order_id_c', $id)
      ->first();

      $data['objs'] = $get_code;
      return view('confirm_payment_success', $data);

    }

    public function product($id){

      $pro = DB::table('province')
      ->get();
      $data['pro'] = $pro;

      $objs = product::find($id);

      $count_image = DB::table('galleries')
      ->select(
         'galleries.*'
         )
      ->where('pro_id', $objs->id)
      ->count();

      $get_image = DB::table('galleries')
      ->select(
         'galleries.*'
         )
      ->where('pro_id', $objs->id)
      ->get();


      if($objs->p_size != 0){

        $option1 = DB::table('option_items')
        ->select(
           'option_items.*'
           )
        ->where('o_ids', $objs->p_size)
        ->get();

        $option2 = DB::table('option_items')
        ->select(
           'option_items.*'
           )
        ->where('o_ids', $objs->p_color)
        ->get();

        $data['option1'] = $option1;
        $data['option2'] = $option2;

      }else{
        $data['option1'] = null;
        $data['option2'] = null;
      }

      //dd($item);
      $data['get_image'] = $get_image;
      $data['count_image'] = $count_image;
      $data['objs'] = $objs;
      return view('product', $data);
    }

    public function payment(){
      $data['obj'] = 'payment';
      return view('payment', $data);
    }



    public function about_us(){
      $data['obj'] = 'about_us';
      return view('about', $data);
    }

    public function contact_us(){
      $data['obj'] = 'contact_us';
      return view('contact', $data);
    }

    public function terms_conditions(){
      $data['obj'] = 'terms_conditions';
      return view('terms_conditions', $data);
    }

    public function returns_exchanges(){
      $data['obj'] = 'returns_exchanges';
      return view('returns_exchanges', $data);
    }

    public function faqs(){
      $data['obj'] = 'faqs';
      return view('faqs', $data);
    }

    public function shipping_delivery_policy(){
      $data['obj'] = 'shipping_delivery_policy';
      return view('shipping_delivery_policy', $data);
    }

    public function privacy_policy(){
      $data['obj'] = 'privacy_policy';
      return view('privacy_policy', $data);
    }

    public function confirm_payment(){
      $data['obj'] = 'confirm_payment';
      return view('confirm_payment', $data);
    }


    public function blog(){
      $data['obj'] = 'blog';
      return view('blog', $data);
    }

    public function blog_post(){
      $data['obj'] = 'blog_post';
      return view('blog_post', $data);
    }

    public function quotes(){
      $data['obj'] = 'quotes';
      return view('quotes', $data);
    }

    public function events(){

      $get_code = DB::table('events')
      ->where('e_status', 1)
      ->get();

      //dd($get_code);

      $data['get_code'] = $get_code;
      return view('events', $data);
    }















}
