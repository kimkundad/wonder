<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class ContenthisController extends Controller
{
    //
    public function join_content_his(){
      $data['obj'] = 'join_content_his';
      return view('join_content_his', $data);
    }
}
