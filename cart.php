<?php session_start(); ?>
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
			
					<span id="title"> <i> ForHer.com wishes you a very Happy Easter!   </i> </span>
						</div>
				<div class="body">
					
		
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
							
							//get the name, description and price from the database							
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
					
					
				
				}else{
					//otherwise tell the user they have no items in their cart
					echo "You have no items in your shopping cart.";
					
				}
				
				//function to check if a product exists
				
			?>
	</i></p>		
			<div class="navigation">
			
			<table> 
			<tr> <td style="padding-top:50px"><a href="products.php"><input type="image" id="accountButton" src="images/button-9.png"/> </a></td> </tr>
			<tr> <td style="padding-top:50px"> <a href="account.php"><input type="image" id="accountButton" src="images/button-5.png"/> </a> </td> </tr>
			
			</table>
			</div

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