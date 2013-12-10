<?php
    // om de methode uit de LoginClass te gebruiken
    // Moet je deze eerst toevoegen met :
     require_once('class/LoginClass.php');
	 
	// om de methode uit de SessionClass te gebruiken
    // Moet je deze eerst toevoegen met :
	 require_once ('class/SessionClass.php');
	 
	
	//Check of beide velden zijn ingevoerd
	if( !empty($_POST['email']) && !empty($_POST['password']))
	{
		
		// Check of de ingevulde velden emailadress en wachtwoord bestaan in de database
		if (LoginClass::check_if_email_password_exists($_POST['email'], 
		                                               $_POST['password']))
		{
			// Roep de static method find_user_by_email_password aan uit de
			// de LoginClass. Deze method geeft precies 1 LoginClass-object 
			// terug. Je kunt via dit object de properties opvragen zoals:
			// get_id(), get_email(), get_password, enzz ..........
			// Geef dit object vervolgens mee aan de method login($userObject)
			// uit de SessionClass.
			$session->
			login($user_object = LoginClass ::find_user_by_email_password($_POST['email'], $_POST['password']));
			
			switch($_SESSION['userrole'])
			{
			case 'root':
			header ("location:index.php?content=root_homepage");
			break;
			case 'administrator':
			header ("location:index.php?content=admin_homepage");
			break;
			case 'customer':
			header ("location:index.php?content=customer_homepage");
			break;
			case 'developer':
			header ("location:index.php?content=developer_homepage");
			break;
			case 'photographer':
			header ("location:index.php?content=photographer_homepage");
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