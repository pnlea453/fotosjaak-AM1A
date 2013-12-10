<?php
    // om de methode uit de LoginClass te gebruiken
    // Moet je deze eerst toevoegen met :
     require_once('class/LoginClass.php');
	 
	
	//Check of beide velden zijn ingevoerd
	if( !empty($_POST['email']) && !empty($_POST['password']))
	{
		
		// Check of de ingevulde velden emailadress en wachtwoord bestaan in de database
		if (LoginClass::check_if_email_password_exists($_POST['email'], 
		                                               $_POST['password']))
		{
			//echo "De combinatie bestaat";exit();
			//Verwijs door naar de homepage van de geregistreerde gebruiker
			//echo "Record bestaat in de database, U wordt doorgestuurd naar de downloadpage.";
			$user_object = LoginClass ::find_user_by_email_password($_POST['email'], $_POST['password']);
			
			echo $user_object->get_id(); exit();
			
			
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