<?php
session_start();				
				$con=mysqli_connect("127.0.0.1","root","","social");
				// Check connection
				if (mysqli_connect_errno()) {
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				echo '<form name=frnd method=post action="search.php">';
						if (isset($_GET['q']))
							$friendq=$_GET['q'];
						else
							$friendq='A';
						
						$result = mysqli_query($con,"select * from login where username like '%$friendq%'");
						$count=0;
						
						while($row = mysqli_fetch_array($result))
						{
						echo '<tr><td>';
						$count=$count+1;
						echo '<input type=checkbox name="frndchk[]" value='.$row["username"].' id='.$row["username"].'>&nbsp;&nbsp;&nbsp;'.$row["fn"]." ".$row["ln"];
						}
						
						echo "<tr><td ><input type='submit' name=follow value=Follow>";
				
					
						

							


							?>
