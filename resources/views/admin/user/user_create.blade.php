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
    <i class="fa fa-user"></i>  用户添加</div>
  <div class="card-body">
    <div class="table-responsive">
      <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
          <div class="col-sm-12">
            <form action="/admin/user" method="post">
              {{ csrf_field() }}
            <center>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">账号</span>
                <input type="text" class="form-control" placeholder="请输入账号" aria-describedby="sizing-addon2" name="account" value="{{old('account')}}"><br>
            </div><br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">密码</span>
                <input type="password" class="form-control" placeholder="请输入密码" aria-describedby="sizing-addon2" name="upass"><br>
            </div><br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">确认密码</span>
                <input type="password" class="form-control" placeholder="请输入密码" aria-describedby="sizing-addon2" name="repass"><br>
            </div><br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">电话</span>
                <input type="text" class="form-control" placeholder="请输入电话" aria-describedby="sizing-addon2" name="phone" value="{{old('phone')}}"><br><br>
            </div><br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">邮箱</span>
                <input type="text" class="form-control" placeholder="请输入邮箱" aria-describedby="sizing-addon2" name="email" value="{{old('email')}}"><br><br>
            </div><br>
              <input class="btn btn-default" type="submit" name="" value="添加">
           
              </center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection