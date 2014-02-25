<ul>
	<li>
		<a href="index.php?content=homepage">Home</a>
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
		 echo "<li>
		           <a href='index.php?content=opdracht'>opdracht</a></li>";
				   
				   
	
	break;
	case 'administrator':
		echo "<li> <a href='index.php?content=admin_homepage'>admin-link</a>
		</li>";
	
	break;
	case 'root':
		echo "<li> <a href='index.php?content=developer_homepage'>dev-link</a>
		</li>";
		echo "<li> <a href='index.php?content=photographer_homepage'>photo-link</a>
		</li>";
		echo "<li> <a href='index.php?content=admin_homepage'>admin-link</a>
		</li>";
	
	break;
	
	case 'developer':
		echo "<li> <a href='index.php?content=selectors'>selectors</a>
		</li>";
	
	break;
	case 'photographer':
		echo "<li> <a href='index.php?content=upload_homepage'>upload-link</a>
		</li>";
	
	break;
	case 'coworker':
		echo "<li> <a href='index.php?content=coworker'>pandabeer</a>
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