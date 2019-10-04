<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\bank_payment;
use App\order;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      //  $objs = bank_payment::all();

        $objs = DB::table('bank_payments')
            ->orderby('id', 'desc')
            ->paginate(15);

        $data['objs'] = $objs;
        return view('admin.payment.index', $data);
    }


    public function api_pay_status(Request $request){
    //  dd($request->user_id);
    $user = bank_payment::findOrFail($request->user_id);

              if($user->c_status == 1){
                  $user->c_status = 0;
              } else {
                  $user->c_status = 1;
              }


      return response()->json([
      'data' => [
        'success' => $user->save(),
      ]
    ]);

    }

    public function del_pay($id)
    {
        //
        $data_product = DB::table('bank_payments')
        ->where('id', $id)
        ->first();

        $file_path = 'assets/home/img/slip/'.$data_product->image;
        unlink($file_path);

        DB::table('bank_payments')
        ->where('id', $id)
        ->delete();

        return redirect(url('admin/pay_admin/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
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
    public function destroy($id)
    {
        //
    }
}
