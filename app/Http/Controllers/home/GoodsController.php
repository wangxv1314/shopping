<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\goods;
use App\models\users;
use App\models\Goodspics;
use DB;
class GoodsController extends Controller
{
    // 商品详情
    public function index($gid)
    {	 
        // 获取友链数据
        $link_data = IndexController::link();

    	$goods_data = goods::where('gid',$gid)->first();
    	// 获取收藏数据
    	if(!session('login')){
    		$coll = null;
    	}else{
    		$uid = session('user')->uid;
    		$coll = DB::table('collects')->where('gid',$gid)->where('uid',$uid)->first();
    	}
    	$data = goods::get();

        // 获取商品评论
        $discus_data = DB::table('discuss')->where('gid',$gid)->get();
        foreach($discus_data as $v){
             $user_data = DB::table('user_info')->where('uid',$v->uid)->first();
             $v->uid = $user_data->uname;
             $v->pic = $user_data->pic;
        }
        $goodspics = DB::table('goodspics')->where('gid',$gid)->get();
        $goods = DB::table('goods')->where('gid',$gid)->get();
        // dd($goodspics);
    	return view('home.goods.goods_details',['goods_data'=>$goods_data,'coll'=>$coll,'data'=>$data,'link_data'=>$link_data,'discus_data'=>$discus_data,'goodspics'=>$goodspics,'goods'=>$goods]);
    }


    // 收藏商品
    public function collect($gid)
    {	
    	// 判断是否登录
    	if(empty(session('login'))){

    		return redirect('/login');
    		
    	}else{
    		// 获取用户id
    		$data['uid'] = session('user')->uid;
    		$data['gid'] = $gid;
    		
    		// 添加收藏
    		$res = DB::table('collects')->insert($data);
    		// 判断是否成功
    		if($res){
            	return back()->with('error','添加失败');
        	}else{
            	return back()->with('error','添加失败');
        	}
    	}
    }
    // 取消收藏
    public function collectcall($gid)
    {
    	$res = DB::table('collects')->where('gid',$gid)->delete();
    	if($res){
            return back()->with('error','添加失败');
        }else{
            return back()->with('error','添加失败');
        }
    }
    
}
