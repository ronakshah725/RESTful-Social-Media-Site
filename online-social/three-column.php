
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Choose Vendors</title>

<link rel="stylesheet" href="css/reset.css" type="text/css" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<link href="all.css" rel="stylesheet">
  <script src="jquery.js"></script>
  <script src="icheck.js"></script>




<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>

<script type="text/javascript" src="js/custom.js"></script>

 

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />


</head>
<body>
<div id="container" class="width">

    <header> 
	<div class="width">

    		<h1><a><sub>mak</sub>Secure</a></h1>

		<nav>
	
    			<ul class="sf-menu dropdown">

			
        			<li class="selected"><a href="index.html">Home</a></li>

            			<li>

					<a href="examples.html">Process</a>
            			
					<ul>
						 <li><a href="critical.php">Critical Information Asset Profile</a></li>
						<li><a href="risk.php">Information Asset Risk Worksheet</a></li>  
						<li><a href="usage.php">Information Asset Usage by People</a></li>
                		<li><a href="three-column.html">Three Column</a></li>
						<li><a href="one-column.html">One Column</a></li>
                    	
					</ul>

            			</li>

	     			<li><a href="tech.html">Technology</a></li>
            
				<li><a href="#">Contact Us</a></li>
       			</ul>

			
			<div class="clear"></div>
    		</nav>
       	</div>

	<div class="clear"></div>

       
    </header>



     <div id="body" class="no-intro">

	<section id="content" class="one-column">

	    <article>
				
			
			<h2>Choose Vendors:</h2>
            <?php
				
				$con=mysqli_connect("127.0.0.1","root","","cve");
				// Check connection
				if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				
				
				$result = mysqli_query($con,"select vendor_name from vendor");
				$count=0;
				echo '<table border=1>';
				while($row = mysqli_fetch_array($result))
				{
					
					if($count%6==0)
					echo '<tr>';

					$count=$count+1;
					
					echo '<td><input type=checkbox id='.$row["vendor_name"].'>';
					echo '<label>'.substr(ucfirst($row["vendor_name"]),0,15).'</label>';
					
					
					
				}
				?>
				</table>
				
				</article>
		<script>
            $(document).ready(function(){
              $('input').each(function(){
                var self = $(this),
                  label = self.next(),
                  label_text = label.text();

                label.remove();
                self.iCheck({
                  checkboxClass: 'icheckbox_line-blue',
                  radioClass: 'iradio_line-blue',
                  insert: '<div class="icheck_line-icon"></div>' + label_text
                });
              });
            });
</script>
</article>
 </section>
        
        
    	<div class="clear"></div>
    </div>
</div>

    <footer>
        <div class="footer-content width">
            <ul>
            	<li><h4>Our Mission</h4></li>
                <p>We exist to help our clients identify and assess risks. That's what we do.</p>
            </ul>
            
            <ul>
            	<li><h4>About Us</h4></li>
                <p>Simply stated, we help organizations be more secure. We apply industry standards, regulations and best practices to objectively assess the risks to your information security assets. As a result, you have a thorough understanding of where you're most vulnerable and a plan to manage the risk.</p>
            </ul>

 	    <ul>
                <li><h4>Recent News</h4></li>
                <li><a href="#">Adobe Releases Security Update for Shockwave Player</a></li>
                <li><a href="#">Windows 10 fix shortly to release</a></li>
                
            </ul>
            
            <ul class="endfooter">
            	<li><h4>Useful Links</h4></li>
               <li><a href="https://nvd.nist.gov" target="_blank">NIST</a></li>
				<li><a href="https://cve.mitre.org" target="_blank">MITRE</a></li>
				<br/><br />

<div class="social-icons">

<a href="#"><i class="fa fa-facebook fa-2x"></i></a>

<a href="#"><i class="fa fa-twitter fa-2x"></i></a>



</div>

</li>
            </ul>
            
            <div class="clear"></div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2015 MakSecure. All rights reserved. &nbsp;&nbsp;<a href="/">Terms of Service</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="/">Privacy Policy</a> </p>
         </div>
    </footer>
</body>
</html>