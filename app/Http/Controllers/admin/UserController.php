<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use App\Models\User;
use App\Models\Userdetails;
use Hash;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $users = User::paginate(100);
        //
        return view('admin.user.user_index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.user_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $data = $request->all();
        //dump($data);
        //接收数据
        $user = new User;
        $user->account = $data['account'];
        $user->upass = Hash::make($data['upass']);
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $res1 = $user->save();
        if($res1){
            //获取uid
            $uid = $user->id;
        }
        if($res1){
            DB::commit();
            return redirect('user/index')->with('success','添加成功');
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
    public function edit($uid)
    {
        $user = User::find($uid);
        // echo "修改页面";
        return view('admin.user.user_edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        //
        $this->validate($request,[
            'password'=>'required|regex:/^[\w]{6,18}$/',
            'repass'=>'required|same:password',
        ],[
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            'repass.required'=>'确认密码不能为空',
            'repass.same'=>'两次密码不一致',
        ]);
        $result = DB::table('users')->where('uid',$uid)->first();
        //密码加密
        $res['upass'] = Hash::make($request->upass);
        
    
        $data = DB::table('users')->where('uid',$uid)->update($res);
        if($data){
            return redirect('admin/user')->with('success','修改成功');
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        $res1 = User::destroy($uid);
        if($res1){
            DB::commit();
            return redirect('admin/user')->with('success','删除成功');
        }else{
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
}
