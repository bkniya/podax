<?php


include('../langs/en-us.php');


$id=$_GET['id'];
$likes=$_GET['likes'];
$action=$_GET['action'];

if ($action=="like")
{
	$likes++;
}
elseif ($action=="unlike") 
{
	$likes;
}

	include('../database.php');	
	mysql_query("UPDATE posts SET like_count=$likes WHERE id=$id");

echo "(" . $likes . " ".get_lang(2,'return').")";

?>