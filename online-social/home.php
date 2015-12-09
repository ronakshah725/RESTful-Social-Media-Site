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
			<table>
			<tr>
			<tr><td><textarea class="textarea" name="postdesc" rows=4 cols=40 placeholder="Post Something..."></textarea>
			<tr><td><input type="submit" name="submit" class="submit" value="Share">
			</table><br/>
			<table style="border:1px solid;width:60%">
			<?php
			$un= $_SESSION["un"];
			if(isset($_POST['submit'])){
					$desc=$_POST['postdesc'];
					$results = file_get_contents('http://localhost:9799/ws/addpostservice.php?un=' . $un.'&des='.urlencode($desc));
					//echo $results."<br/>";
					$results = json_decode($results,true);
					if($results["result"]==1){
					//success
					}
					else{
						echo '<tr><td>Error Posting</tr>';	
					}
				}

				
				if(isset($_SESSION['idpo'])){
				foreach ($_SESSION["idpo"] as $pid)
				{
				if(isset($_POST[$pid])){
					//echo "reply done<br/>";
					$tx= $_POST["txt".$pid];
					/* echo $pid;
					echo $tx; */
					$_SESSION["reptxt"]=$tx;
					$resultrep = file_get_contents('http://localhost:9799/ws/addreplyservice.php?postid=' . $pid.'&txt='.urlencode($tx));
					$resultrep = json_decode($resultrep,true);
						//print_r($resultrep);
					}	
					}
				}
				else
				{
				$_SESSION["idpo"]=array();
				}
				
					$results = file_get_contents('http://localhost:9799/ws/retrievepostservice.php?un=' . $un);
					//echo $results."<br/>";
					$results = json_decode($results,true);
					//print_r($results);
					
					if (array_key_exists('result', $results)){
						echo "<br/><p>No Posts Found!</p>";
					}

					else{
					foreach ($results as $arr)
					{
						$id=$arr["postid"];
						if(!in_array($id, $_SESSION['idpo']))
							$_SESSION["idpo"][]=$id;
						echo "<table style='border:1px solid;width:60%'><tr><td>".$arr["description"]." - by<b> ".$arr["username"];
						$txt="txt";
						echo "<tr><td><input type=text name=".$txt.$id.">&nbsp;&nbsp;&nbsp;
						<input type='submit' name=".$id." value='Reply'>";
						
						 foreach ($arr["replies"] as $artist=> $value)
						{
						echo "<tr><td>".$value;
						//echo "reply:".  $value."<br>";
						}
						echo '</table>';
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