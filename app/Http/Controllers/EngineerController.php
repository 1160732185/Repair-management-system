<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EngineerController extends Controller
{
    public function state( )
    {
        $engineers=DB::select('select * from users where worknumber = ?', [session('worknumber')]);
        $engineer=$engineers[0];
        $currentstate=$engineer->state;
        $today_worktime=$engineer->workhour;
        $startworktime=$engineer->start_work;
      /*  print_r($engineer);
        exit;*/
        if($currentstate=='工作中') {
            $d = $today_worktime+time()-$startworktime;
            $engineer->workhour = $d;
        }
        return view('e_my_state',compact('engineer'));
    }
    public function change( )
    {
        return view('e_change_state');
    }
    public function rest( )
    {
        $currentthing=DB::select('select * from users where worknumber = ?', [session('worknumber')]);
        $current=$currentthing[0];
        if($current->state=='工作中'){
            DB::update('UPDATE users SET state = \'休息中\' WHERE worknumber = ?',[session('worknumber')]);
            $d=time()-$current->start_work;
            $e=$d+$current->workhour;
            $last_login_date=DB::select('select * from users where worknumber = ?', [session('worknumber')])[0]->last_date_login;
            $today=time();
            if( floor($last_login_date/86400)==floor($today/86400)){
                DB::update('UPDATE users SET workhour = ? WHERE worknumber = ?',[$e,session('worknumber')]);
            }else{
                $e=time()%86400;
                DB::update('UPDATE users SET workhour = ? WHERE worknumber = ?',[$e,session('worknumber')]);
            }

        }
        $engineers=DB::select('select * from users where worknumber = ?', [session('worknumber')]);
        $engineer=$engineers[0];
        return view('e_my_state',compact('engineer'));
    }
    public function work( )
    {

        $engineers=DB::select('select * from users where worknumber = ?', [session('worknumber')]);
        $engineer=$engineers[0];
        if($engineer->state=='休息中'){
            $d=time();
       /*     session(['starttime'=>time()]);*/
            DB::update('UPDATE users SET state = \'工作中\',start_work = ? WHERE worknumber = ?',[$d,session('worknumber')]);
            $engineer->state='工作中';
        }
$start_time=DB::select('select * from users where worknumber = ?', [session('worknumber')])[0]->start_work;
        $engineer->workhour=DB::select('select * from users where worknumber = ?', [session('worknumber')])[0]->workhour;
        $engineer->workhour += time()-$start_time;
 /*       print_r(time());echo '\n';
print_r(strtotime($start_time));
exit;*/
        return view('e_my_state',compact('engineer'));
    }
    public function check( )
    {
return view('e_check');
    }
    public function ing( )
    {
        $repairs=DB::select('select * from repairs where repairman_id = ? and 
(statue = \'处理中 \'  or  statue = \'已派单 \'or  statue = \'维修中\') order by created_at DESC ',[session('worknumber')]);

        return view('condition/e_ing',compact('repairs'));
    }
    public function done( )
    {
        $repairs=DB::select('select * from repairs where repairman_id = ? and 
(statue = \'已完成 \'  or  statue = \'待评价 \') order by created_at DESC ',[session('worknumber')]);
        return view('condition/e_ing',compact('repairs'));
    }
  public function complete(request $request)
    {
        DB::update('UPDATE repairs SET statue = \'待评价\',result = ? WHERE repair_id = ?',[$request->result,session('repair_id')]);
        return view('e_check ');
    }
}
