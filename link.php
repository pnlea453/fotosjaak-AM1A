<ul>
	<li>
		<a href="index.php?content=homepage">Home</a>
	</li>
	<li>
		<a href="index.php?content=Logintest">logintest</a>
	</li>

<?php   
    if (isset ($_SESSION['userrole']))
	{
	 echo "<li>
	       <a href='index.php?content=logout'>uitloggen</a>
		   </li>";
	switch  ($_SESSION['userrole'])
	{
	case 'customer':
	     echo "<li>
		           <a href='index.php?content=downloadpage'>download game</a></li>";
		 echo "<li>
		           <a href='index.php?content=customer_homepage'>user home</a></li>";
		 echo "<li>
		           <a href='index.php?content=faqpage'>faq</a></li>";
				   
	
	break;
	case 'admin':
	
	break;
	case 'root':
		echo "<li> <a href='index.php?content= developer_homepage'>dev-homepage</a>
		</li>";
	
	break;
	
	}
	}
    else 
	{
	echo "<li> <a href='index.php?content=login_form'>inloggen</a>
	      </li>
		  <li> <a href='index.php?content=register_form'>registratie</a>
		  </li>";
	}
	
	?>
</ul>