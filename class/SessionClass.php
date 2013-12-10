<?php
    class SessionClass
{
	// Fields
	private $id;
	private $email;
	private $userrole;
	private $logged_in;
	


	
	// Constructor van een php-class heeft altijd dezelfde naam:
	// __construct(). Let op de dubbele underscore. Onthoud dat
	// iedere php-method altijd het woord function gebruikt.
    public function __construct()
    {
    	
		
		
    }
	// Maak een method die het id, email, userrole en logged_in opslaat
	// in een sessie variabelen
	public function login($userObject)
	{
		$this ->id =$_SESSION['id'] = $userObject->get_id();
		$this ->email =$_SESSION['email'] = $userObject->get_email();
		$this ->userrole =$_SESSION['userrole'] = $userObject->get_userrole();
		$this->logged_in = true;
		
	}
	
	public function logout()
	{
		// De functie session_destroy vernietigd alle session variabele,
		// zoals id, email en userrole.
		session_destroy();
		
		//Alle fields moeten ook  leeg worden gehaald met de php-functie unset
		unset($this->id) ;
		unset($this->email) ;
		unset($this->userrole) ;
		
		//Het field $logged_in moet dan op false worden gezet
		$this->logged_in = false;
	}
	
}

 $session = new SessionClass();

?>