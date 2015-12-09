<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ARAConnect</title>


<link rel="stylesheet" href="css/reset.css" type="text/css" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<script src="js/jquery.js"></script>

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>


<script type="text/javascript" src="js/custom.js"></script>

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />




</head>
<body>
<div id="container" class="width">

    <header> 
	<div class="width">

    		<h1><a><sub>ARAConnect</a></h1>

		<nav>
	
    			<ul class="sf-menu dropdown">

			
        			<li class="selected"><a href="login.php">Login</a></li>

            			<li>

					<a href="critical.php">About Us</a>
            		</li>

	     			
            
				<li><a href="#">Contact Us</a></li>
       			</ul>

			
			<div class="clear"></div>
    		</nav>
       	</div>

	<div class="clear"></div>
 </header>
	
	
   



    <div style="background-color:white">
		
		<div id="body" name="body" class="no-intro">
			<section id="content" class="one-column">
		<br/>
	  
				<div id="outputDiv"></div>
				<article>
					<?php
					if(isset($_POST['submit'])){
					$un=$_POST['un'];
					$pwd=$_POST['pwd'];

					 $results = file_get_contents('http://localhost:9799/ws/loginservice.php?un=' . $un.'&pwd='.$pwd);
					$results = json_decode($results,true);
					if($results["result"]==1){
					$_SESSION["un"]=$un;
					header("Location:home.php");
					exit();
					 }
					else{
					echo '<h3 style=color:red>Invalid Username or Password</h3><br/>';
					}

					}

					?>

			<form id="versfrm" method="post">
			<center>
			
			<table>
			
				<tr><td>Username:<td><input type="text" name="un">
				<tr><td>Password:<td><input type="text" name="pwd">
				
				<tr><td><td><input type="submit" name="submit" value="Submit" class="submit">&nbsp;&nbsp;&nbsp;New to ARAConnect? Register <a href="signup.php">here</a>
			</table>
			</center>
			</form>
	
		</article>
        </section>
        
        
    	<div class="clear"></div>
    </div>
</div>
</div>
    <footer>
        <div class="footer-content width">
            <ul>
            	<li><h4>Our Mission</h4></li>
                <p>ARAConnect's mission is to give people the power to share and make the world more open and connected.</p>
            </ul>
            
            <ul>
            	<li><h4>About Us</h4></li>
                <p>We celebrates how our friends inspire us, support us, and help us discover the world when we connect.</p>
            </ul>
		
 	        
            <ul class="endfooter">
            	<li><h4>Useful Links</h4></li>
               <li><a href="https://facebook.com" target="_blank">Facebook</a></li>
				<li><a href="https://twitter.com" target="_blank">Twitter</a></li>
				<br/><br />



</li>
            </ul>
            
            <div class="clear"></div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2015 ARAConnect. All rights reserved. &nbsp;&nbsp;<a href="/">Terms of Service</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="/">Privacy Policy</a> </p>
         </div>
    </footer>
</body>
</html>