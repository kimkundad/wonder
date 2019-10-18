<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\option;
use Auth;
use App\option_item;
use App\order;
use App\list_point;
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

              if(isset($get_op2)){
                $data['get_op2'] = $get_op2->item_name;
              }else{
                $data['get_op2'] = null;
              }

              if(isset($get_op1)){
                $data['get_op1'] = $get_op1->item_name;
              }else{
                $data['get_op1'] = null;
              }


            

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

         $pay_status = $request['pay_status'];
         $code_ch = $id.'_order';

         if($pay_status != 0){
           //จ่ายตังแล้ว

           $get_count = DB::table('list_points')
                 ->where('data_check',$code_ch)
                 ->count();

                 //เช็คว่ามี order นี้อยุ่ใน list ไหม
            if($get_count > 0){

              // ถ้ามีไม่ต้องทำอะไร

              DB::table('list_points')
                ->where('data_check', $code_ch)
                ->update(['list_points_status' => 1]);

                $balance = DB::table('list_points')
                 ->where('user_id', $request['user_id'])
                 ->where('list_points_status', 1)
                 ->sum('get_point');

                 DB::table('users')
                   ->where('id', $request['user_id'])
                   ->update(['user_point' => $balance]);

            }else{

                // ถ้าไม่มีให้เพิ่ม

               $package = new list_point();
               $package->detail_data = 'ซื้อสินค้า : '.$request['p_name'];
               $package->admin_id = Auth::user()->id;
               $package->get_point = $request['p_pricec'];
               $package->list_points_status = 1;
               $package->data_check = $code_ch;
               $package->user_id = $request['user_id'];
               $package->save();

               $balance = DB::table('list_points')
                ->where('user_id', $request['user_id'])
                ->where('list_points_status', 1)
                ->sum('get_point');

                DB::table('users')
                  ->where('id', $request['user_id'])
                  ->update(['user_point' => $balance]);

            }

          // $request['p_name']
        }else{

          $get_count = DB::table('list_points')
                ->where('data_check', $code_ch)
                ->count();

                if($get_count > 0){

                  DB::table('list_points')
                    ->where('data_check', $code_ch)
                    ->update(['list_points_status' => 0]);

                    $balance = DB::table('list_points')
                     ->where('user_id', $request['user_id'])
                     ->where('list_points_status', 1)
                     ->sum('get_point');

                     DB::table('users')
                       ->where('id', $request['user_id'])
                       ->update(['user_point' => $balance]);

                }else{

                }


        }

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
