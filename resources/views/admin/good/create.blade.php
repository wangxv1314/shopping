@extends('admin/lyout/index')
@section('content')
<style type="text/css">
	.file {
			position: relative;
			display: inline-block;
			background: #D0EEFF;
			border: 1px solid #99D3F5;
			border-radius: 4px;
			padding: 4px 12px;
			overflow: hidden;
			color: #1E88C7;
			text-decoration: none;
			text-indent: 0;
			line-height: 20px;
			width: 400px;
			height: 39px;
		}
		.file input {
			position: absolute;
			font-size: 100px;
			right: 0;
			top: 0;
			opacity: 0;
		}
		.file:hover {
			background: #AADFFD;
			border-color: #78C3F3;
			color: #004974;
			text-decoration: none;
		}
</style>
<div style="margin-left:500px;width:556px;">
	@if(session('error'))
	     <div class="mws-form-message error">
	        {{ session('error') }}
	     </div>
	@endif       
	    

	@if(session('success'))
	     <div class="mws-form-message success">
	        {{ session('success') }}
	     </div>
	@endif
	<form class="form-inline" action="/admin/goods/store" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
	    <label class="control-label" for="inputGroupSuccess3">商品名称</label>
	    &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
	    <span class="input-group-addon" style="width:45px;">TN</span>
	    <input type="text" class="form-control" id="tname" name="tname" style="width:400px;"><br><br><br>


	    <label class="control-label" for="inputGroupSuccess3">商品描述</label>
	    &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
	    <span class="input-group-addon" style="width:45px;">DE</span>
	    <input type="text" class="form-control" id="desc" name="desc" style="width:400px;"><br><br><br>


	    <label class="control-label" for="inputGroupSuccess3">商品价格</label>
	    &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
	    <span class="input-group-addon" style="width:45px;">PR</span>
	    <input type="text" class="form-control" id="price" name="price" style="width:400px;"><br><br><br>


	    <label class="control-label" for="inputGroupSuccess3">商品图片</label>
	    &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
	    <span class="input-group-addon" style="width:45px;">PI</span>
	    <a href="javascript:;" class="file">选择文件<input type="file" name="pic" id="pic"></a><br><br><br>
	    


	    <label class="control-label" for="inputGroupSuccess3">商品数量</label>
	    &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
	    <span class="input-group-addon" style="width:45px;">NM</span>
	    <input type="text" class="form-control" id="num" name="num" style="width:400px;"><br><br><br>


	    <label>所属分类</label>
	    &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
	    <span class="input-group-addon" style="width:45px;">FL</span>
	   	<select class="form-control" style="width: 400px;" name="cid" id="cid">
			<option value="0" disabled>--请选择--</option>
				@foreach($cates as $k=>$v)
				<option value="{{ $v->cid }}">{{ $v->cname }}</option>
				@endforeach
	   	</select><br><br><br>


	    <button class="btn btn-info btn-lg btn-block" style="width:400px;margin-left:100px;">添加商品</button>
	</form>
</div>

@endsection