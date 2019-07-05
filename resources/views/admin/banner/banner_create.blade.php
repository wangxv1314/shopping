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
    <i class="fa fa-picture-o"></i>  添加轮播</div>
  <div class="card-body">
    <div class="table-responsive">
      <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
          <div class="col-sm-12">
            <form action="/admin/banner" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
            <center>
                <label class="input-group-addon" id="sizing-addon2">插入轮播图</label>
                <input type="file" class="form-control" placeholder="" aria-describedby="sizing-addon2" name="pic"><br><br>
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