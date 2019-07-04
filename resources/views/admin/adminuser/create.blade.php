@extends('admin/lyout/index')
@section('content')
<div style="margin-left:500px;width:556px;">
    @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    <form class="form-inline" action="/admin/adminuser" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label class="control-label" for="inputGroupSuccess3">用户名</label>
        &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;
        <span class="input-group-addon" style="width:45px;">CD</span>
        <input type="text" class="form-control" id="uname" name="uname" style="width:400px;"><br><br><br>


        <label class="control-label" for="inputGroupSuccess3">密&nbsp;&nbsp;码</label>
        &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="input-group-addon" style="width:45px;">CD</span>
        <input type="text" class="form-control" id="password" name="password" style="width:400px;"><br><br><br>

        <label class="control-label" for="inputGroupSuccess3">确认密码</label>
        &nbsp;&nbsp;&nbsp;:&nbsp;
        <span class="input-group-addon" style="width:45px;">CD</span>
        <input type="text" class="form-control" id="repass" name="repass" style="width:400px;"><br><br><br>

        <label class="control-label" for="inputGroupSuccess3">角&nbsp;&nbsp;色</label>
        &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       
        @foreach($roles_data as $k=>$v)
        <input type="radio" {{ $v->rname == '普通员工' ? 'checked' : '' }} name="rid" value="{{ $v->id }}"> <label>{{ $v->rname }}</label>
        &nbsp;&nbsp;&nbsp;&nbsp;
        @endforeach
        <br><br><br>


        <button class="btn btn-info btn-lg btn-block" style="width:400px;margin-left:100px;">创建用户</button>
    </form>
</div>
@endsection