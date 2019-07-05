@extends('admin/lyout/index')
@section('content')
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-user"></i>用户列表</div>
  <div class="card-body">
    <div class="table-responsive">
      <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
          <div class="col-sm-12">
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
              <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 113px;">ID</th>
                 
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 25px;">评论内容</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 87px;">评论时间</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 167px;">操作</th>
                 </tr>
              </thead>
              <tbody>
                @foreach($discuss as $k=>$v)
                <tr role="row" class="odd">
                  <th>{{ $v->did}}</th>
                
                  <th class="sorting_1">{{$v->content}}</th>
                  <th>{{$v->dtime}}</th>
                  <th>
          <form action="/admin/user/{{ $v->id }}" method="post" style="display: inline-block;">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <input type="submit" value="删除" class="btn btn-danger">
            </form>
                  </th></tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div></div>
@endsection