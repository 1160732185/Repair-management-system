<?php

namespace App\Http\Controllers;

use App\Repair;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function index()
    {
        $d=time();
        DB::update('UPDATE users SET last_date_login = ? WHERE worknumber = ?',[$d,session('worknumber')]);
        if(session('department')=='工程师'){
            return view('e_main');
        }else if(session('department')=='分配员'){
            $repairs = DB::select('select * from repairs where statue = ? order by created_at  ',['排队中']);
            session(['waitrepairs' => $repairs]);
            $engineers=DB::select('select * from users where state = ?  ',['工作中']);
            $dealEngineers = [];
            foreach($engineers as $engineer){
                $dealEngineers[$engineer->worknumber]=$engineer->worknumber;
            }
/*            foreach($engineers as $k=>$v){
                $dealEngineers[$v->worknumber] = $v->worknumber;
            }*/
            return view('d_main',compact('repairs','dealEngineers'));
        } else{
        $repairs = DB::select('select * from repairs where worknumber = ? order by created_at DESC ',[session('worknumber')]);
        /*$repairs = Repair::all();*/
        return view('main',compact('repairs'));
    }}
    public function login(Request $request)
    {
        $input=$request->all();
        $users=User::all();
        $users = DB::select('select * from users where id = ?', [8]);
        print_r($users);
        exit;

        return view('main');
    }
    public function evaluate( )
    {

        return view('evaluate_repair');
    }
    public function trial( )
    {

        return view('trial');
    }
}
