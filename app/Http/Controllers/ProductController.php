<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\option;
use App\option_item;
use App\gallery;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = product::all();
        $data['objs'] = $objs;
        return view('admin.products.index', $data);
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
        $data['url'] = url('admin/products');
        return view('admin.products.create', $data);
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
      $image = $request->file('p_image');
      $this->validate($request, [
           'p_image' => 'required|max:8048',
           'p_name' => 'required',
           'p_detail' => 'required',
           'p_code' => 'required',
           'p_weight' => 'required',
           'p_dimensions' => 'required'
       ]);

       $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

       $destinationPath = asset('assets/image/product/');
       $img = Image::make($image->getRealPath());
       $img->resize(800, 800, function ($constraint) {
       $constraint->aspectRatio();
     })->save('assets/home/img/products/'.$input['imagename']);


     $package = new product();
      $package->p_name = $request['p_name'];
      $package->p_detail = $request['p_detail'];
      $package->p_code = $request['p_code'];
      $package->p_weight = $request['p_weight'];
      $package->p_dimensions = $request['p_dimensions'];
      $package->p_image = $input['imagename'];
      $package->p_pricec = $request['p_pricec'];
      $package->p_stock = $request['p_stock'];
      $package->p_point = $request['p_point'];
      $package->p_tags = $request['p_tags'];
      $package->save();

      return redirect(url('admin/products/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');


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
      $gal = DB::table('galleries')
       ->select(
          'galleries.*'
          )
       ->where('pro_id', $id)
       ->get();

        $data['gal'] = $gal;
        $option_item = option_item::all();
        $option = option::all();
        $objs = product::find($id);
        $data['objs'] = $objs;
        $data['option_item'] = $option_item;
        $data['option'] = $option;
        $data['url'] = url('admin/products/'.$id);
        $data['method'] = "put";
        return view('admin.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function add_gallery(Request $request, $id){

      $image = $request->file('g_image');

      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

      $destinationPath = asset('assets/image/gallery/');
      $img = Image::make($image->getRealPath());
      $img->resize(800, 800, function ($constraint) {
      $constraint->aspectRatio();
    })->save('assets/home/img/gallery/'.$input['imagename']);


     $package = new gallery();
     $package->pro_id = $id;
     $package->image = $input['imagename'];
     $package->save();

     return redirect(url('admin/products/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }


    public function update(Request $request, $id)
    {
        //
        $image = $request->file('p_image');
        $this->validate($request, [
             'p_name' => 'required',
             'p_detail' => 'required',
             'p_code' => 'required',
             'p_weight' => 'required',
             'p_dimensions' => 'required'
         ]);

         if($image == null){

           $package = product::find($id);
           $package->p_name = $request['p_name'];
           $package->p_detail = $request['p_detail'];
           $package->p_code = $request['p_code'];
           $package->p_weight = $request['p_weight'];
           $package->p_dimensions = $request['p_dimensions'];
           $package->p_pricec = $request['p_pricec'];
           $package->p_stock = $request['p_stock'];
           $package->p_point = $request['p_point'];
           $package->p_tags = $request['p_tags'];
           $package->p_size = $request['p_size'];
           $package->p_color = $request['p_color'];
           $package->save();

         }else{


           $objs = DB::table('products')
          ->select(
             'products.*'
             )
          ->where('id', $id)
          ->first();

          $file_path = 'assets/home/img/products/'.$objs->p_image;
          unlink($file_path);


           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

           $destinationPath = asset('assets/image/product/');
           $img = Image::make($image->getRealPath());
           $img->resize(800, 800, function ($constraint) {
           $constraint->aspectRatio();
         })->save('assets/home/img/products/'.$input['imagename']);


           $package = product::find($id);
           $package->p_name = $request['p_name'];
           $package->p_detail = $request['p_detail'];
           $package->p_code = $request['p_code'];
           $package->p_weight = $request['p_weight'];
           $package->p_dimensions = $request['p_dimensions'];
           $package->p_image = $input['imagename'];
           $package->p_pricec = $request['p_pricec'];
           $package->p_stock = $request['p_stock'];
           $package->p_point = $request['p_point'];
           $package->p_tags = $request['p_tags'];
           $package->p_size = $request['p_size'];
           $package->p_color = $request['p_color'];
           $package->save();

         }

         return redirect(url('admin/products/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }


    public function destroy_del_gallery($id){

      $data_product = DB::table('galleries')
      ->where('id', $id)
      ->first();

      $file_path = 'assets/home/img/gallery/'.$data_product->image;
      unlink($file_path);

      DB::table('galleries')
      ->where('id', $id)
      ->delete();
      return back()->with('del_item_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
