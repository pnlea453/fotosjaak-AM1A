<?php 

$userrole = array('developer','root');
include ("security.php"); 

 


?>


<h3>Developer homepage</h3>

Uw id is: <?php echo $_SESSION['id']; ?>
<br>Uw gebruikersrol is: <?php echo $_SESSION['userrole']; ?> </br>