<?php

namespace App\Http\Controllers;
use App\Equipment;
use App\Repair;
use App\Http\Requests\Repair_Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function repair()
    {
        return view('i_want_repair');
    }
    public function information($id)
    {
        $repairs = DB::select('select * from repairs where repair_id= ?',[$id]);
        $repair=$repairs[0];
        session(['repair_id'=>$repair->repair_id]);
        if(session('department')=='工程师') $repair->engineer='1';
        return view('repairshow',compact('repair'));
    }
    public function ing()
    {
        $repairs=DB::select('select * from repairs where worknumber = ? and 
(statue = \'处理中 \' or  statue =\'排队中 \' or  statue = \'已派单 \'or  statue = \'维修中\') order by created_at DESC ',[session('worknumber')]);
        return view('condition/ing',compact('repairs'));
    }
    public function evaluate()
    {
        $repairs=DB::select('select * from repairs where worknumber = ? and 
statue = \'待评价 \' order by created_at DESC ',[session('worknumber')]);
        return view('condition/evaluate',compact('repairs'));
    }
    public function evaluate_post(Request $request)
    {
       $score=$request->speed+$request->effect+$request->attitude;
       DB::update('UPDATE repairs SET evaluate = ?,statue=\'已完成\' where repair_id= ? ',[$score,session('repair_evaluate')]);
       return view('evaluate_confirm');
    }
    public function done()
    {
        $repairs=DB::select('select * from repairs where worknumber = ? and 
statue = \'已完成 \' order by created_at DESC ',[session('worknumber')]);
        return view('condition/done',compact('repairs'));
    }
    public function inquire()
    {
        return view('i_want_inquire');
    }
    public function confirm(Repair_Request $request)
    {
        date_default_timezone_set("Asia/Shanghai");
        $thing=DB::select ('select * from equipments where equ_id =  ?', [$request->input('equipment_id')]);
        if (count($thing)==0 ){
            return redirect()->route('i_want_repair',['iderr'=>1]);
        }else
        $input =$request->all();
        $input['repair_id'] = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
        $input['worknumber'] =session('worknumber');
        $input['department'] = session('department');
        DB::insert ('INSERT INTO repairs (repair_id,worknumber,department,phone,floor,description,equipment_id,created_at,updated_at,statue) VALUES (?,?,?,?,?,?,?,?,?,?)',
            [$input['repair_id'],$input['worknumber'],$input['department'],$input['phone'],$input['floor'],$input['description'],$input['equipment_id'],date("Y/m/d-H:i:s"),date("Y/m/d-H:i:s"),'排队中']);

        return view('confirm');
    }
    public function equlocation(Request $request)
    {
/*        print_r($request->input("number"));
        exit;*/
        $equ=DB::select('select * from equipments where equ_id = ?',[$request->input("number")]);

        $location=$equ[0]->equ_location;

        return view('location',compact('location'));
    }
    public function equuser(Request $request)
    {
        $equ=DB::select('select * from equipments where equ_id = ?',[$request->input("number")]);

        $location=$equ[0]->equ_user;

        return view('location',compact('location'));
    }
}
