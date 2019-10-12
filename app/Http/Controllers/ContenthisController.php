<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\join_content;
use Auth;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class ContenthisController extends Controller
{
    //
    public function join_content_his(){

      if (Auth::check()){

        $data1 = DB::table('join_contents')->where('user_id', Auth::user()->id)
          ->where('events_id', 5)
          ->first();
        $data['data1'] = $data1;

        $data2 = DB::table('join_contents')->where('user_id', Auth::user()->id)
          ->where('events_id', 6)
          ->first();
        $data['data2'] = $data2;

        $data3 = DB::table('join_contents')->where('user_id', Auth::user()->id)
          ->where('events_id', 8)
          ->first();
        $data['data3'] = $data3;

        $data4 = DB::table('join_contents')->where('user_id', Auth::user()->id)
          ->where('events_id', 7)
          ->first();
        $data['data4'] = $data4;

        $data5 = DB::table('join_contents')->where('user_id', Auth::user()->id)
          ->where('events_id', 9)
          ->first();
        $data['data5'] = $data5;

        $data6 = DB::table('join_contents')->where('user_id', Auth::user()->id)
          ->where('events_id', 10)
          ->first();
        $data['data6'] = $data6;

        $data7 = DB::table('join_contents')->where('user_id', Auth::user()->id)
          ->where('events_id', 11)
          ->first();
        $data['data7'] = $data7;

        $data8 = DB::table('join_contents')->where('user_id', Auth::user()->id)
          ->where('events_id', 12)
          ->first();
        $data['data8'] = $data8;


      }else{

      }





      $data['obj'] = 'join_content_his';
      return view('join_content_his', $data);
    }


    public function thx_join_events(){
      $data['obj'] = 'join_content_his';
      return view('thx_join', $data);
    }

    public function add_photo_events(Request $request){



      $user_id = $request['user_id'];

      $events_id = $request['event_id'];



      /////// image

      if($events_id == 5){
        $get_iamge = 'unlock_img02.png';
      }elseif($events_id == 6){
        $get_iamge = 'test_events10.png';
      }elseif($events_id == 8){
        $get_iamge = 'test_events7.png';
      }elseif($events_id == 7){
        $get_iamge = 'event_vam.png';
      }elseif($events_id == 9){
        $get_iamge = 'Untitled-8.png';
      }elseif($events_id == 10){
        $get_iamge = 'Untitled-2.png';
      }elseif($events_id == 11){
        $get_iamge = 'Untitled-3.png';
      }elseif($events_id == 12){
        $get_iamge = 'Untitled-4.png';
      }else{
        $get_iamge = 'Untitled-4.png';
      }

      $data['get_iamge'] = $get_iamge;

      ////// image


      $get_count = DB::table('join_contents')
            ->where('user_id', $user_id)
            ->where('events_id', $events_id)
            ->count();


        if($get_count > 0){

          //เช็คว่ามี user นี้หรือไม่ จากนั้น เช็คว่า user นี้มี events นี้หรือไม่


                  //ถ้ามี ให้มาเช็คสถานะ 0 รอการยืนยัน 1 สำเร็จแล้ว 3 อัพโหลดใหม่

                  $get_users = DB::table('join_contents')
                    ->where('user_id', $user_id)
                    ->where('events_id', $events_id)
                    ->first();

                    if($get_users->join_status == 0){

                      $data['get_users'] = $get_users;
                      $data['text_show'] = 'รอการตรวจสอบ';
                      $data['text_show2'] = 'Events นี้ท่านได้ทำการส่งข้อมูลมาแล้ว';
                      return view('thx_join', $data);

                    }

                    if($get_users->join_status == 1){

                      $data['get_users'] = $get_users;
                      $data['text_show'] = 'ผ่าน! แสดงความยินดีด้วย';
                      $data['text_show2'] = 'คุณได้รับ TP เรียบร้อยแล้ว';
                      return view('thx_join', $data);

                    }


                    if($get_users->join_status == 3){

                      $file_path = 'assets/home/img/regis/'.$get_users->image;
                      unlink($file_path);

                      $this->validate($request, [
                          'myfile' => 'required|max:8048'
                      ]);

                      $image = $request->file('myfile');
                      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

                      $img = Image::make($image->getRealPath());
                      $img->resize(800, 800, function ($constraint) {
                      $constraint->aspectRatio();
                    })->save('assets/home/img/regis/'.$input['imagename']);

                      $package = join_content::find($get_users->id);
                      $package->join_status = 0;
                      $package->image = $input['imagename'];
                      $package->save();

                      $data['get_users'] = $package;
                      $data['text_show'] = 'อัพโหลดรูปภาพ สำเร็จ!';
                      $data['text_show2'] = 'รอการตรวจสอบจากทีมงาน ภายใน 1-2 วัน';
                      return view('thx_join', $data);

                    }

                  //  dd($get_users);



        }else{


          $this->validate($request, [
              'myfile' => 'required|max:8048'
          ]);

          $image = $request->file('myfile');
          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(800, 800, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/home/img/regis/'.$input['imagename']);


         $package = new join_content();
         $package->user_id = $request['user_id'];
         $package->events_id = $request['event_id'];
         $package->image = $input['imagename'];
         $package->save();



         $get_users = DB::table('join_contents')
           ->where('id', $package->id)
           ->first();
         $data['get_users'] = $get_users;
         $data['text_show'] = 'อัพโหลดรูปภาพ สำเร็จ!';
         $data['text_show2'] = 'รอการตรวจสอบจากทีมงาน ภายใน 1-2 วัน';
         return view('thx_join', $data);


        }



      //$input['imagename'] = time().'.'.$image->getClientOriginalExtension();





      dd($request->all());
    }
}
