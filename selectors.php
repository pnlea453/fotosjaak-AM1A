<?php 
	$userrole = array('root', 'developer');
	include("security.php"); 
?>
<script style="text/javascript">
	$(document).ready(function(){
		//dblclick, click, mouseenter, mouseleave , css, hide
		
		
		
		var groter = 20;
		$("button#2").mouseenter(function(){
			$("p#eerste").css("border","2px solid red")
			      .css("background-color" , "RGBA(10,20,255,1.0)")
			      .css("font-size", groter + "px");
			  });
	    $("button#1").dblclick(function(){
	    	groter +=4;
		    $("p#eerste").css("font-size", groter + "px");
		});
		$("p#tweede").mouseenter(function(){
			$("p#derde").fadeIn(5000);
		});
	});
	
		
	
</script>
<u>Dit is een jquery oefening met het maken van selectors</u><br>
<button id=1>Verberg eerste paragraaf</button>
<button id=2>Verberg tweede paragraaf</button>
<p id='eerste'>Dit is de eerste paragraaf</p>
<p id='tweede'>Dit is de tweede paragraaf</p>
<p id='derde' display="none">Dit is de tweede paragraaf</p>