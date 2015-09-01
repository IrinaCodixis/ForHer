<?php
include('session.php');
?>
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
			color: white;}
		table tr th {
			font-size:1.5em;
			color: #D6B3ED;
			}
				
		</style>
	</head>
<body>
<?php

		require_once("connect.php"); //request connection 
			if(isset($_GET['id'])){ $product_id = $_GET['id']; }  //the product id from the URL 
			if(isset($_GET['action'])){ $action = $_GET['action']; }  //the action from the URL 
				error_reporting(0);
		
	?>

<div class="page">
			<div class="header">
				<a href="index.php" id="logo"><img src="images/logo.png" alt="logo" style="width:280px;height:150px"/></a>
			<span id="title"> <i> <?php echo $login_session ?>, thank you for choosing ForHer.com  </i> </span>
				  
			</div>
			
	
			
			

<div id="profile">
<b id="welcome">  <i> Welcome, <?php echo $login_session ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>

	<div class="body">
		<p style="color:#d9b3eb;font-size:20px;font-family:Arial;" > Review your order </p>
			<?php

				

				//if there is an product_id and that product_id doesn't exist display an error message

				switch($action) {	//decide what to do	
				
					case "add":
						$_SESSION['cart'][$product_id]++; //add one to the quantity of the product with id $product_id 
					break;
					
					case "remove":
						$_SESSION['cart'][$product_id]--; //remove one from the quantity of the product with id $product_id 
						if($_SESSION['cart'][$product_id] == 0) unset($_SESSION['cart'][$product_id]); //if the quantity is zero, remove it completely (using the 'unset' function) - otherwise is will show zero, then -1, -2 etc when the user keeps removing items. 
					break;
					
				
				}
				
			?>

<i> <p style="color:#6fcacc"> 
			<?php	
				$total=0;
				if($_SESSION['cart']) {	//if the cart isn't empty
					//show the cart
					
					echo "<table width='70%'>";	//format the cart using a HTML table
					echo "<tr> <th> Product </th>";
					echo "<th> Description </th>";
					echo   "<th> Price </th>";
					echo   "<th style='padding-left:20px'> Quantity </th>";
					echo	"<th style='padding-left:20px'> Edit </th>	</tr>";
					
						//iterate through the cart, the $product_id is the key and $quantity is the value
						foreach($_SESSION['cart'] as $product_id => $quantity) {	
							
							//get the name, description and price from the database - this will depend on your database implementation.
							//use sprintf to make sure that $product_id is inserted into the query as a number - to prevent SQL injection
							$sql = "SELECT name, description, price, img FROM products WHERE id = $product_id";
								
							$result = @mysql_query($sql);
							 
							//Only display the row if there is a product (though there should always be as we have already checked)
							if (@mysql_num_rows($result) > 0)  { 
							
								list($name, $description, $price, $img) = @mysql_fetch_row($result);
							
								$line_cost = $price * $quantity;		//work out the line cost
								$total = $total + $line_cost;			//add to the total cost
							
								//show this information in table cells
								    echo "<tr><td rowspan='2' style='width:77px; height:100px'>$img</td>";
									echo "<td rowspan='2' style='padding-left:15px'>$name</td>";
									echo "<td rowspan='2' align='center'>$price\$</td>";
									echo "<td rowspan='2' align='center'>$quantity</td>";
									echo "<td rowspan='2' style='padding-right:2%'> <a id='buyme' href=\"$_SERVER[PHP_SELF]?action=add&id=$product_id\">add</a>";
									echo " <a id='buyme' href=\"$_SERVER[PHP_SELF]?action=remove&id=$product_id\">remove</a></td></tr>";
							        echo "<tr style='height:0px'></tr>";
							}
						}
						
						//show the total
						echo "<tr>";
							echo "<td colspan='4' align='right'>Sub-Total: </td>";
							echo "<td align='center' style='padding-left:10px'>{$total}\$</td>";
						echo "</tr>";
						$shipping = $total*0.1;
					
						echo "<tr>";
							echo "<td colspan='4' align='right'>Shipping and Handling: </td>";
							echo "<td align='center' style='padding-left:10px'>{$shipping}\$</td>";
						echo "</tr>";
						
						$shippingTotal = $total+$shipping;
						echo "<tr>";
							echo "<td colspan='4' align='right'><strong>Total: </strong></td>";
							echo "<td align='center' style='padding-left:10px'>{$shippingTotal}\$</td>";
						echo "</tr>";
	
					echo "</table>";
				echo"<br/><br/>";	
					
				
				}else{
					//otherwise tell the user they have no items in their cart
					echo "You have no items in your shopping cart.";
					
				}
				
				//function to check if a product exists
				
			?>
				
			
			
				<div class="navigation">
					<span>My Shopping Cart: <a href="cart.php">  <input type="image" id="cartButton" src="images/cart.png"/></a></span>
					
					
					
					<ul id="navigation">
						<li class="selected"><a href="index.php">home</a></li>
						<li><a href="products.php">All products</a></li>
						<li><a href="SearchBrowse.php?link=1">T-Shirts</a></li>
						<li><a href="SearchBrowse.php?link=2">Pants</a></li>
						<li><a href="SearchBrowse.php?link=3">Shoes</a></li>
						<li><a href="SearchBrowse.php?link=4">Accessories</a></li>
					</ul>
					<span> <a href="checkout.php"> <input type="image" id="accountButton" src="images/button.png"/> </a></span>
					<br>
					
				</div>

					


		<table  frame="box"  style="font-size:1.1em;color:#6c3e8f;font-family:Calibri;text-align: left;font-style: normal;alignborder-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px; padding: 20px;border-spacing: 10px;">
  
<tr>
    <th>Delivery Address</th>
    <th>Invoice Address</th>		
    <th>Payment Method</th>
  </tr>

 <tr>
    <td><?php echo $fname ?> <?php echo $lname ?> <br> <br>
  <?php echo $street ?> <br> <br>		
   <?php echo $city ?> <?php echo $zipcode ?>, <?php echo $country ?> <br> <br>
     <?php echo $email ?> <br> <br>
     <span> <a href="change1.php"> <input type="image" id="changeButton" src="images/button-2.png"/> </a></span>
     </td>	
     
      <td><?php echo $fName2 ?> <?php echo $lName2 ?> <br> <br>
  <?php echo $street2 ?> <br> <br>		
   <?php echo $city2 ?> <?php echo $zipcode2 ?>, <?php echo $country2 ?> <br> <br>
     <?php echo $email2 ?> <br> <br>
     <span> <a href="change2.php"> <input type="image" id="changeButton" src="images/button-2.png"/> </a></span> </td>	
     
      <td> Credit Card Company:
  <?php echo $creditcompany ?> <br> <br>
  Card Number: 
  <?php echo $cardnumber ?> <br> <br> <br> <br> <br> <br> 
  <span> <a href="change3.php"> <input type="image" id="changeButton" src="images/button-2.png"/> </a></span>		
 </td>	
     
    
     
  </tr>



</table>
		
				
			
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