<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>ForHer</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" />
				<style type="text/css">
		table {float:left;
		padding-top:20px}
				table tr td {
			font-size: 1.2em;
			color: #D6B3ED;}
		</style>
	</head>
	<body>
	<?php

		require_once("connect.php"); //request connection 
		session_start(); //starting the session
		error_reporting(0);
	?>
		<div class="page">
			<div class="header">
			<a href="index.php" id="logo"><img src="images/logo.png" alt="logo" style="width:280px;height:150px"/></a>
			 <form action="SearchBrowse.php?link=5" method="post">  <button type="submit" id="searchButton" value="search">Search</button>	
				 <input id="searchBar" type="text" name="search" placeholder="Search here..." required/> 
							 </form> 
			</div>
			
			<div class="body">
				<div class="navigation">
					<span>My Shopping Cart:  <a href="cart.php">  <input type="image" id="cartButton" src="images/cart.png"/></a></span>
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
				
						
			<?php
			

				if( $_GET['link']=='1' )
				{
					$query = "SELECT * FROM products WHERE `category` = 'T-Shirts'";
					if ($result = mysql_query($query)) //display table of query results if query works
					{
						echo " <table style = 'width: 70%'>"; //esle, display table with the result
						while ($query_row = @mysql_fetch_array ($result)) //get each row one by one
						{	
					        $id = $query_row["id"];
							echo "<tr><td rowspan='3' style='padding-right:15px; height:246px; width:190px'>{$query_row['img']}</td>";
							echo "<td colspan ='2' style='font-size: 1.4em; color:aqua'>{$query_row['name']}</td></tr>";
							echo "<tr><td colspan='2'>{$query_row['description']}</td></tr>";
							echo "<tr><td style='font-size: 1.3em; color:aqua'>Price: {$query_row['price']}$</td>";
							echo  "<td><a id='buyme' href=\"cart.php?action=add&id=$id\">buy me</a></td></tr>";
							echo "<tr style='height:50px'><td></td></tr>";
						};
						echo "</table>";
					}
					else echo "FAIL";
				}
				
				if( $_GET['link']=='2' )
				{
					$query = "SELECT * FROM products WHERE `category` = 'Pants'";
					if ($result = mysql_query($query)) //display table of query results if query works
					{
						echo " <table style = 'width: 70%'>"; //esle, display table with the result
						while ($query_row = @mysql_fetch_array ($result)) //get each row one by one
						{	
						 $id = $query_row["id"];
							echo "<tr><td rowspan='3' style='padding-right:15px; height:246px; width:190px'>{$query_row['img']}</td>";
							echo "<td colspan ='2' style='font-size: 1.4em; color:aqua'>{$query_row['name']}</td></tr>";
							echo "<tr><td colspan='2'>{$query_row['description']}</td></tr>";
							echo "<tr><td style='font-size: 1.3em; color:aqua'>Price: {$query_row['price']}$</td>";
							echo  "<td><a id='buyme' href=\"cart.php?action=add&id=$id\">buy me</a></td></tr>";
							echo "<tr style='height:50px'><td></td></tr>";
						};
						echo "</table>";
					}
					else echo "FAIL";
				}
				
				if( $_GET['link']=='3' )
				{
					$query = "SELECT * FROM products WHERE `category` = 'Shoes'";
					if ($result = mysql_query($query)) //display table of query results if query works
					{
						echo " <table style = 'width: 70%'>"; //esle, display table with the result
						while ($query_row = @mysql_fetch_array ($result)) //get each row one by one
						{	
						 $id = $query_row["id"];
							echo "<tr><td rowspan='3' style='padding-right:15px; height:246px; width:190px'>{$query_row['img']}</td>";
							echo "<td colspan ='2' style='font-size: 1.4em; color:aqua'>{$query_row['name']}</td></tr>";
							echo "<tr><td colspan='2'>{$query_row['description']}</td></tr>";
							echo "<tr><td style='font-size: 1.3em; color:aqua'>Price: {$query_row['price']}$</td>";
							echo  "<td><a id='buyme' href=\"cart.php?action=add&id=$id\">buy me</a></td></tr>";
							echo "<tr style='height:50px'><td></td></tr>";
						};
						echo "</table>";
					}
					else echo "FAIL";
				}
				
				if( $_GET['link']=='4' )
				{
					$query = "SELECT * FROM products WHERE `category` = 'Accessories'";
					if ($result = mysql_query($query)) //display table of query results if query works
					{
						echo " <table style = 'width: 70%'>"; //esle, display table with the result
						while ($query_row = @mysql_fetch_array ($result)) //get each row one by one
						{	
						 $id = $query_row["id"];
							echo "<tr><td rowspan='3' style='padding-right:15px; height:246px; width:190px'>{$query_row['img']}</td>";
							echo "<td colspan ='2' style='font-size: 1.4em; color:aqua'>{$query_row['name']}</td></tr>";
							echo "<tr><td colspan='2'>{$query_row['description']}</td></tr>";
							echo "<tr><td style='font-size: 1.3em; color:aqua'>Price: {$query_row['price']}$</td>";
							echo  "<td><a id='buyme' href=\"cart.php?action=add&id=$id\">buy me</a></td></tr>";
							echo "<tr style='height:50px'><td></td></tr>";
						};
						echo "</table>";
					}
					else echo "FAIL";
				}

        			 if ( $_GET['link']=='5' ) 
				 {  $searchBy = $_POST['search'];
				      $query = "SELECT * FROM products WHERE `description` LIKE '%$searchBy%'";
					if ($result = mysql_query($query)) //display table of query results if query works
					{
						echo " <table style = 'width: 70%'>"; //esle, display table with the result
						while ($query_row = @mysql_fetch_array ($result)) //get each row one by one
						{	
						 $id = $query_row["id"];
							echo "<tr><td rowspan='3' style='padding-right:15px; height:246px; width:190px'>{$query_row['img']}</td>";
							echo "<td colspan ='2' style='font-size: 1.4em; color:aqua'>{$query_row['name']}</td></tr>";
							echo "<tr><td colspan='2'>{$query_row['description']}</td></tr>";
							echo "<tr><td style='font-size: 1.3em; color:aqua'>Price: {$query_row['price']}$</td>";
							echo  "<td><a id='buyme' href=\"cart.php?action=add&id=$id\">buy me</a></td></tr>";
							echo "<tr style='height:50px'><td></td></tr>";
						};
						echo "</table>";
					}
					else echo "FAIL";
				}    


			 ?>
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

