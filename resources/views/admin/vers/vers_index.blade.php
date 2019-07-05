@extends('admin/lyout/index')
@section('content')
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-picture-o"></i>  广告列表</div>
  <div class="card-body">
    <div class="table-responsive">
      <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
          <div class="col-sm-12">
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
              <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 113px;">ID</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 87px;" name="pic">图片</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 87px;" name="pic">描述</th>
                  <!-- <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 87px;" name="pic">状态</th> -->
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 87px;">创建时间</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 25px;">操作</th>
                 </tr>
              </thead>
              <tbody>
              	@foreach($vers as $k=>$v)
                <tr role="row" class="odd">
                  <th class="sorting_1">{{$v->vid}}</th>
                  <th><img style="width:90px;height:125px " src="/upload/vers/{{$v->pic}}"></th>
                  <th>{{$v->desc}}</th>
                  <!-- <th>@if($v->status == 0)
                     <kbd>未审核</kbd>
                     @else
                     <kbd style="background:#52a052">已审核</kbd>
                     @endif</th> -->
                  <th>{{$v->created_at}}</th>
                  <th>
              		<form action="/admin/vers/{{$v->vid}}" method="post">
              			{{csrf_field()}}
              			{{method_field('DELETE')}}
						<input type="submit" value="删除" class="btn btn-danger">
                   <!--  @if($v->status ==0)
                         <a href="javascript:;" class="btn btn-success" onclick="changeStatus({{ $v->vid }},0)">激活</a>
                         @else
                         <a href="javascript:;" class="btn btn-primary" onclick="changeStatus({{ $v->vid }},0)" >停止</a>
                         @endif -->
              		</form>
                  </th></tr>
                 @endforeach
              </tbody>
            </table>
            <!-- <script type="text/javascript">
              function changeStatus(vid,sta)
              {
                if(sta == 1){
                  // 赋值
                  $('#myModal form input[type=radio]').eq(1).attr('checked',true);
                }else{
                  $('#myModal form input[type=radio]').eq(0).attr('checked',true);
                }

                // 赋值
                $('#myModal form input[type=hidden]').eq(0).val(vid);

                $('#myModal').modal('show')
              }
          
            </script> -->
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div></div>
@endsection