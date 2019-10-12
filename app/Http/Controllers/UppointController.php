<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class UppointController extends Controller
{
    //

    public function up_point(){

      $objs = DB::table('join_contents')->select(
                    'join_contents.*',
                    'join_contents.id as id_o',
                    'join_contents.created_at as created_ats',
                    'users.name',
                    'events.e_name',
                    'users.avatar',
                    'users.provider',
                    'events.e_image'
                    )
            ->leftjoin('users', 'users.id',  'join_contents.user_id')
            ->leftjoin('events', 'events.id',  'join_contents.events_id')
            ->orderby('join_contents.id', 'desc')
            ->paginate(15);

          //  dd($objs);


      $data['objs'] = $objs;
        return view('admin.up_point.index', $data);

    }
}
