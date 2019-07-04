<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrderController extends Controller
{
    // 订单首页
    public function index()
    {		

    	 // 获取友链数据
         $link_data = IndexController::link();

    	if(empty(session('login'))){

           return redirect('/login');
         }else{
	    	if(!empty($_SESSION['car'])){
				$data = $_SESSION['car'];
			}else{
				$data = [];
			}

			// 获取地址
			$uid = session('user')->uid;
			$sites_data = DB::table('sites')->where('uid',$uid)->get();
			// 总价 
			$priceCount = CarController::priceCount();
		}

    	return view('home.order.order',['data'=>$data,'priceCount'=>$priceCount,'sites_data'=>$sites_data,'link_data'=>$link_data]);
    } 



    // 结算
    public function close()
    {	

         // 获取友链数据
         $link_data = IndexController::link();
    	// 总价 
		$priceCount = CarController::priceCount();
		$uid = session('user')->uid;
    	$link_data = IndexController::link();
    	$order_data['ordernum'] = date('ymd').mt_rand(999,9999);
    	$order_data['otime'] = date('Y-m-d H:i:s',time());
    	$order_data['addtime'] = date('Y-m-d H:i:s',time());
    	$order_data['oprice'] = $priceCount;
    	$order_data['uid'] = $uid;
    	$order_data['status'] = 0;
    	$res = DB::table('orders')->insert($order_data);
    	if(!$res){
    		return back();
    	}else{

    		// 订单id
	    	$oid = DB::table('orders')->where('uid',$uid)->where('status',0)->first()->oid;
	    	// 地址id
	    	$sid = DB::table('sites')->where('uid',$uid)->where('pitch',1)->first()->sid;
	    	// 商品id
	    	$data = $_SESSION['car'];
	    	$key = array_keys($data);
	    	foreach($key as $v){
	    		$desc['oid'] = $oid;
	    		$desc['sid'] = $sid;
	    		$desc['gid'] = $v;
	    		$desc['status'] = 0;
	    		// break;
	    		DB::table('order_descs')->insert($desc);
	    	}
    	}
    		$_SESSION['car'] = null;

		// 获取地址
		$sites_data = DB::table('sites')->where('uid',$uid)->where('pitch',1)->first();

    	return view('home.order.close',['priceCount'=>$priceCount,'sites_data'=>$sites_data,'link_data'=>$link_data]);
    }
}
