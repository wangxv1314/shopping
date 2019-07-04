<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class PersonalController extends Controller
{
    // 个人中心首页
   	public function index()
   	{	

   		if(!session('login')){
   			return redirect('/login');
   		}else{
   			 // 获取友链数据
         	$link_data = IndexController::link();

	        // 获取个人信息
	        $uid = session('user')->uid;
	        $user_info = DB::table('user_info')->where('uid',$uid)->first();
	        // dump($user_info);
   		}
   		// 获取时间
   		$time = self::time();
   		
   		
   		return view('home.person.index',['link_data'=>$link_data,'user_info'=>$user_info,'time'=>$time]);

   	}

   	// 获取时间
   	public function time()
   	{
   		$time=date("w",time( ));
		$array = ["周日","周一","周二","周三","周四","周五","周六"];
		$time=date("w",time( ));

		$date['year'] = date('Y-m',time());
   		$date['day'] = date('d');
   		$date['week'] = $array[$time];

   		return $date;
   	}


   	// 收藏
   	public function collect()
   	{	

   		if(!session('login')){
   			return redirect('/login');
   		}else{
   			// 获取收藏数据
	        $uid = session('user')->uid;
	        $collect_data = DB::table('collects')->where('uid',$uid)->get();
	        foreach($collect_data as $v){
	        	$v->goods = DB::table('goods')->where('gid',$v->gid)->first();
	        }
	       
   		 	// 获取友链数据
         	$link_data = IndexController::link();

    	 }
   		
   		return view('home.person.collect',['link_data'=>$link_data,'collect_data'=>$collect_data]);
   	}

   	// 足迹
   	public function track()
   	{
   		if(!session('login')){
   			return redirect('/login');
   		}else{
   			// 获取收藏数据
	        $uid = session('user')->uid;
	        $track_data = DB::table('goods')->where('uid',$uid)->get();
	       
   		 	// 获取友链数据
         	$link_data = IndexController::link();
         	// return view('home.person.collect',['link_data'=>$link_data]);
         	return view('home.person.track',['link_data'=>$link_data,'track_data'=>$track_data]);
    	 }
   	}


   	// 评价
   	public function evaluate()
   	{
   		if(!session('login')){
   			return redirect('/login');
   		}else{
   			// 获取收藏数据
	        $uid = session('user')->uid;
	        
	        $discu_data = DB::table('discuss')->where('uid',$uid)->get();
	        foreach($discu_data as $v){
	        	$v->goods = DB::table('goods')->where('gid',$v->gid)->first();
	        }
	        // dd($discu_data);
   		 	// 获取友链数据
         	$link_data = IndexController::link();
         	// return view('home.person.collect',['link_data'=>$link_data]);
         	return view('home.person.evaluate',['link_data'=>$link_data,'discu_data'=>$discu_data]);
    	 }

   	}



   	// // 订单
   	// public function order()
   	// {
   	// 	if(!session('login')){
   	// 		return redirect('/login');
   	// 	}else{
   	// 		// 获取收藏数据
	   //      $uid = session('user')->uid;
	        
	   //     $order = DB::table('orders')->where('uid',$uid)->get();
	      
	   //     foreach($order as $v){
	   //     		$v->order_desc = DB::table('order_descs')->where('oid',$v->oid)->get();
	   //     		foreach($v->order_desc as $val){
	   //     			$v->order_desc = DB::table('goods')->where('gid',$val->gid)->first();
	   //     		}

	   //     }
	   //     dump($order);
	   //     die();
   	// 	 	// 获取友链数据
    //      	$link_data = IndexController::link();
    //      }
   	// 		return view('home.person.order',['link_data'=>$link_data,'order'=>$order]);
   	// }

 // @include('/home/public/person_nav')
}
