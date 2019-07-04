<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\goods;
use App\models\parameters;
use App\models\cates;
use DB;
class ListController extends Controller
{
    // 列表数据遍历
   	public function index($cid)
   	{	    
          // 获取友链数据
         $link_data = IndexController::link();


            // 查询相关商品
            $goods_data = goods::where('cid',$cid)->get();
            // 查询同类商品
            $cates_pid = cates::where('cid',$cid)->first()->pid;
            $corre_goods = goods::where('pid',$cates_pid)->get();
   		
   		return view('home.list.list_goods',['goods_data'=>$goods_data,'corre_goods'=>$corre_goods,'link_data'=>$link_data]);
   	}

      public function seek(Request $request)
      {

           // 获取友链数据
         $link_data = IndexController::link();

            //获取商品
          $link_data = IndexController::link();
          $search = $request->input('search');
          $goods_data = DB::table('goods')->where('tname','like','%'.$search.'%')->get();
          //获取同类商品
          $cid = $goods_data[0]->cid;
          $cates_pid = cates::where('cid',$cid)->first()->pid;
          $corre_goods = goods::where('pid',$cates_pid)->get();
          
          return view('home.list.list_goods',['goods_data'=>$goods_data,'corre_goods'=>$corre_goods,'link_data'=>$link_data]);
      }
}
