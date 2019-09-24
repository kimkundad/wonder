<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = DB::table('role_user')
            ->select(
            'role_user.*',
            'users.*',
            'users.id as id_user'
            )
            ->leftjoin('users', 'users.id',  'role_user.user_id')
            ->where('role_user.role_id', '!=', 3)
            ->get();


            $data['objs'] = $objs;
            return view('admin.employee.index', $data);
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
        $cat = DB::table('users')
            ->select(
            'role_user.*',
            'users.*',
            'users.id as id_user'
            )
            ->leftjoin('role_user', 'role_user.user_id',  'users.id')
            ->where('users.id', $id)
            ->first();

            $role_user = DB::table('role_user')
                ->where('user_id', $id)
                ->first();

                $data['role_user'] = $role_user;

        $data['url'] = url('admin/employee/'.$id);
          $data['header'] = "แก้ไขข้อมูลพนักงาน";
          $data['method'] = "put";

          $data['objs'] = $cat;
          return view('admin.employee.edit', $data);
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
              'name' => 'required',
              'email' => 'required'
        ]);

        $email = $request['email'];
        $level_employee = $request['level_employee'];
        $check_email = DB::table('users')
            ->select(
            'users.*'
            )
            ->where('id', '!=', $id)
            ->where('email', $email)
            ->count();

            DB::table('role_user')
            ->where('user_id', $id)
            ->update(['role_id' => $level_employee]);

            if($check_email > 0){

            return redirect(url('admin/employee/'))->with('error','Edit successful');

          }else{

            $package = User::find($id);
            $package->name = $request['name'];
            $package->email = $request['email'];
            $package->phone = $request['phone'];
            $package->zipcode = $request['id_card_no'];
            $package->save();

          return redirect(url('admin/employee/'))->with('edit_success','Edit successful');

          }

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
