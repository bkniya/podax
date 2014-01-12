<!DOCTYPE html>

<!--
// Podax v1.0 
// Podcast Managment System
// By Alireza Gholami
// Copyleft (2014)
-->

<?php
	//Get Site options, language and informations
	include('functions.php');
    //Set View Counter
    viewed(get_detail(0,'info','return'));
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
          //Google Analytics
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
                    <audio controls preload="none" onplay="playcount(<?php get_detail(0,'info','echo');?>);">
                      <source src="<?php get_detail(5,'info','echo');?>" type="audio/mpeg">
                      <embed src="<?php get_detail(5,'info','echo');?>">
                    </audio>
                    <span>
                        <a href="/index.php?id=<?php get_detail(0,'info','echo');?>"><h2><?php echo get_lang(11,'return')." ". get_detail(0,'info','return') . ": " . get_detail(1,'info','return'); ?></h2></a>
                        <span id="description"><span class="icon" id="calendar"></span><?php get_detail(8,'info','echo');?></span>
                        <p>    
                            <?php get_detail(2,'info','echo');?>
                        </p>
                        <span id="last-describ-opt-share"><label><?php get_lang(4);?>:</label> 
                            <span>
                           <a href="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=<?php get_detail(3,'options','echo');?>index.php?id=<?php get_detail(0,'info','echo');?>&t=<?php echo get_lang(11,'return')." ". get_detail(0,'info','return') . ": " . get_detail(1,'info','return') ?>','Share','width=500,height=260')"><span class="content-posts-bottom-options-sharing-item" id="content-posts-bottom-options-sharing-fb"></span></a>
                           <a href="javascript:window.open('https://twitter.com/intent/tweet?original_referer=&related=anywhereTheJavascriptAPI&text=<?php echo get_lang(11,'return')." ". get_detail(0,'info','return') . ": " . get_detail(1,'info','return') ?>&hashtags=<?php get_detail(1,'options','echo') ?>&tw_p=tweetbutton&url==<?php get_detail(3,'options','echo');?>index.php?id=<?php get_detail(0,'info','echo');?>','Tweet','width=500,height=260')"><span class="content-posts-bottom-options-sharing-item" id="content-posts-bottom-options-sharing-tw"></span></a>
                           <a href="javascript:window.open('https://plus.google.com/share?url==<?php get_detail(3,'options','echo');?>index.php?id=<?php get_detail(0,'info','echo');?>','Share','width=500,height=260')"><span class="content-posts-bottom-options-sharing-item" id="content-posts-bottom-options-sharing-pl"></span></a>
                           <a href="javascript:window.open('http://delicious.com/post?url==<?php get_detail(3,'options','echo');?>index.php?id=<?php get_detail(0,'info','echo');?>&title=<?php echo get_lang(11,'return')." ". get_detail(0,'info','return') . ": " . get_detail(1,'info','return') ?>','Share','width=500,height=360')"><span class="content-posts-bottom-options-sharing-item" id="content-posts-bottom-options-sharing-de"></span></a>
                            </span>
                       </span>  
                    </span>
                </div>
                <div id="last-describ-opt">
                    <span id="last-describ-opt-like"><button class="button" id="liker" onclick="like(<?php get_detail(0,'info','echo');?>,<?php get_detail(3,'info','echo');?>);"><?php get_lang(1);?></button> <span id="like_count">(<span id="like_count_num"><?php get_detail(3,'info','echo');?></span> <?php get_lang(2);?>)</span></span>
                    <a href="functions.php?action=download&id=<?php get_detail(0,'info','echo');?>&file=<?php get_detail(5,'info','echo');?>" onclick="downloadcount();"><button id="last-describ-opt-dl" class="button"><?php get_size(get_detail(5,'info','return')); ?></button></a>     
                      <span id="last-describ-opt-states"> 
                        <span class="last-describ-opt-st"><span class="icon" id="download"></span><span id="dlycount"><?php get_detail(6,'info','echo');?></span></span>
                        <span class="last-describ-opt-st"><span class="icon" id="play"></span><span id="playcount"><?php get_detail(7,'info','echo');?></span></span>
                        <span class="last-describ-opt-st" id="last-describ-opt-view"><span class="icon" id="view"></span><?php get_detail(4,'info','echo');?> </span>
                      </span>        
                </div> 		
        
        
                <!--Archive-->
             <div id="archive">
                <span id="archive-header"><?php get_lang(6);?></span>
                        <ol>
                        <?php
                           $archive= mysql_query("select id,name from posts");
                            while($archiverow = mysql_fetch_array($archive))
                            {echo '<li>'  . '<a href="/index.php?id='. $archiverow[0] .'"> '.get_lang(11,'return').' '. $archiverow[0] .': '. $archiverow[1] .'</a></li>';
                            }
                        ?>
                    </ol>
                </div>
        
                <!--Footer-->
                <div id="copyright">
                    <a href="<?php get_detail(4,'options','echo');?>"><?php get_lang(7);?></a> - <a href="<?php get_detail(5,'options','echo');?>"><?php get_lang(8);?></a><br>
                    <?php get_lang(9);?> &copy; <?php echo Date('Y'); ?> - <?php get_lang(10);?>.<br>
                    <?php get_lang(12);?> <a href="/"><?php get_lang(0);?> v1.0</a>
                </div>
                
            </div>
        </div>
    </body>
</html>