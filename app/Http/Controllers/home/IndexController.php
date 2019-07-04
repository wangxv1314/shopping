<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\cates;
use App\models\activitys;
use App\models\banners;
use App\models\goods;
use App\models\links;
use DB;
class IndexController extends Controller
{
  
   	// 商城首页
    public function index()
    {	
        
    	// 获取分类数据
    	$cates_data = self::cates(0);
    	// 获取活动数据
    	$activity_data = self::activity();
    	// 获取轮播图
    	$banner_data = self::banner();
    	// 获取商品数据
        $goods_data = self::goods();
        // 获取友链数据
        $link_data = self::link();
    	        
    	return view('home/index',['cates_data'=>$cates_data,'activity_data'=>$activity_data,'banner_data'=>$banner_data,'goods_data'=>$goods_data,'link_data'=>$link_data]);
    	
    }

    // 获取列表数据
    public static function cates($pid = 0)
    {
    	$data = cates::where('pid',$pid)->get();
    	foreach($data as $v){
    		$v->sub = self::cates($v->cid);
    	}
    	
    	return $data;
    }

    // 获取活动数据
    public function activity()
    {
    	$activity = activitys::get();
    	return $activity;
    }

    // 获取轮播图数据
    public function banner()
    {
    	$banner = banners::get();
    	return $banner;
    }

    // 获取商品数据
    public function goods()
    {
    	$goods = goods::get();
    	return $goods;
    }

    // 获取友链
    public static function link()
    {
        $link = links::get();
        return $link;
    }   
}
