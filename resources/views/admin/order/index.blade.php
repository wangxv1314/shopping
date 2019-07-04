@extends('admin/lyout/index')
@section('content')
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>  订单管理</div>
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
                  <th>订单号</th>
                  <th>商品总价</th>
                  <th>下单时间</th>
                  <th>成交时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tfoot>
                <tr align="center">
                  <th>序号</th>
                  <th>订单号</th>
                  <th>商品总价</th>
                  <th>下单时间</th>
                  <th>成交时间</th>
                  <th>操作</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($order as $k=>$v)
                  <tr align="center">
                      <td>{{ $v->oid }}</td>
                      <td>{{ $v->ordernum }}</td>
                      <td>{{ $v->oprice }}</td>
                      <td>{{ $v->addtime }}</td>
                      <td>{{ $v->otime }}</td>
                      <td>
                        <a href="javascript:;" class="btn btn-danger" onclick="del({{$v->oid}},this)">删除订单</a>
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
              function del(oid,obj){
                if(!window.confirm('你确定要删除吗?')){
                  return false;
                }

                $.get('/admin/order/destroy',{oid:oid},function(res){
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