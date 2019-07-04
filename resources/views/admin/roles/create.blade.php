
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
    <form class="form-inline" action="/admin/roles" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label class="control-label" for="inputGroupSuccess3">角色名称</label>
        &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;
        <span class="input-group-addon" style="width:45px;">CD</span>
        <input type="text" class="form-control" id="rname" name="rname" style="width:400px;"><br><br><br>

        <label class="control-label" for="inputGroupSuccess3">角色权限</label>
        &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;
        <div class="mws-form-item clearfix">         
            @foreach($list as $k=>$v)
            <h5>{{ $conall[$k] }} <small>{{ $k }}</small> </h5>
                @foreach($v as $kk=>$vv)
                <input type="checkbox" name="nids[]" value="{{ $vv['id'] }}" style="margin-left: 100px;">
                <span>{{ $vv['desc'] }}</span>
                @endforeach
            @endforeach
        </div><br><br><br><br><br><br>


        <button class="btn btn-info btn-lg btn-block" style="width:400px;margin-left:100px;">创建角色</button>
    </form>
</div>
@endsection
