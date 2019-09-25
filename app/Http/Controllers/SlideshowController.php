<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = slide::all();
        $data['objs'] = $objs;
        return view('admin.slide.index', $data);
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
        $data['url'] = url('admin/slide');
        return view('admin.slide.create', $data);
    }


    public function api_slide_status(Request $request){
    //  dd($request->user_id);
    $user = slide::findOrFail($request->user_id);

              if($user->slide_status == 1){
                  $user->slide_status = 0;
              } else {
                  $user->slide_status = 1;
              }


      return response()->json([
      'data' => [
        'success' => $user->save(),
      ]
    ]);

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
      $image = $request->file('image');
      $this->validate($request, [
           'image' => 'required|max:20480'
       ]);

      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

      $destinationPath = asset('assets/image/product/');
      $img = Image::make($image->getRealPath());
      $img->resize(2048, 1365, function ($constraint) {
      $constraint->aspectRatio();
    })->save('assets/home/img/slide/'.$input['imagename']);

    if($request['url_slide'] == null){
      $url = '#';
    }else{
      $url = $request['url_slide'];
    }

    $package = new slide();
     $package->name_slide = $request['name_slide'];
     $package->sub_slide = $request['sub_slide'];
     $package->url_slide = $url;
     $package->image = $input['imagename'];
     $package->save();

     return redirect(url('admin/slide/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function slide_del($id)
    {
        //
        $objs = DB::table('slides')
          ->select(
             'slides.*'
             )
          ->where('id', $id)
          ->first();

          $file_path = 'assets/home/img/slide/'.$objs->image;
          unlink($file_path);
        //
        $obj = slide::find($id);
        $obj->delete();
        return redirect(url('admin/slide/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }
}
