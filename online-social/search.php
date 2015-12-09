<?php
session_start();
?>
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
<script>
function showFriend(str) {
    if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("frndtbl").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","friendq.php?q="+str,true);
        xmlhttp.send();
}
</script>



</head>
<body>
<div id="container" class="width">

    <header> 
	<div class="width">

    		<h1><a><sub>ARAConnect</a></h1>

		<nav>
	
    			<ul class="sf-menu dropdown">

					<li><a href="home.php">Home</a></li>
        			<li><a href="search.php">Search Others</a></li>

            			
					<li><a href="logout.php">Logout</a></li>
       			</ul>

			
			<div class="clear"></div>
    		</nav>
       	</div>

	<div class="clear"></div>

       
    </header>

	
    <div id="intro">

	<div class="width">
      
		
	
                    <h2>Welcome <?php echo $_SESSION["un"]."!";?></h2>
                </div>
                
            
            

	</div>	

    <div style="background-color:white">
		
		<div id="body" name="body" class="no-intro">
			<section id="content" class="one-column" style="margin:0">

	    <article>
			<form id="homefrm" method="post"><center>
			
			Search a Friend by username: &nbsp;<input type="text" name="searchbox" onkeyup='showFriend(this.value)'>
			<br/><br/><br/><br/><br/>
			<table id="frndtbl" style="border:1px solid">
				
			</table>
		<?php
				if(isset($_POST['frndchk'])){
					
					$un=$_SESSION["un"];
					foreach($_POST["frndchk"] as $follower){
					
					$results = file_get_contents('http://localhost:9799/ws/followservice.php?un='.$un.'&chk=' .$follower);
					$results = json_decode($results,true);
					echo "<br/>Followed:<i> ".$follower."</i>";
				}
			}
		?>	
		</form>
		</article>
        </section>
        
        
    	<div class="clear"></div>
    </div>
</div>
</div>
    <footer>
       
        <div class="footer-bottom">
            <p>&copy; 2015 ARAConnect. All rights reserved. &nbsp;&nbsp;<a href="/">Terms of Service</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="/">Privacy Policy</a> </p>
         </div>
    </footer> 
</body>
</html>