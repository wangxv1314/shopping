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
    <i class="fa fa-link"></i>  添加链接</div>
  <div class="card-body">
    <div class="table-responsive">
      <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
          <div class="col-sm-12">
            <form action="/admin/links" method="post">
              {{ csrf_field() }}
            <center>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">链接名称</span>
                <input type="text" class="form-control" placeholder="请输入名称" aria-describedby="sizing-addon2" name="lname" value="{{old('lname')}}"><br>
            </div><br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">链接地址</span>
                <input type="text" class="form-control" placeholder="请输入地址" aria-describedby="sizing-addon2" name="url" value="{{old('url')}}"><br>
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