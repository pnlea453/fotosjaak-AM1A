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
		 self::order_activation_email();
		
	}
	private static function order_activation_email()
	{
		$user = UserClass::find_firstname_infix_surname();
		$message = "Geachte heer/mevrouw : ".$user->getFirstname()." ".
		                                     $user->getInfix()." ".
		                                     $user->getSurname()."<br>";
		               
		               
		$message .= "Wij hebben de onderstaande order van u ontvangen<br>";
		$message .= "<table border='1'>
		               <tr>
		                   <td>order</td>
		                   <td></td>
		               </tr>
		               <tr>
		                   <td></td>
		                   <td></td>
		               </tr>
		               </table>";
		                                    
		echo $message;exit();
		
		
		mail($to, $subject, $message, $headers);
		
	}
	
	
	
}
?>