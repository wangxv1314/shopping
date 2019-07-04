@extends('admin/lyout/index')
@section('content')

<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>  分类管理</div>
        <div class="card-body">
          <div class="table-responsive">
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr align="center">
                  <th>序号</th>
                  <th>分类名称</th>
                  <th>父类ID</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tfoot>
                <tr align="center">
                  <th>序号</th>
                  <th>分类名称</th>
                  <th>父类ID</th>
                  <th>操作</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($cates as $k=>$v)
                  <tr align="center">
                      <td>{{ $v->cid }}</td>
                      <td>{{ $v->cname }}</td>
                      <td>{{ $v->pid }}</td>
                      <td>
                        @if(substr_count($v->path,',') < 2)
                        <a href="/admin/cates/create?cid={{ $v->cid }}" class="btn btn-info">添加子分类</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="javascript:;" class="btn btn-danger" onclick="del({{$v->cid}},this)">删除</a>
                        @else
                        <a href="/admin/cates/create?cid={{ $v->cid }}" class="btn btn-danger disabled">添加子分类</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="javascript:;" class="btn btn-danger" onclick="del({{$v->cid}},this)">删除</a>
                        @endif
                        
                      </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      <script type="text/javascript">
              //删除
              function del(cid,obj){
                if(!window.confirm('你确定要删除吗?')){
                  return false;
                }

                $.get('/admin/cates/destroy',{cid:cid},function(res){
                  if(res == 'ok'){
                    // 删除tr节点
                    $(obj).parent().parent().remove();
                  }else{
                    alert('删除失败')
                  }
                },'html');
              }
            </script>
@endsection