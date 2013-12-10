<?php

//Als je een method wilt gebruiken uit de SessionClass, dat
//moet je het bestand waar de Classdefinitie in staat toevoegen
//Aan dit bestand. Gebruik daarvoor require_once.
require_once("class/SessionClass.php");


//We roepen de method logout () aan in de SessionClass.

$session->logout();

// We gaan de persoon die uitlogt doorsturen naar de homepage.php pagina
header("location:index.php?content=homepage");

?>