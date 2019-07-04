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
    <form class="form-inline" action="/admin/nodes" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label class="control-label" for="inputGroupSuccess3">权限名称</label>
        &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;
        <span class="input-group-addon" style="width:45px;">CD</span>
        <input type="text" class="form-control" id="desc" name="desc" style="width:400px;"><br><br><br>


        <label class="control-label" for="inputGroupSuccess3">控制器名称</label>
        &nbsp;&nbsp;:&nbsp;
        <span class="input-group-addon" style="width:45px;">CD</span>
        <input type="text" class="form-control" id="cname" name="cname" style="width:400px;"><br><br><br>

        <label class="control-label" for="inputGroupSuccess3">方法名称</label>
        &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;
        <span class="input-group-addon" style="width:45px;">CD</span>
        <input type="text" class="form-control" id="aname" name="aname" style="width:400px;"><br><br><br>


        <button class="btn btn-info btn-lg btn-block" style="width:400px;margin-left:100px;">新建权限</button>
    </form>
</div>
@endsection