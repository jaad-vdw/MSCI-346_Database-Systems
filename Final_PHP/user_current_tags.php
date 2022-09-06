<body>
<h1>View Current User Playlists</h1>
<?php
// Enable error logging: 
error_reporting(E_ALL ^ E_NOTICE);
// mysqli connection via user-defined function

include('./my_connect.php');
$mysqli = get_mysqli_conn();

$sql="SELECT DISTINCT Favourites.Tag 
From Favourites 
Where Favourites.Client_ID = ?
";
//does this change 
// Prepared statement, stage 1: prepare
$stmt = $mysqli->prepare($sql);

// Prepared statement, stage 2: bind and execute 


$Client_ID = $_GET['Client_ID']; 

// "i" for integer, "d" for double, "s" for string, "b" for blob 
$stmt->bind_param('s', $Client_ID); 
$stmt->execute();

// Bind result variables 
$stmt->bind_result($v1); 
echo '<table>';
	echo '<tr>';
		echo '<th>Song Tag</th>';
	echo '</tr>';
while ($stmt->fetch()) {
	echo'<tr><td>' . $v1 . '</td><tr>';
}
echo '</table>';
/* close statement and connection*/ 
$stmt->close(); 
$mysqli->close();
?>
<form id="form3" action="index.php" method="get">
	<input type="submit" value="Home"/>
</form>

</body>