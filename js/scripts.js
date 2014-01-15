/**
// Podacs v1.0 
// Podcast Managment System
// By Alireza Gholami
// Copyleft (2014)
**/



$(document).ready(function() {


});

function downloadcount()
{document.getElementById("dlycount").innerHTML=eval(document.getElementById("dlycount").innerHTML)+1;}


function playcount(id)
{var xmlhttp;
    if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}
    else {xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
    xmlhttp.onreadystatechange=function()
      {if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {document.getElementById("playcount").innerHTML=xmlhttp.responseText;}}
    xmlhttp.open("POST","functions.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("action=play&id="+id);}



var liked=false;
function like(id,likes)
	{  
        localStorage.liked=="false"

		var xmlhttp;
		if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}
		else {xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
		xmlhttp.onreadystatechange=function()
		  {if (xmlhttp.readyState==4 && xmlhttp.status==200)
		  {document.getElementById("like_count_num").innerHTML=xmlhttp.responseText;}}
        if (liked==false){
            xmlhttp.open("POST","functions.php",true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send("action=like&id="+id+"&likes="+likes+"&do=like");
            document.getElementById('liker').innerHTML="Unlike";
            localStorage.setItem("liked",true);
            liked=true;
        }
        else
        {
            xmlhttp.open("POST","functions.php",true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send("action=like&id="+id+"&likes="+likes+"&do=unlike");
            document.getElementById('liker').innerHTML="Like";
            localStorage.setItem("liked",false);		
            liked=false;
        }
    }







