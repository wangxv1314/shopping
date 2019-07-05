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
    <i class="fa fa-link"></i>  添加广告</div>
  <div class="card-body">
    <div class="table-responsive">
      <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
          <div class="col-sm-12">
            <form action="/admin/vers" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
            <center>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">图片</span>
                <input type="file" class="form-control" placeholder="请选择图片" aria-describedby="sizing-addon2" name="pic" value="{{old('lname')}}"><br>
            </div><br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">广告地址</span>
                <input type="text" class="form-control" placeholder="请输入地址" aria-describedby="sizing-addon2" name="url" value="{{old('url')}}"><br>
            </div><br>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">广告描述</span>
                <textarea class="form-control" name="desc" id="desc" placeholder="请输入20字以内的描述" style="width:300px;height:100px"></textarea><br>
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