<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>ForHer</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" />
	</head>
	<body>
		<?php

		require_once("connect.php"); //request connection 
		session_start(); //starting the session
	?>
		<div class="page">
			<div class="header">
				<a href="index.php" id="logo"><img src="images/logo.png" alt="logo" style="width:280px;height:150px"/></a>
			 <form action="SearchBrowse.php?link=5" method="post">  <button type="submit" id="searchButton" value="search">Search</button>	
				 <input id="searchBar" type="text" name="search" placeholder="Search here..." required/> 
							 </form> 
				  
			</div>
			
			<div class="body">
			
			<div class="random">
			<table>
			<tr>
			<td style="height:340px; width:300px; text-align:top; vertical-align:top">
			<a href="SearchBrowse.php?link=1" style="font-size: 1.4em; color:aqua; text-decoration:none" title="explore more T-shirts"> 
			<?php 	
			$query = "SELECT img,name FROM products WHERE `category` = 'T-Shirts' ORDER BY RAND() LIMIT 1";
				if ($result = mysql_query($query)) 
			{
			      $query_row = @mysql_fetch_array ($result);
				   echo "{$query_row['name']}";
				   echo "</br></br>";
				   echo $query_row['img'];
					}
			else echo "FAIL";	
			?>
			</a></td>
			<td style="width:40px"> </td>
			<td style="height:340px; width:300px; text-align:top; vertical-align:top">
			<a href="SearchBrowse.php?link=2" style="font-size: 1.4em; color:aqua; text-decoration:none" title="explore more pants">
						<?php 	
			$query = "SELECT img,name FROM products WHERE `category` = 'pants' ORDER BY RAND() LIMIT 1";
				if ($result = mysql_query($query)) 
			{
			      $query_row = @mysql_fetch_array ($result);
				   echo $query_row['name'];
				   echo "</br></br>";
				   echo $query_row['img'];
				   
					}
			else echo "FAIL";	
			?>
			</a></td>
        	</tr>
			<tr> 
			<td style="height:340px; width:300px;text-align:top; vertical-align:top">
			<a href="SearchBrowse.php?link=3" style="font-size: 1.4em; color:aqua; text-decoration:none" title="explore more shoes">
						<?php 	
			$query = "SELECT img,name FROM products WHERE `category` = 'shoes' ORDER BY RAND() LIMIT 1";
				if ($result = mysql_query($query)) 
			{
			      $query_row = @mysql_fetch_array ($result);
				   echo $query_row['name'];
				   echo "</br> </br>";
				   echo $query_row['img'];
					}
			else echo "FAIL";	
			?>
			</a></td>
			<td style="width:40px"></td>
			<td style="height:340px; width:300px;text-align:top; vertical-align:top">
			<a href="SearchBrowse.php?link=4" style="font-size: 1.4em; color:aqua; text-decoration:none" title="explore more accessories">
			<?php 	
			$query = "SELECT img,name FROM products WHERE `category` = 'accessories' ORDER BY RAND() LIMIT 1";
				if ($result = mysql_query($query)) 
			{
			      $query_row = @mysql_fetch_array ($result);
				   echo $query_row['name'];
				   echo "</br></br>";
				   echo $query_row['img'];
					}
			else echo "FAIL";	
			?></a></td>
			
			</tr>
				</table>
			</div>
				<div class="navigation">
					<span>My Shopping Cart: <a href="cart.php">  <input type="image" id="cartButton" src="images/cart.png"/></a></span>
					<span> <a href="account.php"><input type="image" id="accountButton" src="images/button-5.png"/> </a></span>
					
					<ul id="navigation">
						<li class="selected"><a href="index.php">home</a></li>
						<li><a href="products.php">All products</a></li>
						<li><a href="SearchBrowse.php?link=1">T-Shirts</a></li>
						<li><a href="SearchBrowse.php?link=2">Pants</a></li>
						<li><a href="SearchBrowse.php?link=3">Shoes</a></li>
						<li><a href="SearchBrowse.php?link=4">Accessories</a></li>
					</ul>
				</div>
				
			</div>
			<div class="footer">
				<div>
					<p><a href="#">Sign Up</a> for <font>ForHer's</font> <a href="#">Updates</a> and receive <span>10% off</span> your next order!</p>
					<form action="">
						<input type="text" value="Name" onblur="this.value=!this.value?'Name':this.value;" onfocus="this.select()" onclick="this.value='';"/>
						<input type="text" value="Enter Email Address" onblur="this.value=!this.value?'Enter Email Address':this.value;" onfocus="this.select()" onclick="this.value='';"/>
					</form>
				</div>
				<div id="connect">
					<h3>Get in touch / for inquiries:</h3>
					<span>myemail@email.com <font>or</font> <span>9386 000 13860</span></span>

				</div>
			
			</div>
		</div>
	</body>
</html>

