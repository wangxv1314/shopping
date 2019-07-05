<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::paginate(100);
        //
        return view('admin.banner.banner_index',['banner'=>$banner]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // echo "bbb";
        return view('admin.banner.banner_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('pic')){
            $path = $request->file('pic')->store('banners');
            $path = substr($path,8);
        }else{
            $path = '';
        }
        // dd($path);
        //
        $data = $request->all();
        //dump($data);
        $banner = new Banner;
        $banner->pic = $path;
        $res = $banner->save();
        if($res){
            DB::commit();
            return redirect('admin/banner')->with('success','添加成功');
        }else{
            DB::rollBack();
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bid)
    {
        //
        //echo $id;
        $res = Banner::destroy($bid);
        if($res){
            DB::commit();
            return redirect('admin/banner')->with('success','删除成功');
        }else{
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }

     public function changeStatus(Request $request,$bid)
    {
        $status = $request->input('status');

        // $bid = $request->input('bid');
        // dd($bid);
        

        // 执行修改
        $res = DB::table('banners')->where('bid',$bid)->update(['status'=>$status]);
        if($res){
            return back()->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }

    }
}
