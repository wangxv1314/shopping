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
Route::resource('admin/adminuser','admin\AdminuserController');
// 管理员删除
Route::resource('admin/adminuser/destroy','admin\AdminuserController@destroy');
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


// 个人中心
// Route::get();

















































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
