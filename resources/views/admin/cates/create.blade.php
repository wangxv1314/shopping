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
	<form class="form-inline" action="/admin/cates/store" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
	    <label class="control-label" for="inputGroupSuccess3">菜单名称</label>
	    &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
	    <span class="input-group-addon" style="width:45px;">CD</span>
	    <input type="text" class="form-control" id="cname" name="cname" style="width:400px;"><br><br><br>


	    <label>所属分类</label>
	    &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
	    <span class="input-group-addon" style="width:45px;">FL</span>
	   	<select class="form-control" style="width: 400px;" name="pid" id="pid">
			<option value="0">--请选择--</option>
				@foreach($cates as $k=>$v)
				<option value="{{ $v->cid }}" {{ substr_count($v->path,',') >= 2 ? 'disabled' : '' }} {{ $v->cid == $cid ? 'selected' : '' }}>{{ $v->cname }}</option>
				@endforeach
	   	</select><br><br><br>


	    <button class="btn btn-info btn-lg btn-block" style="width:400px;margin-left:100px;">创建菜单</button>
	</form>
</div>
@endsection