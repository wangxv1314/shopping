<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storelinks;
use App\Models\Links;
use DB;

class LinksController extends Controller
{
    //
    public function index()
    {
    	$link = Links::paginate(100);
    	return view('admin.links.links_index',['links'=>$link]);
    }

    public function create()
    {
    	return view('admin.links.links_create');
    }

    public function store(StoreLinks $request)
    {
    	$data = $request->all();
    	$link = new Links;
    	$link->lname = $data['lname'];
    	$link->url = $data['url'];
    	$res = $link->save();
    	if($res){
    		DB::commit();
    		return redirect('admin/links')->with('success','添加成功');
    	}else{
    		DB::rollBack();
    		return back()->with('error','添加失败');
    	}
    }

    public function destroy($lid)
    {
    	//echo $lid;
    	$res = Links::destroy($lid);
    	if($res){
    		DB::commit();
    		return redirect('admin/links')->with('success','删除成功');
    	}else{
    		DB::rollBack();
    		return back()->with('erorr','删除失败');
    	}
    }

    public function changeStatus(Request $request,$lid)
    {
        $status = $request->input('status');

        // $bid = $request->input('bid');
        // dd($bid);
        

        // 执行修改
        $res = DB::table('links')->where('lid',$lid)->update(['status'=>$status]);
        if($res){
            return back()->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }

    }
}
