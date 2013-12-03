<h3>Dit is de logintest pagina</h3>


<?php
<table class='simple'>
     // Include de LoginClass 
     require_once('class/LoginClass.php');


     $loginClassObj = new LoginClass();
	 
	 $query = "SELECT * FROM `login`";
	 
	$result_array = $loginClassObj -> find_by_sql($query);
	
	foreach ( $result_array as $value)
	
	{
		
		echo $value ->get_id()."<br>";
		echo $value ->get_email()."<br>";
		echo $value ->get_password()."<br>";
		echo $value ->get_userrole()."<br>";
		echo $value ->get_activated()."<br>";
		echo $value ->get_activationdate()."<br>";
		
	}



?>

