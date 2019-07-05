<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class RolesController extends Controller
{
    public static function conall()
    {
        return [
            'usercontroller'=>'用户管理',
            // 'userscontroller'=>'用户管理',
            'catescontroller'=>'分类管理',
            'goodcontroller'=>'商品管理',
            'adminusercontroller'=>'管理员管理',
            'nodescontroller'=>'权限管理',
            'ordercontroller'=>'订单管理',
            'rolescontroller'=>'角色管理',
            'linkscontroller'=>'友链管理',
            'bannercontroller'=>'轮播图管理',
            'verscontroller'=>'广告管理',
            'discusscontroller'=>'评论管理',
            'activcontroller'=>'活动管理',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles_data = DB::table('roles')->get();

        // 加载模板
        return view('admin.roles.index',['roles_data'=>$roles_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*[
            'usercontroller'=>['index','create','xxxx']
            'catecontroller'=>['index','create','xxxx']
        ]*/

        $nodes_data = DB::table('nodes')->get();

        $list = [];
        foreach($nodes_data as $k=>$v){
            $temp['id'] = $v->id;
            // $temp['cname'] = $v->cname;
            $temp['aname'] = $v->aname;
            $temp['desc'] = $v->desc;
            $list[$v->cname][] = $temp;
        }
        // dd($list);

        // 加载模板
        return view('admin.roles.create',['list'=>$list,'conall'=>self::conall()]);
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
       DB::beginTransaction();

        $rname = $request->input('rname','');

        $nids = $request->input('nids');

        // 添加角色表
        $rid = DB::table('roles')->insertGetId(['rname'=>$rname]);

        // 添加角色关系表
        foreach ($nids as $k => $v) {
           $res =  DB::table('roles_nodes')->insert(['rid'=>$rid,'nid'=>$v]);  
        }


        if($rid && $res){
            DB::commit();
            return redirect('admin/roles')->with('success','添加成功');
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
    public function destroy($id)
    {
        //
    }
}
