<!DOCTYPE HTML>
<html>
<head>
<title>后台登录</title>
<link href="/a/login/css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<!-- -->

<script src="/a/js/jquery.min.js"></script>

</head>
<body>
<!-- contact-form -->	
<div class="message warning">
	<!-- @if(session('error'))
	<div>{{ session('error') }}</div>
	@endif -->
<div class="inset">
	<div class="login-head">
		<h1>用户登录</h1>	
	</div>
		<form action="/admin/dologin" method="post">
			{{ csrf_field() }}
			<li>
				<input type="text" class="text" placeholder="用户名" id="uname" name="uname"><a href="#" class=" icon user"></a>
			</li>
				<div class="clear"> </div>
			<li>
				<input type="password" id="upass" name="upass" placeholder="密码"> <a href="#" class="icon lock"></a>
			</li>
			
			<div class="submit">
				<input type="submit" value="登录" >
				<h4><a href="#">忘记密码?</a></h4>
			 	<div class="clear">  </div>	
			</div>	
		</form>
		</div>					
	</div>
	<div class="clear"> </div>
<!--- footer --->
<div class="footer">
	<p>PHP215 : 王旭 &copy; 2019-05-27</p>
</div>

</body>
</html>