<?php

    //Import Database Info
	include('database.php');


    //View Count     
    function viewed($id)
    {
      $last=mysql_query("SELECT * FROM posts WHERE id=$id");
	  $row = mysql_fetch_array($last);       
      $views=$row[5]+1;		
      mysql_query("UPDATE posts SET views=$views WHERE id=$id");	      
    }



	//Get Site options informations
	function get_detail($num,$type,$output)
	{
        if($type=='options')
            {
                $optionstemp=mysql_query("SELECT * FROM options WHERE id=0");
                $options = mysql_fetch_array($optionstemp);	
                switch ($output) {
                    case 'echo':
                        echo $options[$num];
                        break;
                    case 'return':
                        return $options[$num];
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
                        echo $users[$num];
                        break;
                    case 'return':
                        return $users[$num];
                        break;						
                    default:
                        return "Error";
                        break;
                }	
            }
        elseif ($type=='info') 
            {	
                @$id=$_GET['id'];
                if(!isset($id))
                  {
                    $last=mysql_query("SELECT id,name,description,like_count,views,link,dl_count,play_count,date FROM posts ORDER BY id DESC LIMIT 1;");
                    $row = mysql_fetch_array($last);
                    switch ($output) {
                        case 'echo':
                            echo $row[$num];
                            break;
                        case 'return':
                            return $row[$num];
                            break;						
                        default:
                            return "Error";
                            break;
                        }	               
                    }
                else
                  {
                    $last=mysql_query("SELECT id,name,description,like_count,views,link,dl_count,play_count FROM posts WHERE id=$id");
                    $row = mysql_fetch_array($last);	
                    switch ($output) {
                        case 'echo':
                            echo $row[$num];
                            break;
                        case 'return':
                            return $row[$num];
                            break;						
                        default:
                            return "Error";
                            break;
                        }		
                  }
            }
    }



    //View, Options and Ajax 
    if (isset($_GET['action']))
    {@$action=$_GET['action'];}
    else
    {@$action=$_POST['action'];}

    if ($action=="like")
    {
        $id=$_POST['id'];
        $likes=$_POST['likes'];
        $do=$_POST['do'];
        if ($do=="like")
        {$likes++;}
        elseif ($do=="unlike") 
        {$likes;}
          mysql_query("UPDATE posts SET like_count=$likes WHERE id=$id");
        echo $likes;
    }
    elseif ($action=="play")
    {
        $id = $_POST['id'];
        $last=mysql_query("SELECT id,name,description,like_count,views,link,dl_count,play_count FROM posts WHERE id=$id");
		$row = mysql_fetch_array($last);
		$play_count=$row[7]+1;		
		mysql_query("UPDATE posts SET play_count=$play_count WHERE id=$id");	  
        echo $play_count;
    }
    elseif ($action=="download")
    {
        $id = $_GET['id'];
        $file = $_GET['file'];
        $last=mysql_query("SELECT id,name,description,like_count,views,link,dl_count,play_count FROM posts WHERE id=$id");
		$row = mysql_fetch_array($last);
		$dl_count=$row[6]+1;		
		mysql_query("UPDATE posts SET dl_count=$dl_count WHERE id=$id");	  
        header ("Content-type: octet/stream");
        header ("Content-disposition: attachment; filename=".$file.";");
        header ("Content-Length: ".filesize($file));
        readfile($file);
        exit;
    }

    //Get Size of Num
    function get_size($link)
    {
        @$size=round(filesize($_SERVER["DOCUMENT_ROOT"].$link)/1000000,1);
        if ($size)
        {echo get_lang(3,'return') . " (" .  $size . get_lang(13,'return') . ")";}
        else
        {echo "Error";}  
    }

	//Get Language Info and Style
    include("langs/".get_detail(6,'options','return').".php");
	function get_rtl()
	{if (get_detail(6,'options','return')=='fa-ir')
	{echo '<link rel="stylesheet" type="text/css" href="styles/rtl.css">';}
	}



















?>