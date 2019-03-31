<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function worknumber()
    {
        return 'worknumber';
    }

    public function show()
    {
        return view('auth\login');
    }
    /**
     * 处理身份认证尝试.
     *
     * @return Response
     */
    public function login(Request $request)
    {
        //exit;
        $thing = User::where('worknumber',$request->input('worknumber'))->get()->toArray();
        /*print_r($thing);*/
        /*var_dump(json_decode($thing));
        $object = json_decode($thing);
        echo "/////".$object[0]->worknumber;*/
        /*exit;*/
        if (Auth::attempt(['worknumber' => $request->input('worknumber'), 'password' => $request->input('password')])) {
        // 认证通过...
            $department=DB::select ('select department from users where worknumber =  ?', [$request->input('worknumber')]);
        session(['department' => $department[0]->department]);
//            $dep2 = DB::table('users')->select(['department'])
//                    ->where('worknumber', $request
//                    ->input('worknumber'))
//                    ->get()
//                    ->first();
//   print_r($department);
//            print_r($dep2);
/*          exit;*/
            session(['worknumber' => $request->input('worknumber')]);
            return redirect()->route('main');/*intended('home');*/
        }elseif(count($thing)==0 ){
//            print_r($request->session());
//            exit;
            return redirect()->route('loginPage',['numerr'=>1]);
//
        }
        else return redirect()->route('loginPage',['passworderr'=>1]);
    }

}
