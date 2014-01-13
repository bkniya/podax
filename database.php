<?php
mysql_connect("localhost", "root", "")or die(mysql_error());   
mysql_select_db("podax")or die(mysql_error());
mysql_query('SET NAMES utf8');
?>