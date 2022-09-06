<body>
<h1>Add Song to Playlist</h1>
<?php
// Enable error logging: 
error_reporting(E_ALL ^ E_NOTICE);
// mysqli connection via user-defined function
include('./my_connect.php');
$mysqli = get_mysqli_conn();

// SQL statement
$sql = "INSERT INTO Favourites
VALUES (?, ?, ?)"; 


// Prepared statement, stage 1: prepare
$stmt = $mysqli->prepare($sql);

// (2) Handle GET parameters; aid is the name of the hidden textbox in the previous page
$Client_ID =  $_GET['Client_ID']; //TODO Handle GET parameters
$Song_ID =  $_GET['Song_ID'];
$Tag =  $_GET['Tag'];


// (3) "i" for integer, "d" for double, "s" for string, "b" for blob 
$stmt-> bind_param('sis', $Client_ID, $Song_ID, $Tag);//TODO Bind Php variables to MySQL parameters 
//what does this do? it binds the php to SQL vars 

// $stmt->execute() function returns boolean indicating success 

if ($stmt->execute()) 
{ 
echo '<h1>Success!</h1>'; 
echo '<p>A song with Song ID ' .$Song_ID . 'was added to the playlist ' . $Tag . '</p>';
} 
else 
{
echo '<h1>You Failed</h1>'; 
echo '<p>A song with Song ID ' .$Song_ID . 'was not added to the playlist ' . $Tag . '</p>';
echo 'Execute failed: (' . $stmt->errno . ') ' . $stmt->error; 
} 
$stmt->close(); 
$mysqli->close();
?>

<form id="form3" action="index.php" method="get">
	<input type="submit" value="Home"/>
</form>
<form id="form1" action="user_favorites_menu.php" method="get">

</body>
