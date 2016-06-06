<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('resources/views/Admin/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('resources/views/Admin/style/font/css/font-awesome.min.css')}}">
	<script type="text/javascript" src="{{asset('resources/views/Admin/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/Admin/style/js/ch-ui.admin.js')}}"></script>
</head>
<body>
	@yield('content')
			<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2015. Powered By <a href="http://www.houdunwang.com">http://www.houdunwang.com</a>.
	</div>
	<!--底部 结束-->
</body>
</html>