<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Mosbat118 Upload</title>
<link rel="stylesheet" type="text/css" href="reset.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="icon" href="favicon2.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46486506-1', 'mosbat118.com');
  ga('send', 'pageview');

</script>


<script>
function upload(){

 	document.getElementById('loading').style.visibility="visible";
	document.getElementById('loading').style.height="28px";
	document.getElementById('loading').style.margin="0 0 30px 0";
	document.getElementById('form').style.visibility="hidden";
	document.getElementById('form').style.height="30px";
}
</script>
</head>

<body>
<div id="container">
    <div id="container-box" class="center">    	
		<div id="logo"><h1 style="visibility: hidden;height:1px;">مثبت صد و هیژده</h1><a href="/"><img src="logo.png" alt="رادیو مثبت صد و هیژده" style="width:280px; height:150px;"></a></div>
		<div id="last-describ" style="border-radius: 10px;">
		<h1 style="font-family: yekan;">ارسال شماره جدید</h1>
			<form action="functions.php" method="post" enctype="multipart/form-data" id="form">
			<br>
			<label>نام شماره:&nbsp;</label><input type="text" name="name" id="name"><br>
			<label>توضیحات:&nbsp;</label><textarea name="description" id="description"></textarea><br><br>
			<label for="file">انتخاب فایل:</label><input type="file" name="file" id="file" ><br><br>
			
			<input onclick="upload();" type="submit" name="submit" value="ارسال اطلاعات" class="button" style="float:none;">
			</form>
			<div id="loading" style="visibility: hidden; height:1px;">
			<span>در حال آپلود. لطفا شکیبا باشید.</span><br><br>
			<img src="loading.gif">
			</div>
		</div>
		<div id="copyright">
			Copyright &copy; <?php echo Date('Y'); ?> - All Right Reserved.
		</div>
    </div>
</div>
</body>
</html>