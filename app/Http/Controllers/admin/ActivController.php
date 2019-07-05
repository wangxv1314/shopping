<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Activ;
use DB;

class ActivController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('activitys')->get();
        return view('admin/activ/activ_index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // echo "添加";
        return view('admin.activ.activ_create');
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
            $path = $request->file('pic')->store('activ');
            $path = substr($path,6);
        }else{
            $path = '';
        }
        //
        $data = $request->all();
        //dump($data);
        $activ['pic'] = $path;
        $activ['desc'] = $request->get('desc','');
        $activ['aname'] = $request->get('aname','');
        // dd($activ);
        $res = DB::table('activitys')->insert($activ);
        if($res){
            return redirect('/activ/index')->with('success','添加成功');
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
    public function destroy(Request $request)
    {
        $aid =  $request->input('aid',0);
        echo $aid;
        // 删除
        $res = DB::table('activitys')->where('aid',$aid)->delete();
        if($res){
            echo "ok";
        }else{
            echo "err";
        }
    }
}
