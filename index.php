<!DOCTYPE html>

<!--
// Podax v1.0 
// Podcast Managment System
// By Alireza Gholami
// Copyleft (2014)
-->

<?php

	//Get Site options informations
	include('database.php');

	function get_detail($id,$type,$output)
	{
	if($type=='options')
		{
			$optionstemp=mysql_query("SELECT * FROM options WHERE id=0");
			$options = mysql_fetch_array($optionstemp);	
			switch ($output) {
				case 'echo':
					echo $options[$id];
					break;
				case 'return':
					return $options[$id];
					break;						
				default:
					return "Error";
					break;
			}		
		}
	elseif ($type=='users') 
		{	
			$userstemp=mysql_query("SELECT * FROM users WHERE id=1");
			$users = mysql_fetch_array($userstemp);	
			switch ($output) {
				case 'echo':
					echo $users[$id];
					break;
				case 'return':
					return $users[$id];
					break;						
				default:
					return "Error";
					break;
			}	
		}
	}

	//Get Language Info and Style
	include("langs/".get_detail(6,'options','return').".php");
	function get_rtl()
	{if (get_detail(6,'options','return')=='fa-ir')
	{echo '<link rel="stylesheet" type="text/css" href="styles/rtl.css">';}
	}

	//Get Last Number of Custom Number Info
	@$id=$_GET['id'];
	if(!isset($id))
	{
		$last=mysql_query("SELECT id,name,description,like_count,views,link FROM posts ORDER BY id DESC LIMIT 1;");
		$row = mysql_fetch_array($last);
		$views=$row[4]+1;	
		mysql_query("UPDATE posts SET views=$views WHERE id=$row[0]");
	}
	else
	{
		$last=mysql_query("SELECT id,name,description,like_count,views,link FROM posts WHERE id=$id");
		$row = mysql_fetch_array($last);	
		$views=$row[4]+1;		
		mysql_query("UPDATE posts SET views=$views WHERE id=$id");		
	}
	$title= " ".$row[0] . ": " . $row[1];



?>

<html>
<head>
<title><?php get_detail(1,'options','echo');?></title>
<!--Styles-->
<link rel="stylesheet" type="text/css" href="styles/reset.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<?php get_rtl(); ?>
<!--Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<!--Javascript-->
<script src="js/jquery-2.0.3.min.js"></script>
<script src="js/scripts.js"></script>
<script>
var liked=false;
localStorage.setItem("liked",false);
function like()
	{
		var xmlhttp;
		if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}
		else {xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
		xmlhttp.onreadystatechange=function()
		  {if (xmlhttp.readyState==4 && xmlhttp.status==200)
		  {document.getElementById("like_count").innerHTML=xmlhttp.responseText;}}

	if (liked==false){
		xmlhttp.open("GET","functions/like.php?id=<?php echo $row[0]; ?>&likes=<?php echo $row[3]; ?>&action=like",true);
		xmlhttp.send();
		document.getElementById('liker').innerHTML="Unlike";
		localStorage.setItem("liked",true);
		liked=true;
	}
	else
	{
		xmlhttp.open("GET","functions/like.php?id=<?php echo $row[0]; ?>&likes=<?php echo $row[3]; ?>&action=unlike",true);
		xmlhttp.send();
		document.getElementById('liker').innerHTML="Like";
		localStorage.setItem("liked",false);		
		liked=false;
	}
		


}
</script>
<!-- MetaTags -->
<meta charset="utf-8">
<meta name="author" content="<?php get_detail(3,'users','echo');?>">
<meta name="description" content="<?php get_detail(2,'options','echo');?>">
<meta name="robots" content="index,follow">
</head>


<body>
<div id="container">
    <div id="container-div" class="center">    	

    	<!--Logo-->
		<div id="logo">
		<h1><?php get_detail(1,'options','echo');?></h1>
		<a href="/"><img src="images/logo.png" alt=""></a>
		</div>

		<!--Last-->
		<div id="last-describ">
			<audio controls preload="none">
			  <source src="<?php echo $row[5]; ?>" type="audio/mpeg">
			  <embed src="<?php echo $row[5]; ?>">
			</audio>
			<span>
				<a href="/index.php?id=<?php echo $row[0]; ?>"><h2><?php echo get_lang(11,'return').$title; ?></h2></a>
				<p><?php echo $row[2]; ?></p>
			</span>
		</div>
		<div id="last-describ-opt">
			<span id="last-describ-opt-like"><button class="button" id="liker" onclick="like();"><?php get_lang(1);?></button></span> <span id="like_count">(<?php echo $row[3]; ?> <?php get_lang(2);?>)</span>
			<a href="functions/download.php?file=<?php echo $row[5]; ?>"><button id="last-describ-opt-dl" class="button"><?php get_lang(3);?> (<?php echo round(filesize($_SERVER["DOCUMENT_ROOT"].$row[5])/1000000,2); ?>MB)</button></a>
			<span id="last-describ-opt-view"><?php get_lang(5);?>: <?php echo $row[4]; ?> </span>
			<span id="last-describ-opt-share"><?php get_lang(4);?>: 
               <a href="javascript:window.open('https://twitter.com/intent/tweet?original_referer=&related=anywhereTheJavascriptAPI&text=<?php echo $title; echo ' '; ?>&hashtags=<?php echo "مثبت_و_صدوهیژده"; ?>&tw_p=tweetbutton&url=http://mosbat118.com/index.php?id=<?php echo $row[0]; ?>','Tweet','width=500,height=260')"><span class="content-posts-bottom-options-sharing-item" id="content-posts-bottom-options-sharing-tw"></span></a>
               <a href="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo $row[5]; ?>&t=<?php echo $title ?>','Share','width=500,height=260')"><span class="content-posts-bottom-options-sharing-item" id="content-posts-bottom-options-sharing-fb"></span></a>
			</span>
		</div>


		<!--Archive-->
		<div id="archive">
			<h2><?php get_lang(6);?></h2>
			<ol>
				<?php

				   $archive= mysql_query("select id,name from posts");
				    while($archiverow = mysql_fetch_array($archive))
				    {
				    	echo '<li>'  . '<a href="/index.php?id='. $archiverow[0] .'"> '.get_lang(11,'return').' '. $archiverow[0] .': '. $archiverow[1] .'</a></li>';
				    }
				?>
			</ol>
		</div>

		<!--Copyright-->
		<div id="copyright">
			<a href="<?php get_detail(4,'options','echo');?>"><?php get_lang(7);?></a> - <a href="<?php get_detail(5,'options','echo');?>"><?php get_lang(8);?></a><br>
			<?php get_lang(9);?> &copy; <?php echo Date('Y'); ?> - <?php get_lang(10);?>.<br>
			<?php get_lang(12);?> <a href="/"><?php get_lang(0);?> v1.0</a>
		</div>

    </div>
</div>
</body>
</html>