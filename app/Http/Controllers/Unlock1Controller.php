<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\unlock1;
use App\item_unlock1;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class Unlock1Controller extends Controller
{
    //


    public function unlock_events(){

      $item = DB::table('item_unlock1s')
     ->where('status', 1)
     ->orderby('sort', 'asc')
     ->get();
    //  dd($item);
      $id = 1;
      $objs = unlock1::find($id);

      $data['item'] = $item;
      $data['objs'] = $objs;

      return view('unlock1.index', $data);

    }


    public function api_item_unlock_status(Request $request){
    //  dd($request->user_id);
    $user = item_unlock1::findOrFail($request->user_id);

              if($user->status == 1){
                  $user->status = 0;
              } else {
                  $user->status = 1;
              }


      return response()->json([
      'data' => [
        'success' => $user->save(),
      ]
    ]);

    }

    public function edit_item_unlock($id){

      $objs = item_unlock1::find($id);

    //  dd($objs);
      $data['objs'] = $objs;
      $data['url'] = url('admin/post_edit_item_unlock/'.$id);

      return view('admin.unlock1.edit', $data);

    }

    public function post_edit_item_unlock(Request $request, $id){

      $image = $request->file('avatar');
      $this->validate($request, [
           'owner' => 'required',
           'portsize' => 'required',
           'balance' => 'required',
           'profit' => 'required',
           'mt4' => 'required',
           'inves_pass' => 'required',
           'broker' => 'required',
           'server' => 'required'
       ]);

       $url_set = $request['url'];
       if($url_set == null){
         $url_set = '#';
       }

       if($image == null){


         $package = item_unlock1::find($id);
          $package->url = $url_set;
          $package->owner = $request['owner'];
          $package->portsize = $request['portsize'];
          $package->balance = $request['balance'];
          $package->profit = $request['profit'];
          $package->mt4 = $request['mt4'];
          $package->inves_pass = $request['inves_pass'];
          $package->broker = $request['broker'];
          $package->server = $request['server'];
          $package->sort = $request['sort'];
          $package->save();

       }else{


         $objs = DB::table('item_unlock1s')
        ->where('id', $id)
        ->first();

        $file_path = 'assets/home/img/avatar/'.$objs->avatar;
        unlink($file_path);


         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

         $destinationPath = asset('assets/image/product/');
         $img = Image::make($image->getRealPath());
         $img->resize(500, 500, function ($constraint) {
         $constraint->aspectRatio();
       })->save('assets/home/img/avatar/'.$input['imagename']);

         $package = item_unlock1::find($id);
          $package->url = $url_set;
          $package->avatar = $input['imagename'];
          $package->owner = $request['owner'];
          $package->portsize = $request['portsize'];
          $package->balance = $request['balance'];
          $package->profit = $request['profit'];
          $package->mt4 = $request['mt4'];
          $package->inves_pass = $request['inves_pass'];
          $package->broker = $request['broker'];
          $package->server = $request['server'];
          $package->sort = $request['sort'];
          $package->save();

       }


      return redirect(url('admin/edit_item_unlock/'.$id))->with('edit_item_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }


    public function del_item_unlock($id){

      $objs = DB::table('item_unlock1s')
     ->where('id', $id)
     ->first();

     $file_path = 'assets/home/img/avatar/'.$objs->avatar;
     unlink($file_path);

    DB::table('item_unlock1s')
    ->where('id', $id)
    ->delete();
    return redirect(url('admin/unlock_events/'))->with('del_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    public function unlock_events_creat(){

      $data['url'] = url('admin/unlock_item_post/');
      $data['method'] = "post";
      return view('admin.unlock1.create', $data);
    }

    public function unlock_admin(){

      $item = DB::table('item_unlock1s')
      ->orderby('sort', 'desc')
      ->get();

    //  $item = item_unlock1::all();
      $data['item'] = $item;

      $id = 1;
      $objs = unlock1::find($id);
      $data['objs'] = $objs;
      $data['url'] = url('admin/unlock_admin_post/');

      return view('admin.unlock1.index', $data);

    }

    public function unlock_item_post(Request $request){

      $image = $request->file('avatar');
    $this->validate($request, [
         'avatar' => 'required|max:8048',
         'owner' => 'required',
         'portsize' => 'required',
         'balance' => 'required',
         'profit' => 'required',
         'mt4' => 'required',
         'inves_pass' => 'required',
         'broker' => 'required',
         'server' => 'required'
     ]);

     $url_set = $request['url'];
     if($url_set == null){
       $url_set = '#';
     }

    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

    $destinationPath = asset('assets/image/product/');
    $img = Image::make($image->getRealPath());
    $img->resize(500, 500, function ($constraint) {
    $constraint->aspectRatio();
  })->save('assets/home/img/avatar/'.$input['imagename']);

  $package = new item_unlock1();
   $package->url = $url_set;
   $package->avatar = $input['imagename'];
   $package->owner = $request['owner'];
   $package->portsize = $request['portsize'];
   $package->balance = $request['balance'];
   $package->profit = $request['profit'];
   $package->mt4 = $request['mt4'];
   $package->inves_pass = $request['inves_pass'];
   $package->broker = $request['broker'];
   $package->server = $request['server'];
   $package->sort = $request['sort'];
   $package->save();

   return redirect(url('admin/unlock_events/'))->with('add_item_success','คุณทำการเพิ่มอสังหา สำเร็จ');


    }






    public function unlock_admin_post(Request $request){

      $id = 1;
      $package = unlock1::find($id);
       $package->text_1 = $request['text_1'];
       $package->text_2 = $request['text_2'];
       $package->text_sub_1 = $request['text_sub_1'];
       $package->text_sub_2 = $request['text_sub_2'];
       $package->time_count = $request['time_count'];
       $package->score_left_1 = $request['score_left_1'];
       $package->score_left_2 = $request['score_left_2'];
       $package->score_mid = $request['score_mid'];
       $package->score_r_1 = $request['score_r_1'];
       $package->score_r_2 = $request['score_r_2'];
       $package->save();

       return redirect(url('admin/unlock_events/'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }
}
