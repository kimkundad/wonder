<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = Events::all();
        $data['objs'] = $objs;
        return view('admin.events.index', $data);
    }


    public function api_event_status(Request $request){
    //  dd($request->user_id);
    $user = Events::findOrFail($request->user_id);

              if($user->e_status == 1){
                  $user->e_status = 0;
              } else {
                  $user->e_status = 1;
              }


      return response()->json([
      'data' => [
        'success' => $user->save(),
      ]
    ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['method'] = "post";
        $data['url'] = url('admin/events');
        return view('admin.events.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $image = $request->file('e_image');
      $this->validate($request, [
           'e_image' => 'required|max:8048',
           'e_name' => 'required',
           'e_detail' => 'required',
           'e_start' => 'required',
           'e_end' => 'required',
           'e_max_person' => 'required',
           'e_url' => 'required'
       ]);

      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

      $destinationPath = asset('assets/image/product/');
      $img = Image::make($image->getRealPath());
      $img->resize(1700, 800, function ($constraint) {
      $constraint->aspectRatio();
    })->save('assets/home/img/events/'.$input['imagename']);

    $package = new Events();
     $package->e_name = $request['e_name'];
     $package->e_detail = $request['e_detail'];
     $package->e_start = $request['e_start'];
     $package->e_end = $request['e_end'];
     $package->e_max_person = $request['e_max_person'];
     $package->e_image = $input['imagename'];
     $package->e_url = $request['e_url'];
     $package->e_point = $request['e_point'];
     $package->e_location = $request['e_location'];
     $package->e_map = $request['e_map'];
     $package->e_tags = $request['e_tags'];
     $package->e_level = $request['e_level'];
     $package->e_remark = $request['e_remark'];
     $package->e_sort = $request['e_sort'];
     $package->save();

     return redirect(url('admin/events/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $objs = Events::find($id);
        $data['objs'] = $objs;
        $data['url'] = url('admin/events/'.$id);
        $data['method'] = "put";
        return view('admin.events.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

      $image = $request->file('e_image');
      $this->validate($request, [
           'e_name' => 'required',
           'e_detail' => 'required',
           'e_start' => 'required',
           'e_end' => 'required',
           'e_max_person' => 'required',
           'e_url' => 'required'
       ]);

       if($image == null){

         $package = Events::find($id);
          $package->e_name = $request['e_name'];
          $package->e_detail = $request['e_detail'];
          $package->e_start = $request['e_start'];
          $package->e_end = $request['e_end'];
          $package->e_max_person = $request['e_max_person'];
          $package->e_url = $request['e_url'];
          $package->e_point = $request['e_point'];
          $package->e_location = $request['e_location'];
          $package->e_map = $request['e_map'];
          $package->e_tags = $request['e_tags'];
          $package->e_level = $request['e_level'];
          $package->e_remark = $request['e_remark'];
          $package->e_sort = $request['e_sort'];
          $package->save();


       }else{


         $objs = DB::table('events')
        ->select(
           'events.*'
           )
        ->where('id', $id)
        ->first();

        $file_path = 'assets/home/img/events/'.$objs->e_image;
        unlink($file_path);


        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = asset('assets/image/product/');
        $img = Image::make($image->getRealPath());
        $img->resize(1700, 800, function ($constraint) {
        $constraint->aspectRatio();
      })->save('assets/home/img/events/'.$input['imagename']);


       $package = Events::find($id);
       $package->e_name = $request['e_name'];
       $package->e_detail = $request['e_detail'];
       $package->e_start = $request['e_start'];
       $package->e_end = $request['e_end'];
       $package->e_max_person = $request['e_max_person'];
       $package->e_image = $input['imagename'];
       $package->e_url = $request['e_url'];
       $package->e_point = $request['e_point'];
       $package->e_location = $request['e_location'];
       $package->e_map = $request['e_map'];
       $package->e_tags = $request['e_tags'];
       $package->e_level = $request['e_level'];
       $package->e_remark = $request['e_remark'];
       $package->e_sort = $request['e_sort'];
       $package->save();


       }

       return redirect(url('admin/events/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_del($id)
    {
        //
        $data_product = DB::table('events')
        ->where('id', $id)
        ->first();

        $file_path = 'assets/home/img/events/'.$data_product->e_image;
        unlink($file_path);

        DB::table('events')
        ->where('id', $id)
        ->delete();

        return redirect(url('admin/events/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }
}
