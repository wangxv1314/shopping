<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Cates;
use App\models\goods;
use App\models\goodspics;
use App\Http\Requests\StoreGoods;
use DB;
class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = goods::get();
        // dd($data);
        return view('admin/good/index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates_data = Cates::get();
        foreach($cates_data as $k=>$v){
            if(substr_count($v->path,',') == 2){
                // dd($v->cid);
                $cates[] = Cates::where('cid',$v->cid)->first();
            }
        }
        // dd($cates);
        return view('admin/good/create',['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGoods $request)
    {
        // dd($request->all());
        $cid = $request->get('cid');
        if($cid == 0){
            return back()->with('error','请选择商品分类');
        }
        $pid = Cates::where('cid',$cid)->first()->pid;
        // dd($pid);
        // 将数据压入数据库
        if($request->hasFile('pic')){
            $path = $request->file('pic')->store('goods');
            $path = substr($path,6);
        }else{
            $path = '';
        }
        // dd($path);
        $cate = new goods;
        $cate->desc = $request->get('desc');
        $cate->tname = $request->get('tname');
        $cate->price = $request->get('price');
        $cate->cid = $request->get('cid');
        $cate->num = $request->get('num');
        $cate->pic = $path;
        $cate->pid = $pid;
        // dd($cate);
        $res = $cate->save();
        // dd($res);
        // $res = $cate->save();
        if($res){
            return redirect('admin/goods/index')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($gid)
    {
        $data = goods::where('gid',$gid)->get();
        return view('admin/good/show',['data'=>$data]);
    }

    public function add(Request $request)
    {
        if($request->hasFile('pic1')){
            $path1 = $request->file('pic1')->store('goods');
            $path1 = substr($path1,6);
        }else{
            $path1 = '';
        }
        if($request->hasFile('pic2')){
            $path2 = $request->file('pic2')->store('goods');
            $path2 = substr($path2,6);
        }else{
            $path2 = '';
        }
        if($request->hasFile('pic3')){
            $path3 = $request->file('pic3')->store('goods');
            $path3 = substr($path3,6);
        }else{
            $path3 = '';
        }
        $cate['gid'] = $request->get('gid');
        $cate['pic1'] = $path1;
        $cate['pic2'] = $path2;
        $cate['pic3'] = $path3;
        // dd($cate);
        $res = DB::table('goodspics')->insert($cate);
        if($res){
            return redirect('admin/goods/index')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 修改主页
    public function edit($gid)
    {
        // dd($gid);
        $data = goods::where('gid',$gid)->get();
        return view('admin/good/update',['data'=>$data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 执行修改
    public function update(Request $request)
    {
        $gid = $request->get('gid');
        if($request->hasFile('pic')){
            $path = $request->file('pic')->store('goods');
            $path = substr($path,6);
        }else{
            $path = '';
        }
        $cate['desc'] = $request->get('desc');
        $cate['tname'] = $request->get('tname');
        $cate['price'] = $request->get('price');
        $cate['num'] = $request->get('num');
        $cate['pic'] = $path;
        $res = DB::table('goods')->where('gid',$gid)->update($cate);
        if($res){
            return redirect('admin/goods/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $gid =  $request->input('gid',0);
        // 删除
        $res = DB::table('goods')->where('gid',$gid)->delete();
        if($res){
            echo "ok";
        }else{
            echo "err";
        }
    }
}
