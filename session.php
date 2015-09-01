<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = @mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("forher", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select username from Customers where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];

$ses_sql1=mysql_query("select fname from Customers where username='$user_check'", $connection);
$row1 = mysql_fetch_assoc($ses_sql1);
$fname =$row1['fname'];

$ses_sql2=mysql_query("select lname from Customers where username='$user_check'", $connection);
$row2 = mysql_fetch_assoc($ses_sql2);
$lname =$row2['lname'];

$ses_sql3=mysql_query("select street from Customers where username='$user_check'", $connection);
$row3 = mysql_fetch_assoc($ses_sql3);
$street =$row3['street'];

$ses_sql4=mysql_query("select city from Customers where username='$user_check'", $connection);
$row4 = mysql_fetch_assoc($ses_sql4);
$city =$row4['city'];

$ses_sql5=mysql_query("select zipcode from Customers where username='$user_check'", $connection);
$row5 = mysql_fetch_assoc($ses_sql5);
$zipcode =$row5['zipcode'];

$ses_sql6=mysql_query("select country from Customers where username='$user_check'", $connection);
$row6 = mysql_fetch_assoc($ses_sql6);
$country =$row6['country'];

$ses_sql7=mysql_query("select email from Customers where username='$user_check'", $connection);
$row7 = mysql_fetch_assoc($ses_sql7);
$email =$row7['email'];

$ses_sql8=mysql_query("select creditcompany from Customers where username='$user_check'", $connection);
$row8 = mysql_fetch_assoc($ses_sql8);
$creditcompany =$row8['creditcompany'];

$ses_sql9=mysql_query("select cardnumber from Customers where username='$user_check'", $connection);
$row9 = mysql_fetch_assoc($ses_sql9);
$cardnumber =$row9['cardnumber'];

$ses_sql10=mysql_query("select fName2 from Customers where username='$user_check'", $connection);
$row10 = mysql_fetch_assoc($ses_sql10);
$fName2 =$row10['fName2'];

$ses_sql11=mysql_query("select lName2 from Customers where username='$user_check'", $connection);
$row11 = mysql_fetch_assoc($ses_sql11);
$lName2 =$row11['lName2'];

$ses_sql12=mysql_query("select street2 from Customers where username='$user_check'", $connection);
$row12 = mysql_fetch_assoc($ses_sql12);
$street2 =$row12['street2'];

$ses_sql13=mysql_query("select city2 from Customers where username='$user_check'", $connection);
$row13 = mysql_fetch_assoc($ses_sql13);
$city2 =$row13['city2'];

$ses_sql14=mysql_query("select country2 from Customers where username='$user_check'", $connection);
$row14 = mysql_fetch_assoc($ses_sql14);
$country2 =$row14['country2'];

$ses_sql15=mysql_query("select zipcode2 from Customers where username='$user_check'", $connection);
$row15 = mysql_fetch_assoc($ses_sql15);
$zipcode2 =$row15['zipcode2'];

$ses_sql16=mysql_query("select email2 from Customers where username='$user_check'", $connection);
$row16 = mysql_fetch_assoc($ses_sql16);
$email2 =$row16['email2'];

if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>