<!DOCTYPE html>

<?php
	//Get Site options, language and informations
	include('../functions.php');
?>

<html>
    <head>
        <title><?php get_detail(1,'options','echo');?></title>
        <!--Styles-->
        <link rel="stylesheet" type="text/css" href="../styles/reset.css">
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
        <?php get_rtl(); ?>
        <!--Favicon-->
        <link rel="icon" href="<?php get_detail(8,'options','echo');?>" type="image/x-icon">
        <link rel="shortcut icon" href="<?php get_detail(8,'options','echo');?>" type="image/x-icon">
        <!--Javascript-->
        <script src="../js/jquery-2.0.3.min.js"></script>
        <script src="../js/scripts.js"></script>
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
            <div id="admin-container" class="center">    	
    
                <!--Logo-->
                <div id="logo">
                <h1><?php get_detail(1,'options','echo');?></h1>               
                <a href="<?php get_detail(3,'options','echo');?>"><img src="../images/logo-admin.png" alt=""></a>    
                </div>
        
                <!--Last-->
                <div id="admin-div">

					<div id="admin-div-sidebar">
		   				<span id="admin-div-sidebar-welcome">Welcome <a href="#">John Smith</a> (<a href="#">Signout</a>)</span>
		   				<ol>
							
		   					<li><a href="#">Dashboard</a></li>
		   					<hr>
		   					<li><a href="#">New Post</a></li>
		   					<li><a href="#">Archive</a></li>
		   					<li><a href="#">Comments</a></li>
		   					<hr>
		   					<li><a href="#">Pages</a></li>
		   					<hr>
		   					<li><a href="#">Options</a></li>
		   					<li><a href="#">Settings</a></li>
		   					<li><a href="#">Users</a></li>
		   					<li><a href="#">Contact</a></li>
		   					<li><a href="#">Update</a></li>
		   					<hr>
		   					<li><a href="#">Statics</a></li>

		   				</ol>
					</div> 	
					<div id="admin-div-content">
		   				<span id="admin-div-content-title">Dashboard</span>	
		   				<span id="admin-div-content-body">	 
		   					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
						</span>
        	        </div> 	
                </div>
	

                <!--Archive-->
                <div id="archive">

                </div>
        
                <!--Footer-->
                <div id="copyright">

                    <span id="copyright-left">
                    <?php get_lang(9);?> &copy; <?php echo Date('Y'); ?> <?php get_lang(5);?> <a href="<?php get_detail(3,'options','echo');?>"><?php get_detail(1,'options','echo');?></a> - <?php get_lang(10);?>.<br>
                    <?php get_lang(12);?> <a href="<?php get_detail(5,'podax','echo');?>"><?php get_detail(1,'podax','echo');?> v<?php get_detail(3,'podax','echo');?></a>
                	</span>
                </div>
                
            </div>
        </div>
    </body>
</html>