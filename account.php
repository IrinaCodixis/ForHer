<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>ForHer</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" />
	</head>
<body>


			
		
<div class="page">
		
				
			<div class="header">
			<a href="index.php" id="logo"><img src="images/logo.png" alt="logo" style="width:280px;height:150px"/></a>
					<span id="title"> <i> Please sign in with your ForHer.com </br> username and password or
					Register <a style="color:#6fcacc" href="registration.php"> here </a> </i> </span>
						</div>



<div class="form1">
<p>
 
<span style="color:#6fcacc" > Sign In Help </span>
Forgot your password? Get password <span style="color:#6fcacc" > help </span>.
<br>
Has your e-mail address changed? Update it  <span style="color:#6fcacc" > here </span>.
</p>

<div id="login">
<h2>Sign In</h2>
<br>
<br>
<div class="form">
<form action="" method="post"  >
<label>UserName :</label>
<span>
<input id="name" name="username" placeholder="username" type="text">
<br>
<br>
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<br>
<br>
<input name="submit"  type="submit" value=" Sign In ">
</span>
<br>
<span style="color: white; font-size: 10pt "> <i> <?php echo $error; ?> </i> </span>
</form>
</div>
</div>
</div>

</div>

</body>
</html>