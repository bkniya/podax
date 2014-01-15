<?php

function get_lang($langitem,$output=NULL)
{
	$lang=array(


	// Lang Items for English (US)
	  "0"=>  "Podax",
	  "1"=>  "Like",
	  "2"=>  "liked",
	  "3"=>  "Download",
	  "4"=>  "Share",
	  "5"=>  "V", //obsolete
	  "6"=>  "Last Numbers",
	  "7"=>  "Facebook",
	  "8"=>  "Twitter", 
	  "9"=>  "Copyright",
	  "10"=> "All right reserved",
	  "11"=> "Num",
	  "12"=> "Powered by",
      "13"=> "MB" , //obsolete
	  "14"=> "P", //obsolete
      "15"=> "D", //obsolete
      "16"=> "Find us on",
      "17"=> "and"
    );
	  

	if($output=='return')
	{
		return ($lang[$langitem]);
	}
	else
	{
 	 	echo ($lang[$langitem]);
	}

}
?>