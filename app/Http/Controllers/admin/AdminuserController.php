<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('admin_users')->get();
        return view('admin.adminuser.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        // 获取所有的 角色
        $roles_data = DB::table('roles')->get();

        return view('admin.adminuser.create',['roles_data'=>$roles_data]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dump($request->all());
        DB::beginTransaction();
        $uname = $request->input('uname',''); 
        $upass = $request->input('password',''); 
        $repass = $request->input('repass',''); 
        $rid = $request->input('rid','');
        // dd($rid);

        if($upass != $repass){
            return back()->with('error','俩次密码不一致');
        }

        // 文件上传
        

        $temp['uname'] = $uname;
        $temp['upass'] = Hash::make($upass);
        


        $uid = DB::table('admin_users')->insertGetId($temp);

        $res  = DB::table('adminusers_roles')->insert(['uid'=>$uid,'rid'=>$rid]);

        if($uid && $res){
            DB::commit();
            return redirect('admin/adminuser')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
            DB::rollBack();
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
        $id =  $request->input('id',0);
        // dd($id);
        // 删除
        $res = DB::table('admin_users')->where('id',$id)->delete();
        if($res){
            echo "ok";
        }else{
            echo "err";
        }
    }
}
