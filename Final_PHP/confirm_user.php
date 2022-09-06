<body>
<h1>User Creation</h1>
<?php
// Enable error logging: 
error_reporting(E_ALL ^ E_NOTICE);
// mysqli connection via user-defined function
include('./my_connect.php');
$mysqli = get_mysqli_conn();

// SQL statement
$sql = "INSERT INTO Client
VALUES (?, ?, ?, ?)"; 


// Prepared statement, stage 1: prepare
$stmt = $mysqli->prepare($sql);

//these values are inputted by the user
$Client_ID =  $_POST["Client_ID"]; //TODO Handle GET parameters
$First_Name =  $_POST['First_Name'];
$Last_Name =  $_POST["Last_Name"];
$Email =  $_POST["Email"];//TODO Handle GET parameters


// (3) "i" for integer, "d" for double, "s" for string, "b" for blob 
$stmt-> bind_param('ssss', $Client_ID, $First_Name, $Last_Name, $Email);//TODO Bind Php variables to MySQL parameters 


// $stmt->execute() function returns boolean indicating success 

if ($stmt->execute()) 
{ 
echo '<h1>Success!</h1>'; 
echo '<p>A new user was created with Username: ' . $Client_ID . ', name ' . $First_Name . ' '. $Last_Name . ' and email '. $Email. '</p>';
echo '<p>Please return to the home page and login using your username : '. $Client_ID .'</p>'; 

echo '<form id="form22" action="index.php" method="get">';
echo '<input type="submit" value="Home page"/>'; 
echo '</form>';	
} 
else 
{
echo '<h1>You Failed</h1>'; 
echo '<p>A new user was not created with Username: ' . $Client_ID . ', name ' . $First_Name . ' '. $Last_Name . ' and email '. $Email. '</p>';
echo 'Execute failed: (' . $stmt->errno . ') ' . $stmt->error; 
} 
$stmt->close(); 
$mysqli->close();
?>

<form id="form11" action="index.php" method="get">
	<input type="submit" value="Home"/>
</form>
</body>
