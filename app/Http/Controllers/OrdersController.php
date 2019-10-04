<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\option;
use App\option_item;
use App\order;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = DB::table('orders')->select(
                      'orders.*',
                      'orders.id as id_o',
                      'orders.created_at as created_ats',
                      'products.*'
                      )
              ->leftjoin('products', 'products.id',  'orders.product_id')
              ->orderby('orders.id', 'desc')
              ->paginate(15);


        $data['objs'] = $objs;
        return view('admin.orders.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $objs = DB::table('orders')->select(
                      'orders.*',
                      'orders.id as id_o',
                      'orders.created_at as created_ats',
                      'products.*'
                      )
              ->leftjoin('products', 'products.id',  'orders.product_id')
              ->where('orders.id', $id)
              ->first();


              $get_op1 = DB::table('option_items')
                    ->where('id', $objs->option1)
                    ->first();

                    $get_op2 = DB::table('option_items')
                          ->where('id', $objs->option2)
                          ->first();



              $data['get_op2'] = $get_op2->item_name;
              $data['get_op1'] = $get_op1->item_name;

              //$objs->option2;

              $get_pro = DB::table('province')
                    ->where('PROVINCE_ID', $objs->pro_id_re)
                    ->first();

              $objs->pro_vin = $get_pro->PROVINCE_NAME;


            //  dd($objs);
        $data['objs'] = $objs;
        $data['url'] = url('admin/order_admin/'.$id);
        $data['method'] = "put";
        return view('admin.orders.edit', $data);
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
        $this->validate($request, [
             'address_re' => 'required',
             'pay_status' => 'required'
         ]);

         $package = order::find($id);
          $package->address_re = $request['address_re'];
          $package->pay_status = $request['pay_status'];
          $package->track_no = $request['track_no'];
          $package->save();


          return redirect(url('admin/order_admin/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

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
