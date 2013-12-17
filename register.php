<?php
	require_once("class/LoginClass.php");
	
	if (LoginClass::check_if_email_exists($_POST['email']))
	{
		// Email bestaat al terugsturen naar de registratiepagina
		echo"Het ingevulde emailadres bestaat al,<br>
		gebruik een ander emailadres. U wordt doorgestuurd <br>
		naar het registratieformulier";
		header("refresh:5;url=index.php?content=register_form");
	}
	else
	{
		
		LoginClass::insert_into_loginClass($_POST);
		// Schrijf weg na de database
		echo "U bent succesvol geregistreerd. U ontvangt een mail met daarin een<br>
		activatielink in uw mailbox van het opgegeven emailadres. Na het activeren van<br>
		uw account kunt u inloggen met een zelfgkozen wachtwoord";
		header("refresh:5;url=index.php?content=login_form");
		
		
	}
	
	
	
	
	//Hier wordt contact gemaakt met de server
	//$db = mysql_connect("localhost", "root", "");
	
	//Hier wordt er een database gekozen op mysql-server
	//mysql_select_db("am1a", $db) or die ("De database is niet gevonden");

	/*$sql = "INSERT INTO `users` (`id`,
								`firstname`,
								`infix`,
								`surname`,
								`street`,
								`housenumber`,
								`address`,
								`zipcode`,
								`date`,
								`sex`,
								`marital_status`,
								`favorite_game_genres`,
								`favorite_game`,
								`e-mail`,
								`password`,
								`userrole`)
					VALUES		( NULL,
								'".$_POST['firstname']."',
								'".$_POST['infix']."',
								'".$_POST['surname']."',
								'".$_POST['street']."',
								'".$_POST['housenumber']."',
								'".$_POST['address']."',
								'".$_POST['zipcode']."',
								'2013-09-09',
								'".$_POST['sex']."',
								'".$_POST['marital_status']."',
								'".$_POST['favorite_game_genres']."',
								'".$_POST['favorite_game']."',
								'".$_POST['e-mail']."',
								'".$_POST['password']."',
								'customer')";
		
	
	//echo $sql;
	//Hier wordt de sql-query op de database afgevuurd en uitgevoerd.
	mysql_query($sql, $db) or die ("De sql-query is niet geoed uitgevoerd")*/
	
?>