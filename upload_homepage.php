<?php 


$userrole = array('photographer','root');
include ("security.php"); 
require_once("class/OrderClass.php");
 


?>
<h3>Uploadformulier voor uw foto's</h3>

<table border=1>

<tr>
   <th>userid</th>
   <th>ordernr</th>
   <th>opdracht</th>
   <th>datum</th>
   <th>upload</th>
</tr>

<?php OrderClass::find_orders_users(); ?>


</table>
