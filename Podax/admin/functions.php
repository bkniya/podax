<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Mosbat118 Upload</title>
<link rel="stylesheet" type="text/css" href="reset.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="icon" href="favicon2.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
<div id="container">
    <div id="container-box" class="center">    	
		<div id="logo"><h1 style="visibility: hidden;height:1px;">مثبت صد و هیژده</h1><a href="/"><img src="logo.png" alt="رادیو مثبت صد و هیژده" style="width:280px; height:150px;"></a></div>
		<div id="last-describ" style="border-radius: 10px;"><br>




<?php
$error=true;


$allowedExts = array("mp3", "ogg", "wav", "wma");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "نام فایل: " . $_FILES["file"]["name"] . "<br>";
    echo "حجم: " . (round($_FILES["file"]["size"] / 1024000,2)) . " مگابایت<br><br>";

    if (file_exists("archive/" . $_FILES["file"]["name"]))
      {
      echo " این فایل از قبل وجود دارد. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "archive/" . $_FILES["file"]["name"]);
      echo "لینک اشتراک‌گذاری: <br>" . "http://mosbat118.com/archive/" . $_FILES["file"]["name"];
      $error=false;
      }
    }
  }
else
  {
  echo "فایل معیوب است یا فرمت آن صحیح نیست.";
  }


if($error==false)
{
  include('database.php');
$name = $_POST['name'];
$description = $_POST['description'];
$link = "http://mosbat118.com/archive/" . $_FILES["file"]["name"];

mysql_query("INSERT INTO posts (name,description,link) VALUES('$name','$description','$link')")
or die(mysql_error());
  echo ("<br><br><span style='color:green;'>اطلاعات با موفقیت ثبت شد.</span><br><a href='/'>بازگشت</a>"); 
}
else
{
   echo ("<br><br><span style='color:red;'>اطلاعات ثبت نشد.</span><br><br><a href='/upload.php'>بازگشت</a>");  
}





?>
		</div>
		<div id="copyright">
			Copyright &copy; <?php echo Date('Y'); ?> - All Right Reserved.
		</div>
    </div>
</div>
</body>
</html>