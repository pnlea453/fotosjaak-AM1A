<?php
    require_once ("MySqlDatabaseClass.php");
	
	// Hieronder de classdefinitie van de LoginClass
	class LoginClass
	{
		// Fields 
		private $id;
		private $email;
		private $password;
		private $userrole;
		private $activated;
		private $activationdate;
		
		
		// Properties
		public function get_id() { return $this ->id; }
		public function get_email() { return $this ->email; }
		public function get_password() { return $this ->password; }
		public function get_userrole() { return $this ->userrole; }
		public function get_activated() { return $this ->activated; }
		public function get_activationdate() { return $this ->activationdate; }
		
		//Constructor	
		public function __construct()
		{
			
			
		}
		public static function find_by_sql($query)
		{
				
			// Met global maak je het database-object uit de MySqlDatabaseClass 
			// bruikbaar binnen de find_by_sql method
			global $database;
			
			//Vuur de query af op de datebase
			$result = $database-> fire_query($query);
			
			// Dit is het array waar alle LoginClassObjecten in worden gestopt
			// Elk loginclassobject bevat een gevonden record uit de database
			// Vindt de query 3 records dan zitten er 3 LoginClassobjecten in het 
			// array $object_array
			$object_array = array();
			
			while ( $row = mysql_fetch_array($result))
			{
				// Maak iedere while ronde een loginClassobject aan
				$object = new LoginClass();
				// Stop per record ieder databaseveld in het LoginClassobject
				// Veld
				$object -> id= $row ['id'];
				$object -> email= $row ['email'];
				$object -> password= $row ['password'];
				$object -> userrole= $row ['userrole'];
				$object -> activated= $row ['activated'];
				$object -> activationdate= $row ['activationdate'];
				// Stop het net gemaakte loginClassobject in het  $object_array
				$object_array [] = $object;
				
				
				
				
			}
			return $object_array;
		}
        // Deze method selecteert alle records uit de login table. We maken
        // gebruik van de find_by_sql($query) method uit deze class.
		public static function select_all_from_login()
		{
			$query = "SELECT * FROM `login`";	
			$result = self ::find_by_sql($query);
			return $result;
		}
		
		public static function email_exist($emailaddress)
		{
			global $database;
			$query = "SELECT * FROM `login` WHERE `email` = '".$emailaddress."'";
			
			$result = $database -> fire_query($query);
			if (mysql_num_rows($result)> 0)
			{
				return "Het e-mailadres bestaat al in de database";
			}
			else 
			{
				return "Het e-mailadres bestaat niet in de database";
			}
			
		}
		
		public static function check_if_email_password_exists($email, $password)
		{
			global $database;
			$query = "SELECT * FROM `login` WHERE `email` = '".$email."' AND `password` = '".$password."'";
			//echo $query; exit();
			$result = $database ->fire_query($query);
			if (mysql_num_rows($result) > 0 )
			{
				return true;
		
			}
			else 
			{
				return false;
			}
		}
       public static function find_user_by_email_password($wmail, $password)
	   {
	   	 $query = "SELECT * FROM `login` WHERE `email` = '".$emailaddress."'";
		 $logClassObjectInArray = self::find_by_sql($query);
		 $loginClassObject = array_shift($logClassObjectInArray);
		 return $loginClassObject;
		 
	   }
	   
	   
}



?>