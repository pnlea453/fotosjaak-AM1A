<?php

	//Hier wordt contact gemaakt met de server
	$db = mysql_connect("localhost", "root", "");
	
	//Hier wordt er een database gekozen op mysql-server
	mysql_select_db("am1a-fotosjaak", $db) or die ("De database is niet gevonden");



?>