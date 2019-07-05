@extends('admin/lyout/index')
@section('content')
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-picture-o"></i>  轮播列表</div>
  <div class="card-body">
    <div class="table-responsive">
      <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
          <div class="col-sm-12">
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
              <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 113px;">ID</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 87px;" name="pic">轮播图片</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 87px;">状态</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 87px;">创建时间</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 25px;">操作</th>
                 </tr>
              </thead>
              <tbody>
              	@foreach($banner as $k=>$v)
                <tr role="row" class="odd">
                  <th class="sorting_1">{{$v->bid}}</th>
                  <th><img style="width:90px;height:125px" src="/upload/banners/{{$v->pic}}"></th>
                  <th>
                     @if($v->status == 0)
                     <kbd>激活</kbd>
                     @else
                     <kbd style="background:#52a052">未激活</kbd>
                     @endif
                  </th>
                  <th>{{$v->created_at}}</th>
                  <th>
              		    <form action="/admin/banner/{{$v->bid}}" method="post">
              			     {{csrf_field()}}
              			     {{method_field('DELETE')}}
						             <input type="submit" value="删除" class="btn btn-danger">
                         @if($v->status ==0)
                         <a href="javascript:;" class="btn btn-success" onclick="changeStatus({{ $v->bid }},0)">激活</a>
                         @else
                         <a href="javascript:;" class="btn btn-primary" onclick="changeStatus({{ $v->bid }},0)">未激活</a>
                         @endif
              		</form>
                  </th>
                </tr>
                 @endforeach
              </tbody>
            </table>
            <script type="text/javascript">
              function changeStatus(bid,sta)
              {
                if(sta == 1){
                  // 赋值
                  $('#myModal form input[type=radio]').eq(1).attr('checked',true);
                }else{
                  $('#myModal form input[type=radio]').eq(0).attr('checked',true);
                }

                // 赋值
                $('#myModal form input[type=hidden]').eq(0).val(bid);

                $('#myModal').modal('show')
              }
          
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">轮播图状态</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>        
      </div>
      <div class="modal-body">
        <form action="/banner/changeStatus/{{$v->bid}}" method="get">
          <input type="hidden" name="id">
          <div class="form-group">
            开启:<input type="radio" name="status" value="0" >
            未开启:<input type="radio" name="status" value="1">
          </div>
          <button type="submit" class="btn btn-info">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
     </div>
    </div>
  </div>
</div>

  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div></div>
@endsection