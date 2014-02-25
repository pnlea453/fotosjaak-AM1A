<?php

require_once ("MySqlDatabaseClass.php");
class PhotoClass
{
	//Fields
	private $photo_id;
	private $order_id;
	private $photo_name;
	private $photo_text;
	
	//Properties
	
	
	//Constructor
	public function __construct()
	{
		
		
	}
	
	//Methods
	public static function insert_into_photo($order_id,$photo_name,$photo_text)
	{
		global $database;
		
		$query = "INSERT INTO `photo` (`photo_id`,
		                               `order_id`,
		                               `photo_name`,
		                               `photo_text`)
		          VALUES              (Null,
		                               '".$order_id."',
		                               '".$photo_name."',
		                               '".$photo_text."')";
        //echo $query; exit();
		
		$database->fire_query($query);
	}
	
	
	
}


?>