<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>ForHer</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" />
			<style type="text/css">
			.form {
			font-size: 1.2em;
			color: #D6B3ED;
			padding-left:130px;
			padding-top:30px;
			}
		
			 
			input[type=submit] {
			width: 10em; 
			height: 2em;
			}

			
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
			<span id="title">REGISTRATION</span>
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
						<tr><td>*First name:</td> <td> <input type='text' name='field1'/></td></tr>
						<tr style='height:7px'><td></td></tr>
						<tr><td>*Last name: </td> <td> <input type='text' name='field2'/></td></tr>
						<tr style='height:7px'><td></td></tr>
						<tr><td>*Username: </td> <td> <input type='text' name='field3'/></td></tr>
						<tr style='height:7px'><td></td></tr>
						<tr><td>*Password: </td> <td> <input type='text' name='field4'/></td></tr>
						<tr style='height:7px'><td></td></tr>
						<tr><td>*Repeat password: </td> <td> <input type='text' name='field5'/></td></tr>
						<tr style='height:7px'><td></td></tr>
						<tr><td>*Country: </td> <td> <input type='text' name='field6'/></td></tr>
						<tr style='height:7px'><td></td></tr>
						<tr><td>*City: </td> <td> <input type='text' name='field7'/></td></tr>
						<tr style='height:7px'><td></td></tr>
						<tr><td>*Street: </td> <td> <input type='text' name='field8'/></td></tr>
						<tr style='height:7px'><td></td></tr>
						<tr><td>*Zip code: </td> <td> <input type='text' name='field9'/></td></tr>
						<tr style='height:7px'><td></td></tr>
						<tr><td>*Email: </td> <td> <input type='text' name='field10'/></td></tr>
						<tr style='height:7px'><td></td></tr>
					</table> 
					
					<input type='submit' value='Submit' name='submit'/>
					</form>
					<p><i>*Required fields</i></p> 
				</div>
				
			
			<?php
				$regexpstr="(^[A-Za-z0-9 .\- , \_]+$)";
				$regexpemail = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";
				$regexzip = "/^[0-9]{5}(?:-[0-9]{4})?$/";

				
				if (isset($_POST['submit'])){ //add new button is activated
				$field1 = ($_POST["field1"]);
				$field2 = ($_POST["field2"]);
				$field3 = ($_POST["field3"]);
				$field4 = ($_POST["field4"]);
				$field5 = ($_POST["field5"]);
				$field6 = ($_POST["field6"]);
				$field7 = ($_POST["field7"]);
				$field8 = ($_POST["field8"]);
				$field9 = ($_POST["field9"]);
				$field10 = ($_POST["field10"]);
				$usernamecheck = mysql_query ("SELECT * FROM customers WHERE username = '$field3'");
				
				
				if (empty($field1) ||empty($field2) || empty($field3) || empty($field4) || empty($field6) || empty($field7)|| empty($field8) || empty($field9) || empty($field10)) {
				echo "<span style='padding-left:300px; color:#6fcacc'>Please fill in all the required fields <br/></span>";  //check if the fields are empty
				} 
				
				//validate name, last name, username and password
					elseif (!preg_match($regexpstr,$field1)){
					echo "<span style='padding-left:300px; color:#6fcacc; font-size: 1.4em'>Name is <strong> NOT </strong>valid. <br/> </span>";
					}
					elseif (!preg_match($regexpstr,$field2)){ 
					echo "<span style='padding-left:300px;  color:#6fcacc; font-size: 1.4em'>Last name is <strong> NOT </strong>valid. <br/></span>";
					}
					elseif (mysql_num_rows ($usernamecheck) > 0) {
					echo "<span style='padding-left:300px; color:#6fcacc; font-size: 1.4em'>This username is already taken. Choose another one. <br/></span>";
					}
					elseif ($_POST['field4'] != $_POST['field5']) {
					echo "<span style='padding-left:300px; color:#6fcacc; font-size: 1.4em'>Password is not matching. Try again.</span>";
					} 
					elseif (!preg_match($regexzip,$field9)){
					echo "<span style='padding-left:300px; color:#6fcacc; font-size: 1.4em'>Zip code is <strong> NOT </strong>valid. <br/></span>";
					}
					elseif (!preg_match($regexpemail,$field10)){
					echo "<span style='padding-left:300px; color:#6fcacc; font-size: 1.4em'>Email address is <strong> NOT </strong>valid. <br/></span>";
					}
					else {
				$mysql_host = "localhost";
				$mysql_name = "root";
				$mysql_password = "";
				$mysql_db = "forher";

				$con = @mysql_connect ($mysql_host, $mysql_name, $mysql_password);
				$select_db = @mysql_select_db($mysql_db, $con);
								if (!$con) //if unable to connect to the database, 
					{
						die('Could not connect: ' . mysql_error()); //display error
					}
					elseif (!$select_db) //if unable to select database
					{
						die("Cannot use the db: " . mysql_error()); //display error
					}
					else
					{
				$insert = "INSERT INTO customers (fName, lName, username, password, country, city, street) VALUES ('$field1','$field2','$field3','$field4',
				'$field6','$field7','$field8')";
				mysql_query($insert,$con); //executing the query
				if (!$insert) {
					echo"ERROR"; }
				else
				echo "<span style='padding-left:300px; color:#6fcacc; font-size: 1.4em'>You are successfully registered</span>"; }} }
					 //query for insertion 

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