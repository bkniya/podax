<!DOCTYPE html>

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
                <a href="<?php get_detail(3,'options','echo');?>"><img src="images/logo.png" alt=""></a>    
                </div>
        
                <!--Archive-->
                <div id="error">
 					<center>
                		<h3><?php get_lang(18); ?></h3><br>
                		<a href="<?php get_detail(3,'options','echo');?>"><?php get_lang(19); ?></a>
                	</center>
                </div>
                
                <!--Archive-->
                <div id="archive">
                <span id="archive-header"><?php get_lang(6);?></span>
                    <ol>
                    <?php get_archive('withlast'); ?>
                    
                    </ol>
                </div>
        
                <!--Footer-->
                <div id="copyright">
                    <span id="copyright-right">
                        <?php get_lang(16); ?>
                        <a href="http://facebook.com/<?php get_detail(4,'options','echo');?>" title="<?php get_lang(7);?>"><?php get_lang(7);?></a>
                        <?php get_lang(17); ?>
						<a href="http://twitter.com/<?php get_detail(5,'options','echo');?>" title="<?php get_lang(8);?>"><?php get_lang(8);?></a>.
                    </span>
                    <span id="copyright-left">
                    <?php get_lang(9);?> &copy; <?php echo Date('Y'); ?> by <a href="<?php get_detail(3,'options','echo');?>"><?php get_detail(1,'options','echo');?></a> - <?php get_lang(10);?>.<br>
                    <?php get_lang(12);?> <a href="<?php get_detail(5,'podax','echo');?>"><?php get_detail(1,'podax','echo');?> v<?php get_detail(3,'podax','echo');?></a>
                	</span>
                </div>
                
            </div>
        </div>
    </body>
</html>