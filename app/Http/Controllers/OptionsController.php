<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\option;
use App\option_item;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = option::all();
        $data['objs'] = $objs;
        return view('admin.options.index', $data);
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
        $data['url'] = url('admin/options');
        return view('admin.options.create', $data);
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
        $package = new option();
         $package->o_name = $request['o_name'];
         $package->o_product = $request['o_product'];
         $package->save();

         return redirect(url('admin/options/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
      $item = DB::table('option_items')
      ->select(
         'option_items.*'
         )
      ->where('o_ids', $id)
      ->get();


        //
        $objs = option::find($id);
        $data['objs'] = $objs;
        $data['item'] = $item;
        $data['url'] = url('admin/options/'.$id);
        $data['method'] = "put";
        return view('admin.options.edit', $data);
    }


    public function destroy_del_item($id){

      DB::table('option_items')
      ->where('id', $id)
      ->delete();

      return back()->with('del_item_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function add_item(Request $request, $id){

       $package = new option_item();
       $package->o_ids = $id;
       $package->item_name = $request['item_name'];
       $package->save();

       return redirect(url('admin/options/'.$id.'/edit'))->with('add_item_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }


    public function update(Request $request, $id)
    {
        //
        $package = option::find($id);
        $package->o_name = $request['o_name'];
        $package->o_product = $request['o_product'];
        $package->save();

        return redirect(url('admin/options/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_option($id)
    {
        //
        DB::table('options')
        ->where('id', $id)
        ->delete();

        return back()->with('del_item_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }
}
