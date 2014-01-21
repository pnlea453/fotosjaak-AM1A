<?php
require_once("class/MySqlDatabaseClass.php");
require_once("class/UserClass.php");

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
		                               `number_of_pictures`)
		          VALUES               (null,
		                                '".$_SESSION['id']."',
		                                '".$post_array['order_short']."',
		                                '".$post_array['order_long']."',
		                                '".$post_array['deliverydate']."',
		                                '".$post_array['eventdate']."',
		                                '".$post_array['color']."',
		                                '".$post_array['number_of_pictures']."')";
		                                
		 $database->fire_query($query);
		 $order_id = mysql_insert_id();
		 self::order_activation_email($order_id, $post_array);
		
	}
	private static function order_activation_email($order_id, $post_array)
	{
		$user = UserClass::find_firstname_infix_surname();
		
		$message = "Geachte heer/mevrouw : ".$user->getFirstname()." ".
		                                     $user->getInfix()." ".
		                                     $user->getSurname()."<br>";
		               
		               
		$message .= "Wij hebben de onderstaande order van u ontvangen<br>";
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
		               </table>";
		   $message .= "Wanneer u op de onderstaande link klikt, gaat u<br>
		                akkoord met de algemene voorwaarden en is de order<br>
		                definitief.<br><br>";
		   $message .= "<a href='http://localhost/Blok2/fotosjaak/index.php?content=confirm_order'>opdracht is akkoord<a/>";
		                                    
		echo $message;exit();
		
		
		mail($to, $subject, $message, $headers);
		
	}
	
	
	
}
?>