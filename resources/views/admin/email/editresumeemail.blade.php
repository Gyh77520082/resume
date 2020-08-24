<!DOCTYPE html>
<html>
<head>
  
       <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
<body>
	<center>
		<p>您的简历填写有误请点击连接前往核对修改	{{$url}}/editresumeemail?resumeid={{ $resume->id }}&token={{$resume->token}}	
		</p>
	</center>
</body>
</html>
