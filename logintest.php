<h3>Dit is de logintest pagina</h3>


<?php

     // Include de LoginClass 
     require_once('class/LoginClass.php');
	 
	 // Dit heeft als voordeel dat we de method kunnen aanroepen zonder eerst een object te 
	 // hoeven te maken van de Class LoginClass.
	$result_array =  LoginClass::select_all_from_login();
	
	echo "<table>
	<tr>
	<th>id</th>
	<th>email</th>
	<th>passwoord</th>
	<th>userrole</th>
	<th>activated</th>
	<th>activationdate</th>
	</tr>";
	
	foreach ( $result_array as $value)
	
	{
		echo "<tr>
		<td>".$value ->get_id()."</td>
		<td>".$value ->get_email()."</td>
		<td>".$value ->get_password()."</td>
		<td>".$value ->get_userrole()."</td>
		<td>".$value ->get_activated()."</td>
		<td>".$value ->get_activationdate()."</td>
		</tr>";
	}
    echo "</table>";


?>
Bestaat het e-mailadres developer@gmail.com?<br>
<?php echo LoginClass::email_exist("developer@gmail.com"); ?>
