<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\models\Users;
class LoginController extends Controller
{
	// 登录首页
	public function index()
	{
		return view('home/login/index');
	}
	// 执行登录
	public function dologin(Request $request)
    {
    	$account = $request->input('account','');
    	$upass = $request->input('upass','');
    	// dd($upass);
    	// $data = DB::table('users')->where('uname',$uname)->first();
    	$data = Users::where('account',$account)->first();
    	// dd($data->upass);
    	// dump($data);
    	// if(empty($data)){
    	// 	return back()->with('error','用户名或密码错误');
    	// 	echo "失败";
    	// }
    	// 验证密码
    	if(!Hash::check($upass,$data->upass)){
    		return back()->with('error','用户名或密码错误z');
    	}

            // // 获取信息数据
            $user_data = DB::table('user_info')->where('uid',$data->uid)->first();
            
            $data->uname = $user_data->uname;
        

    	// 登录
    	session(['login'=>true]);
        session(['user'=>$data]);
        // dd(session('user'));
    	session(['user_info'=>$data->uname]);
        // dd(session('user_info'));
    	 // 跳转 
    	return redirect('/');
    }
    
        public function logout()
    {
        session(['login'=>false]);
        session(['user'=>false]);
        return redirect('/');
    }
}
