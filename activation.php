<?php 
require_once ("class/LoginClass.php");

if (isset($_POST['submit']))
{
	echo "Er is op de submitknop gedrukt!"; 
}
else 
{
	
if (LoginClass::check_if_email_password_exists($_GET['email'],$_GET ['password']))
{
?>

<p>Welkom op de site. Uw account wordt geactiveerd nadat u een nieuw wachtwoord
	heeft gekozen. </p>
	<form action='index.php?content=activation' method='post'>
		<table>
			<tr>
				<td>nieuw wachtwoord (maximaal 12 tekens)</td>
				<td><input type='password'name'password' size='12' maxlength='12'/></td>
			</tr>
			<tr>
				<td>nieuw wachtwoord (check)</td>
				<td><input type='password' name='password-check' size='12' maxlength='12'/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type='submit' value='vestuur' name='submit'/></td>
			</tr>
		</table>
		
		
		
	</from>
<?php
}
else 
{
echo "U heeft geen rechten op deze pagina. U wordt doorgestuurd naar de homepage";
header ("refresh:4;url=index.php?content=homepage");
}
}