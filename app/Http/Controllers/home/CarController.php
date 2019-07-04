<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CarController extends Controller
{	
	// 购物车主页
	public function index()
	{	
         // 获取友链数据
         $link_data = IndexController::link();

 		if(!empty($_SESSION['car'])){
			$data = $_SESSION['car'];
		}else{
			$data = [];
		}
        // dump($data);
		// 总价格
		$priceCount = self::priceCount();

		// 加载模板
		return view('home.cart.car',['data'=>$data,'priceCount'=>$priceCount,'link_data'=>$link_data]);
	}



    // 加入购物车
    public function addcart($gid)
    {	
       // 判断是否登录
        if(empty(session('login'))){

            return redirect('/login');
        }else{   
        	// 判断是否已经加入购物车
        	if(empty($_SESSION['car'][$gid])){
        		// 没有加入
        		// 获取数据
        		$data = DB::table('goods')->where('gid',$gid)->first();
        		// 计算数据和小计
        		$data->num = 1;
        		$data->subtoal = ($data->price * $data->num);
        		// 压入session
        		$_SESSION['car'][$gid] = $data;
        	}else
        		// 已经加入
        		// 商品数量加一
        		$_SESSION['car'][$gid]->num = $_SESSION['car'][$gid]->num + 1;
        		// 计算小计
        		$_SESSION['car'][$gid]->subtoal = ($_SESSION['car'][$gid]->num * $_SESSION['car'][$gid]->price);
        		

        		return redirect('/cart/show');
        }
    }

    // 总价
    public  static function priceCount()
    {	
    	// 判断购物车里面是否有数据
    	if(empty($_SESSION['car'])){
    		$priceCount = 0;
    	}else{
    		$priceCount = 0;
    		// 循环取值 计算总价
    		foreach ($_SESSION['car'] as $key => $value){
    			$priceCount += $value->subtoal;
    		}
    	}
    	return $priceCount;
    }

    // 添加 数量
    public function addNum($gid)
    {   

    	// 取出商品id
    	
    	// 判断是否存在
    	if(empty($_SESSION['car'])){
    		return back();
    	}else{
    		// 商品数量+1
    		$n = $_SESSION['car'][$gid]->num+1;
    		// 获取单价
    		$price = $_SESSION['car'][$gid]->price;
    		// 压入数量和小计
    		$_SESSION['car'][$gid]->num = $n;
    		$_SESSION['car'][$gid]->subtoal = ($n * $price);
    		
    		return back();
    	}
    }

    // 减少数量
    public function descNum($gid)
    {	
    	
    	// 判断是否存在
    	if(empty($_SESSION['car'])){
    		return back();
    	}else{
    		// 判断数量是否小于1
    		if($_SESSION['car'][$gid]->num <= 1){
    			return back();
    			exit;
    		}
    		// 商品数量-1
    		$n = $_SESSION['car'][$gid]->num-1;
    		// 获取单价
    		$price = $_SESSION['car'][$gid]->price;
    		// // 压入数量和小计
    		$_SESSION['car'][$gid]->num = $n;
    		$_SESSION['car'][$gid]->subtoal = ($n * $price);
    		return back();
    	}
    } 

    // 删除数据
    public function delete($gid)
    {	
    	
    	// 判断是否存在
    	if(empty($_SESSION['car'][$gid])){
    		return back();
    	}else{
    		// 删除数据
    		unset($_SESSION['car'][$gid]);
    		return back();
    	}
    }
}
