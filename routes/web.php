<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
15~30行 公共信息
31~60行 王旭
61~90行 姜雪
91~120行 丁阳
/upload/goods 商品图片
/upload/banners 轮播图图片
/upload/activitys 活动图片
/upload/user_info 头像图片









*/
// 登录
Route::get('admin/login','admin\LoginController@login');
// 执行登录
Route::post('admin/dologin','admin\LoginController@dologin');
// 后台退出
Route::get('admin/logout','admin\LoginController@logout');

Route::get('admin/rbac',function(){
	return view('admin.rbac');
});


Route::group(['middleware'=>['login','nodes']],function(){
// 后台首页
Route::get('admin','admin\IndexController@index');
// 后台 管理员
Route::resource('admin/adminuser','admin\adminuserController');
// 管理员删除
Route::resource('admin/adminuser/destroy','admin\adminuserController@destroy');
// 后台  角色
Route::resource('admin/roles','admin\RolesController');
// 后台 权限
Route::resource('admin/nodes','admin\NodesController');
// 分类路由
Route::get('admin/cates/index','admin\CatesController@index');
// 添加分类
Route::get('admin/cates/create','admin\CatesController@create');
// 执行添加
Route::post('admin/cates/store','admin\CatesController@store');
// 删除分类
Route::get('admin/cates/destroy','admin\CatesController@destroy');
// 订单管理
Route::get('admin/order/index','admin\OrderController@index');
// 订单删除
Route::get('admin/order/destroy','admin\OrderController@destroy');
// 商品管理
Route::get('admin/goods/index','admin\GoodController@index');
// 执行添加商品
Route::post('admin/goods/store','admin\GoodController@store');
// 添加商品
Route::get('admin/goods/create','admin\GoodController@create');
// 删除商品
Route::get('admin/goods/destroy','admin\GoodController@destroy');
// 商品修改
Route::get('admin/goods/edit/{gid}','admin\GoodController@edit');
// 商品执行修改
Route::post('admin/goods/update','admin\GoodController@update');
// 添加商品图片
Route::get('admin/goods/show/{gid}','admin\GoodController@show');
// 执行添加商品图片
Route::post('admin/goods/add','admin\GoodController@add');
// 用户列表
Route::get('user/index','admin\UserController@index');
//用户添加
Route::get('user/create','admin\UserController@create');
//后台用户路由
Route::resource('admin/user','admin\UserController');
//后台广告路由
Route::resource('admin/vers','admin\VersController');
//广告列表
Route::get('vers/index','admin\VersController@index');
//广告添加
Route::get('vers/create','admin\VersController@create');
//友情链接路由
Route::resource('admin/links','admin\LinksController');
//链接列表
Route::get('links/index','admin\LinksController@index');
//添加连接
Route::get('links/create','admin\LinksController@create');
//修改链接状态
Route::get('links/changeStatus/{lid}','admin\LinksController@changeStatus');
//轮播图路由
Route::resource('admin/banner','admin\BannerController');
//轮播列表
Route::get('banner/index','admin\BannerController@index');
//添加轮播图
Route::get('banner/create','admin\BannerController@create');
//修改轮播状态
Route::get('banner/changeStatus/{bid}','admin\BannerController@changeStatus');
//评论列表
Route::get('discuss/index','admin\DiscussController@index');
//评论添加
Route::get('discuss/create','admin\DiscussController@create');
//后台评论
Route::resource('admin/discuss','admin\DiscussController');
//活动列表
Route::get('activ/index','admin\ActivController@index');
//添加活动
Route::get('activ/create','admin\ActivController@create');
//执行添加活动
Route::post('admin/activ','admin\ActivController@store');
// 删除活动
Route::post('admin/activ/destroy','admin\ActivController@destroy');
});
// 前台登录
Route::get('login','home\LoginController@index');
// 前台执行登录
Route::post('dologin','home\LoginController@dologin');
// 前台退出
Route::get('logout','home\LoginController@logout');
// 前台注册
Route::get('register','home\RegisterController@index');
// 邮箱注册
Route::post('register/store','home\RegisterController@store');
// 手机号注册
Route::post('register/register','home\RegisterController@register');
// 获取手机验证码
Route::get('register/sendPhone','home\RegisterController@sendPhone');
// 邮箱验证
Route::get('register/changeStatus/{id}/{token}','home\RegisterController@changeStatus');
// 商城主页
Route::get('/','home\IndexController@index');
// 列表商品
Route::get('list/{id}','home\ListController@index');
Route::post('list/search','home\ListController@seek');
// 商品详情
Route::get('goods/{gid}','home\GoodsController@index');
// 收藏商品
Route::get('collect/{gid}','home\GoodsController@collect');
Route::get('collectcall/{gid}','home\GoodsController@collectcall');
// 购物车页面
Route::get('cart/show','home\CarController@index');
// 加入购物车
Route::get('cart/add/{gid}','home\CarController@addcart');
// 删除
Route::get('cart/del/{gid}','home\CarController@delete');
// 商品+
Route::get('cart/addnum/{gid}','home\CarController@addNum');
// 商品-
Route::get('cart/descnum/{gid}','home\CarController@descNum');
// 订单
Route::get('order','home\OrderController@index');
// 结算
Route::get('close','home\OrderController@close');
// 个人中心首页
Route::get('personal','home\PersonalController@index');
// 收藏
Route::get('personal/collect','home\PersonalController@collect');
// 足迹
Route::get('personal/track','home\PersonalController@track');
// 评价
Route::get('personal/evaluate','home\PersonalController@evaluate');
// 订单管理
Route::get('personal/order','home\PersonalController@order');
