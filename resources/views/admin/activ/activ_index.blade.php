@extends('admin/lyout/index')
@section('content')

<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>  活动管理</div>
        <div class="card-body">
          <div class="table-responsive">
          @if(session('error'))
             <div class="mws-form-message error">
                {{ session('error') }}
             </div>
          @endif       
            

          @if(session('success'))
             <div class="mws-form-message success">
                {{ session('success') }}
             </div>
          @endif
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr align="center">
                  <th>序号</th>
                  <th>活动名称</th>
                  <th>活动描述</th>
                  <th>活动图片</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tfoot>
                <tr align="center">
                  <th>序号</th>
                  <th>活动名称</th>
                  <th>活动描述</th>
                  <th>活动图片</th>
                  <th>操作</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($data as $k=>$v)
                  <tr align="center">
                      <td>{{ $v->aid }}</td>
                      <td>{{ $v->aname }}</td>
                      <td>{{ $v->desc }}</td>
                      <td><img src="/upload/activ/{{ $v->pic }}" style="width: 80px;"></td>
                      <td>
                        <a href="#" class="btn btn-info">修改</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="javascript:;" class="btn btn-danger" onclick="del({{$v->aid}},this)">删除</a>
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
              function del(aid,obj){
                if(!window.confirm('你确定要删除吗?')){
                  return false;
                }

                $.get('/admin/activ/destroy',{aid:aid},function(res){
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