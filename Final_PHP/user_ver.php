<body>
<h1>User Login</h1>

<?php
// Enable error logging: 
error_reporting(E_ALL ^ E_NOTICE);
// mysqli connection via user-defined function

include('./my_connect.php');
$mysqli = get_mysqli_conn();

// SQL statement
//sql query to find if client_id exists
$sql = "SELECT * FROM Client WHERE Client.Client_ID = ?";

// Prepared statement, stage 1: prepare
$stmt = $mysqli->prepare($sql);

// Prepared statement, stage 2: bind and execute 
$Client_ID = $_POST['Client_ID']; 
// "i" for integer, "d" for double, "s" for string, "b" for blob 
//should be s for string and then the php variable for the username 
$stmt->bind_param('s', $Client_ID); 
$stmt->execute();

/* fetch values */ 
if ($stmt->fetch()) 
{ 
	//form to direct user to a page to view all songs in the database
	echo '<h1>Success! Main User Directory</h1>'; 
	echo '<form id="form22" action="user_view_all_songs.php" method="get">';
	echo '<input type ="hidden" name ="Client_ID" value ="' . $Client_ID . '"/>';
	echo '<input type="submit" value="Songs Menu"/>'; 
	echo '</form>';

	//form to direct user to the favourites menu 
	echo '<form id="form22" action="user_favorites_menu.php" method="get">';
	echo '<input type ="hidden" name ="Client_ID" value ="' . $Client_ID . '"/>';
	echo '<input type="submit" value="Favorites Menu"/>'; 
	echo '</form>';	

} 
else
{
	//form to direct user to a create new user page 
echo 'since username ' . $Client_ID . ' is not found, please create a new user following button below';
echo '<form id="form22" action="create_user.php" method="get">';
echo '<input type="submit" value="Create User"/>';
echo '</form>';

}

/* close statement and connection*/ 
$stmt->close(); 
$mysqli->close();
?>

<form id="form3" action="index.php" method="get">
	<input type="submit" value="Home"/>
</form>

</body>

