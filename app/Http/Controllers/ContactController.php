<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contact;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    public function index(){
      $objs = contact::all();
      $data['objs'] = $objs;
      return view('admin.contact.index', $data);
    }


    public function api_contact_status(Request $request){
    //  dd($request->user_id);
    $user = contact::findOrFail($request->user_id);

              if($user->con_status == 1){
                  $user->con_status = 0;
              } else {
                  $user->con_status = 1;
              }


      return response()->json([
      'data' => [
        'success' => $user->save(),
      ]
    ]);

    }
}
