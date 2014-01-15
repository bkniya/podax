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
 					<center>Error 404 - Not Found</center>
                </div>

                
            </div>
        </div>
    </body>
</html>