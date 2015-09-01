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
				
				<div class ="form">
					<table  cellspacing="5">
						<form action="" method="POST">
						<tr><td>First name:</td> <td> <input type='text' name='field1'/></td></tr>
						<tr style='height:7px'><td></td></tr>
						<tr><td>Last name: </td> <td> <input type='text' name='field2'/></td></tr>
						<tr style='height:7px'><td></td></tr>
						<tr><td>Street: </td> <td> <input type='text' name='field3'/></td></tr>
						<tr style='height:7px'><td></td></tr>
						<tr><td>Zip Code: </td> <td> <input type='text' name='field4'/></td></tr>
						<tr style='height:7px'><td></td></tr>
						<tr><td>Country: </td> <td> <input type='text' name='field5'/></td></tr>
						<tr style='height:7px'><td></td></tr>
						<tr><td>E-mail: </td> <td> <input type='text' name='field6'/></td></tr>
						<tr style='height:7px'><td></td></tr>
												
					</table> 
					
					<input type='submit' value='Submit' name='submit'/>
					</form>
					<p><i>*Required fields</i></p> 
				</div>
				
			
			<?php
				$regexpstr="(^[A-Za-z0-9 .\- , \_]+$)";
				
				

				
				if (isset($_POST['submit'])){ //add new button is activated
				$field1 = ($_POST["field1"]);
				$field2 = ($_POST["field2"]);
				$field3 = ($_POST["field3"]);
				$field4 = ($_POST["field4"]);
				$field5 = ($_POST["field5"]);
				$field6 = ($_POST["field6"]);
				$field7 = ($_POST["field7"]);
				$field8 = ($_POST["field8"]);	
				$usernamecheck = mysql_query ("SELECT * FROM customers WHERE username = '$field3'");
				
				
				if (empty($field1) ||empty($field2) || empty($field3) || empty($field4) || empty($field6) || empty($field7)|| empty($field8)) {
				echo "<span style='padding-left:300px; color:#6fcacc'>Please fill in all the required fields <br/></span>";  //check if the fields are empty
				} 
				