<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVers;
use App\Models\Vers;
use DB;

class VersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vers = Vers::paginate(100);
        //
        //echo "广告列表";
        return view('admin.vers.vers_index',['vers'=>$vers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // echo "广告添加";
        return view('admin.vers.vers_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVers $request)
    {
        //
        if($request->hasFile('pic')){
            $path = $request->file('pic')->store('vers');
            $path = substr($path,5);
        }else{
            $path = '';
        }
        $data = $request->all();
        //dump($data);
        $vers = new Vers;
        $vers->pic = $path;
        $vers->url = $data['url'];
        $vers->desc = $data['desc'];
        $res = $vers->save();
        if($res){
            DB::commit();
            return redirect('admin/vers')->with('success','添加成功');
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
    public function destroy($vid)
    {
        //
        // echo $id;
        $res = Vers::destroy($vid);
        if($res){
            DB::commit();
            return redirect('admin/vers')->with('success','删除成功');
        }else{
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }

    // public function changeStatus(Request $request,$vid)
    // {
    //     $status = $request->input('status');

    //     // $bid = $request->input('bid');
    //     // dd($bid);
        

    //     // 执行修改
    //     $res = DB::table('vers')->where('vid',$vid)->update(['status'=>$status]);
    //     if($res){
    //         return back()->with('success','修改成功');
    //     }else{
    //         return back()->with('error','修改失败');
    //     }

    // }
}
