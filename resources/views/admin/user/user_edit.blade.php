@extends('admin/lyout/index')
@section('content')
  @if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
    </div>
  @endif
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-user"></i>  用户修改</div>
  <div class="card-body">
    <div class="table-responsive">
      <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
          <div class="col-sm-12">
            <form action="/admin/user/{{$user->uid}}" method="post">
              {{ csrf_field() }}
              {{method_field('PUT')}}
            <center>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">账号</span>
                <input type="text" class="form-control" placeholder="请输入账号" aria-describedby="sizing-addon2" name="account" value="{{$user->account}}" readonly><br>
            </div><br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">新密码</span>
                <input type="password" class="form-control" placeholder="请输入新密码" aria-describedby="sizing-addon2" name="password"><br>
            </div><br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">确认新密码</span>
                <input type="password" class="form-control" placeholder="请确认新密码" aria-describedby="sizing-addon2" name="repass"><br>
            </div><br>
              <input class="btn btn-primary" type="submit" name="" value="修改">
           
              </center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection