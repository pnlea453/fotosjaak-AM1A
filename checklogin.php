<?php
	//Check of beide velden zijn ingevoerd
	if( !empty($_POST['email']) && !empty($_POST['password']))
	{
		include('./connect_db.php');
		$query = "SELECT * 
				 FROM 	`users` 
				 WHERE 	`e-mail`		='".$_POST['email']."'
				 AND 	`password`	='".$_POST['password']."'";
		//echo $query;
		//Vuur de query af op de database
		$result = mysql_query($query, $db);
		if (mysql_num_rows($result) > 0)
		{
			//Verwijs door naar de homepage van de geregistreerde gebruiker
			//echo "Record bestaat in de database, U wordt doorgestuurd naar de downloadpage.";
			$record = mysql_fetch_array($result);
			$_SESSION['id'] = $record['id']; 
			$_SESSION['userrole'] = $record['userrole'];
			
			
			switch($record['userrole'])
			{
			case 'root':
			header ("location:index.php?content=root_homepage");
			break;
			case 'admin':
			header ("location:index.php?content=admin_homepage");
			break;
			case 'customer':
			header ("location:index.php?content=customer_homepage");
			break;
			
			}
			
		}
		else
		{
			//Blijkbaar is het record niet gevonden in de databse
			echo "De ingevoerde combinatie van gebruikersnaam - wachtwoord is ons niet bekend. U wordt doorgestuurd naar de inlogpagina.";
			header("refresh:7; url=index.php?content=login_form");
			
		}
	}
		else
		{
		echo 'U heeft een of beide van beide velden niet correct ingevuld. U wordt doorgestuurd naar de inlogpagina.';
		header("refresh:7; url=index.php?content=login_form");
		}
		
		




?>