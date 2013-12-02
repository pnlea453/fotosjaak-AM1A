<?php
     require_once 'config/config.php';

    class MySqlDatabaseClass
    {
       // Fields
       private $db_connection;
	   
	   
	   /*Dit is de Constructor van de MySqlDatabaseClass
	    *Een constructor herken je in PHP aan de naam. De naam is altijd 
	    *__constructor 
	    */
	   public function __construct()
    {
    	// Velden roep je aan met $this ->naam_van_het_veld_zonder_$
    	// Er wprdt hier een verbinding gemaakt met de mysql-server
    	$this ->db_connection = mysql_connect(SERVERNAME,
		                                      USERNAME,
											  PASSWORD);
											  
	    // Er wordt hier een database geselecteerd
		mysql_select_db(DATABASE, $this->db_connection) 
		or die ('MySqlDatabaseClass, database niet geselecteerd');
    	
		
    }
	// Deze functie als argument een query mee.
	// Deze wordt door de mysql_query($query)
	public function fire_query($query)
	{
		
		$result = mysql_query($query) or die ('MySqlDatabase: '.mysql_error());
		return $result;
	}
    
		
    }
    // Maak nu een instantie van de net gedefinieerde class.
    $database = new MySqlDatabaseClass();
	
	$query = "SELECT * FROM `login`";
	
	//$Database.fire_query($query); zo zou je het moeten doen met C#
	
	$result = $database ->fire_query($query);
	
?>
<h3> Dit is de databasetestpagina </h3><hr>
<?php
   while ($record = mysql_fetch_array($result))
   {
   	 echo $record[ 'email' ]. "<br>";
   }

?>












