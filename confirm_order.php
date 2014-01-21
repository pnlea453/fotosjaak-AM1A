<?php
require_once ("class/LoginClass.php");

   if (LoginClass::check_if_email_password_matches_md5($_GET['email'],
                                                  $_GET['password'] ))
	{
		echo "email en password bestaan";
		
	}
   else
   	{
   		echo "U heeft geen rechten op deze pagina. U wordt doorgestuurd<br>
   		naar de homepage";
		header('refresh:5;url=index.php?content=homepage');
		
		
   	}

?>