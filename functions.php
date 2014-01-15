<?php

    //Import Database Info
	include('database.php');


    //View Count     
    function viewed($id)
    {
	  $row = mysql_fetch_array(mysql_query("SELECT views FROM posts WHERE id=$id"));       
      $views=$row[0]+1;		
      mysql_query("UPDATE posts SET views=$views WHERE id=$id");	      
    }



	//Get Site options informations
	function get_detail($num,$type,$output)
	{
        if($type=='podax')
            {
                $podax = mysql_fetch_array(mysql_query("SELECT * FROM podax WHERE id=0"));	              
                   switch ($output) {
                 
                    case 'echo':
                        echo $podax[$num];
                        break;
                    case 'return':
                        return $podax[$num];
                        break;						
                    default:
                        return "Error";
                        break;
                }		
            }
        if($type=='options')
            {
                $options = mysql_fetch_array(mysql_query("SELECT * FROM options WHERE id=0"));	
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
                $users = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id=1"));	
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
                    $row = mysql_fetch_array(mysql_query("SELECT * FROM posts ORDER BY id DESC LIMIT 1;"));
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
                    $row = mysql_fetch_array(mysql_query("SELECT * FROM posts WHERE id=$id"));
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
		$row = mysql_fetch_array(mysql_query("SELECT play_count FROM posts WHERE id=$id"));
		$play_count=$row[0]+1;		
		mysql_query("UPDATE posts SET play_count=$play_count WHERE id=$id");	  
        echo $play_count;
    }
    elseif ($action=="download")
    {
        $id = $_GET['id'];
        $file = $_GET['file'];
		$row = mysql_fetch_array(mysql_query("SELECT dl_count FROM posts WHERE id=$id"));
		$dl_count=$row[0]+1;		
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


    //get archive links
    function get_archive()
    {
        $temprow = mysql_fetch_array(mysql_query("SELECT id FROM posts ORDER BY id DESC LIMIT 1;"));
        for ($i=$temprow[0]-1;$i>=1;$i--)
		{
       	     $row = mysql_fetch_array(mysql_query("SELECT * FROM posts WHERE id=$i"));
			 echo '<li>'  . '<a href="'.get_detail(3,'options','return').'index.php?id='. $row[0] .'"> '.get_lang(11,'return').' '. $row[0] .': '. $row[1] .'</a></li>';

     	}
    }



?>