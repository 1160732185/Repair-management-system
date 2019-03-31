<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DitributorController extends Controller
{
    public function confirm(Request $request )
    {

        $wait_number=count(session('waitrepairs'));
        for($i=0;$i<$wait_number;$i++){
            if($request[session('waitrepairs')[$i]->repair_id]!='请选择')
                $phone=DB::select('SELECT phone from users where worknumber = ? ',[$request[session('waitrepairs')[$i]->repair_id]]);
            DB::update('UPDATE repairs SET repairman_id = ?, repairman_phone = ? ,statue = ? WHERE repair_id = ?',
                    [$request[session('waitrepairs')[$i]->repair_id],$phone[0]->phone,'已派单',session('waitrepairs')[$i]->repair_id]);
        }
        return view('home');
    }
}
