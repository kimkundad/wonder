<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function dashboard(){


      $from = date('2019-09-28');
      $to = date('2019-10-13');


      $from1 = date('2019-10-14');
      $to1 = date('2019-11-01');

      $total = DB::table('vams')
                  ->select(
                    'vams.*',
                    'vams.id as id_user',
                    'users.*',
                    'user_events.*',
                    'users.id as id_u',
                    'vams.name as names',
                    'vams.email as emails',
                    'vams.phone as phones',
                    'vams.created_at as created_ats'
                  )
                  ->leftjoin('users', 'users.code_user',  'vams.qrcode')
                  ->leftjoin('user_events', 'user_events.user_id',  'users.id')
                  ->where('user_events.event_id', 2)
                  ->whereBetween('vams.created_at', [$from, $to])
                  ->count();

      $objs = DB::table('vams')
                  ->select(
                    'vams.*',
                    'vams.id as id_user',
                    'users.*',
                    'user_events.*',
                    'users.id as id_u',
                    'vams.name as names',
                    'vams.email as emails',
                    'vams.phone as phones',
                    'vams.created_at as created_ats'
                  )
                  ->leftjoin('users', 'users.code_user',  'vams.qrcode')
                  ->leftjoin('user_events', 'user_events.user_id',  'users.id')
                  ->where('user_events.join_admin', 1)
                  ->where('user_events.event_id', 2)
                  ->whereBetween('vams.created_at', [$from, $to])
                  ->count();



                  $objs_x = DB::table('vams')
                              ->select(
                                'vams.*',
                                'vams.id as id_user',
                                'users.*',
                                'user_events.*',
                                'users.id as id_u',
                                'vams.name as names',
                                'vams.email as emails',
                                'vams.phone as phones',
                                'vams.created_at as created_ats'
                              )
                              ->leftjoin('users', 'users.code_user',  'vams.qrcode')
                              ->leftjoin('user_events', 'user_events.user_id',  'users.id')
                              ->where('user_events.join_admin', 0)
                              ->where('user_events.event_id', 2)
                              ->whereBetween('vams.created_at', [$from, $to])
                              ->count();


                  $objs1 = DB::table('vams')
                              ->select(
                                'vams.*',
                                'vams.id as id_user',
                                'users.*',
                                'user_events.*',
                                'users.id as id_u',
                                'vams.name as names',
                                'vams.email as emails',
                                'vams.phone as phones',
                                'vams.created_at as created_ats'
                              )
                              ->leftjoin('users', 'users.code_user',  'vams.qrcode')
                              ->leftjoin('user_events', 'user_events.user_id',  'users.id')
                              ->where('user_events.join_admin', 1)
                              ->where('user_events.event_id', 2)
                              ->whereBetween('vams.created_at', [$from1, $to1])
                              ->count();



                              $total1 = DB::table('vams')
                                          ->select(
                                            'vams.*',
                                            'vams.id as id_user',
                                            'users.*',
                                            'user_events.*',
                                            'users.id as id_u',
                                            'vams.name as names',
                                            'vams.email as emails',
                                            'vams.phone as phones',
                                            'vams.created_at as created_ats'
                                          )
                                          ->leftjoin('users', 'users.code_user',  'vams.qrcode')
                                          ->leftjoin('user_events', 'user_events.user_id',  'users.id')
                                          ->where('user_events.event_id', 2)
                                          ->whereBetween('vams.created_at', [$from1, $to1])
                                          ->count();


                              $objs1_x = DB::table('vams')
                                          ->select(
                                            'vams.*',
                                            'vams.id as id_user',
                                            'users.*',
                                            'user_events.*',
                                            'users.id as id_u',
                                            'vams.name as names',
                                            'vams.email as emails',
                                            'vams.phone as phones',
                                            'vams.created_at as created_ats'
                                          )
                                          ->leftjoin('users', 'users.code_user',  'vams.qrcode')
                                          ->leftjoin('user_events', 'user_events.user_id',  'users.id')
                                          ->where('user_events.join_admin', 0)
                                          ->where('user_events.event_id', 2)
                                          ->whereBetween('vams.created_at', [$from1, $to1])
                                          ->count();

    $data['objs'] = $objs;
    $data['objs1'] = $objs1;
    $data['objs_x'] = $objs_x;
    $data['objs1_x'] = $objs1_x;



    $data['per'] = ($objs/$total)*100;
    $data['per2'] = ($objs1/$total1)*100;




      return view('admin.dashboard.index', $data);
    }


    public function vam_json(){

      $from = date('2019-09-28');
      $to = date('2019-10-13');




      $objs = DB::table('vams')
                  ->select(
                    'vams.*',
                    'vams.id as id_user',
                    'users.*',
                    'user_events.*',
                    'users.id as id_u',
                    'vams.name as names',
                    'vams.email as emails',
                    'vams.phone as phones',
                    'vams.created_at as created_ats'
                  )
                  ->leftjoin('users', 'users.code_user',  'vams.qrcode')
                  ->leftjoin('user_events', 'user_events.user_id',  'users.id')
                  ->where('user_events.join_admin', 1)
                  ->where('user_events.event_id', 2)
                  ->whereBetween('vams.created_at', [$from, $to])
                  ->get();


                  dd($objs);

    }

    public function vam_json2(){


      $from1 = date('2019-10-11');
      $to1 = date('2019-11-01');



      $objs1 = DB::table('vams')
                  ->select(
                    'vams.*',
                    'vams.id as id_user',
                    'users.*',
                    'user_events.*',
                    'users.id as id_u',
                    'vams.name as names',
                    'vams.email as emails',
                    'vams.phone as phones',
                    'vams.created_at as created_ats'
                  )
                  ->leftjoin('users', 'users.code_user',  'vams.qrcode')
                  ->leftjoin('user_events', 'user_events.user_id',  'users.id')
                  ->where('user_events.join_admin', 1)
                  ->where('user_events.event_id', 2)
                  ->whereBetween('vams.created_at', [$from1, $to1])
                  ->count();


                  dd($objs1);

    }




}
