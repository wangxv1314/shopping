<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\models\Cates;
class CatesController extends Controller
{
    public static function getCateData()
    {
       $cates = Cates::select('*',DB::raw("concat(path,',',cid) as paths"))->orderBy('paths','asc')->get();
       
       foreach ($cates as $key => $value) {
            // dd($value);
            $n = substr_count($value->path, ',');
            // dd($n);
            $cates[$key]->cname =  str_repeat('～',$n).$value->cname;
       }
       return $cates;
    }
    /**
     * Display a listing of the resource.
     * 列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "列表";
        $pid = self::getCateData();
        foreach($pid as $k=>$v){
            $v->pid = $v->cname;
            // dd($v);
            // return $pid;
        }
        // dd($pid);
        return view('admin/cates/index',['cates'=>self::getCateData(),'pid'=>$pid]);
    }

    /**
     * Show the form for creating a new resource.
     * 添加模板
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // echo "添加";
        // $data = Cates::all();
        $cid = $request->input('cid',0);
        // dd($data);
        return view('admin/cates/create',['cid'=>$cid,'cates'=>self::getCateData()]);
    }

    /**
     * Store a newly created resource in storage.
     * 执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "执行添加";
        $pid = $request->input('pid',0);
        // dd($pid);
        // dump($request->all());
        if($pid == 0){
            $path = 0;
            // dd($path);
        }else{
            // 获取父级数据
            $parent_data = Cates::find($pid);
            // dd($parent_data);
            $path = $parent_data->path.','.$parent_data->cid;
            // dd($path);
        }
        // 将数据压入数据库
        // dd($path);
        $cate = new Cates;
        $cate->cname = $request->input('cname','');
        $cate->pid = $pid;
        $cate->path = $path;
        $res = $cate->save();
        if($res){
            return redirect('admin/cates/index')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
        
    }

    /**
     * Display the specified resource.
     * 搜索
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 修改
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 执行修改
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * 删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cid =  $request->input('cid',0);
        // 删除
        $res = Cates::destroy('cid',$cid);
        if($res){
            echo "ok";
        }else{
            echo "err";
        }
    }
}
