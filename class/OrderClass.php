<?php
require_once("class/MySqlDatabaseClass.php");
require_once("class/UserClass.php");
require_once("class/LoginClass.php");


class OrderClass
{
	//Fields
	private $order_id;
	private $order_short;
	private $order_long;
	private $deliverydate;
	private $eventdate;
	private $color;
	private $number_of_pictures;
	
	//Constructor
	public function __construct()
	{
		
		
	}
	
	public static function find_by_sql($query)
	{
		global $database;
		$database->fire_query($query);
		
		$order_object_array = array();
		
		while($row = mysql_fetch_array($result))
		{
			$array_object = new OrderClass();
			$array_object->order_id = $row ['order_id'];
			$array_object->order_short = $row ['order_short'];
			$array_object->order_long = $row ['order_long'];
			$array_object->deliverydate = $row ['deliverydate'];
			$array_object->eventdate = $row ['eventdate'];
			$array_object->color = $row ['color'];
			$array_object->number_of_pictures = $row ['number_of_pictures'];
			
			$order_object_array[] = $array_object;
		}
		return $order_object_array[] = $array_object;
	}
	public static function insert_into_order($post_array)
	{
		global $database;
		
		$query = "INSERT INTO `order` (`order_id`,
		                               `user_id`,
		                               `order_short`,
		                               `order_long`,
		                               `deliverydate`,
		                               `eventdate`,
		                               `color`,
		                               `number_of_pictures`,
		                               `confirmed`)
		          VALUES               (null,
		                                '".$_SESSION['id']."',
		                                '".$post_array['order_short']."',
		                                '".$post_array['order_long']."',
		                                '".$post_array['deliverydate']."',
		                                '".$post_array['eventdate']."',
		                                '".$post_array['color']."',
		                                '".$post_array['number_of_pictures']."',
		                                'no')";
		                                
		 $database->fire_query($query);
		 $order_id = mysql_insert_id();
		 self::order_activation_email($order_id, $post_array);
		
	}
	private static function order_activation_email($order_id, $post_array)
	{
		// vind de voornaam,tussenvoegsel en achternaam
		$user = UserClass::find_firstname_infix_surname();
		
		// vind de email en password
		$login_info = LoginClass::find_email_password_by_id();
		
		//emailadress opdrachtgever
		$to = $login_info->get_email();
		
		//aanhef van de email
		$subject = "Bevestigingsemail opdracht Fotosjaak";
		
		
		$message = "Geachte heer/mevrouw : ".$user->getFirstname()." ".
		                                     $user->getInfix()." ".
		                                     $user->getSurname()."<br><br>";
		               
		               
		$message .= "Wij hebben de onderstaande order van u ontvangen<br><br>";
		$message .= "<table border='1'>
		               <tr>
		                   <td>order_id</td>
		                   <td>".$order_id."</td>
		               </tr>
		               <tr>
		                   <td>Opdracht in het kort</td>
		                   <td>".$post_array['order_short']."</td>
		               </tr>
		               <tr>
		                   <td>Opdracht uitgebereid</td>
		                   <td>".$post_array['order_long']."</td>
		               </tr>
		               <tr>
		                   <td>Opleveringsdatum</td>
		                   <td>".$post_array['deliverydate']."</td>
		               </tr>
		               <tr>
		                   <td>Datum event</td>
		                   <td>".$post_array['eventdate']."</td>
		               </tr>
		               <tr>
		                   <td>Fotos worden genomen in</td>
		                   <td>".$post_array['color']."</td>
		               </tr>
		               <tr>
		                   <td>Aantal foto's</td>
		                   <td>".$post_array['number_of_pictures']."</td>
		               </tr>
		               <tr>
		                   <td>Opdracht bevestigd</td>
		                   <td>nee</td>
		               </tr>
		               </table><br>";
		   $message .= "Wanneer u op de onderstaande link klikt, gaat u<br>
		                akkoord met de algemene voorwaarden en is de order<br>
		                definitief.<br><br>";
		   $message .= "<a href='http://localhost/Blok2/fotosjaak/index.php?content=confirm_order&order_id=".$order_id."&email=".$login_info->get_email()."&password=".MD5($login_info->get_password())."'>opdracht is akkoord<a/><br><br>";
		   $message .= "Met vriendelijke groet ,<br>
		               <b> Sjaak de Vries</b><br><br>
		                uw fotograaf";
		                                    
		//echo $message;exit();
		$headers = "From : info@fotosjaak.nl\r\n";
		$headers .="Reply-ToL info@fotosjaak.nl\r\n";
		$headers .= "Cc: info@accountancy.nl\r\n";
		$headers .="Bcc: info@belastingdienst.nl\r\n";
		$headers .="X-mailer: PHP/".phpversion()."\r\n";
		$headers .="MIME-version 1.0\r\n";
		$headers .="Content-type: text/html; charset=iso-8859-1\r\n";
		
		mail($to, $subject, $message, $headers);
		
	}
	 
	 public static function update_confirmed($order_id)
	 {
	 		global $database;	
	 		$query = "UPDATE `order` SET `confirmed` = 'yes'
			WHERE order_id = '".$order_id."'";
			$database->fire_query($query);
	 	
	 }
	
	public static function find_orders_users()
	{
		global $database;
		// Maak een select query
		$query = "SELECT * FROM `order`, `user`
				  WHERE `order`.`user_id` = `user`.`id`
				  ORDER BY `order`.`user_id`";

		// Vuur de query af op de database
		$result = $database->fire_query($query);

		// Loop het result door met een while instructie
		while ($rows = mysql_fetch_array($result))
		{
			echo "<tr>
			        <td>".$rows['id']."</td>
			        <td>".$rows['firstname']."</td>
			        <td>".$rows['infix']."</td>
			        <td>".$rows['surname']."</td>
					<td>".$rows['order_id']."</td>
					<td>".$rows['order_short']."</td>
					<td>".$rows['deliverydate']."</td>
					<td><a href='index.php?content=upload_form&user_id=".$rows['id']."&order_id=".$rows['order_id']."'>up</a></td>			
				  </tr>";			
		}

	}
	
	
	
	
}
?>