<body>
<h1>Modify Song Playlist</h1>
<?php
// Enable error logging: 
error_reporting(E_ALL ^ E_NOTICE);
// mysqli connection via user-defined function
include('./my_connect.php');
$mysqli = get_mysqli_conn();

// SQL statement
$sql = "UPDATE Favourites 
SET Client_ID = ?, Song_ID = ?, Tag =? 
WHERE Song_ID = ? and Client_ID = ? and Tag = ?"; 


// Prepared statement, stage 1: prepare
$stmt = $mysqli->prepare($sql);

// (2) Updated tag is the name of the playlist that the song is being transferred to
$Client_ID =  $_GET["Client_ID"]; 
$Song_ID =  $_GET['Song_ID'];
$Tag =  $_GET['Tag'];
$Updated_Tag =  $_GET['Updated_Tag'];

// (3) "i" for integer, "d" for double, "s" for string, "b" for blob 
$stmt-> bind_param('sisiss', $Client_ID, $Song_ID, $Updated_Tag, $Song_ID, $Client_ID, $Tag);//TODO Bind Php variables to MySQL parameters 
//what does this do? it binds the php to SQL vars 

// $stmt->execute() function returns boolean indicating success 

if ($stmt->execute()) 
{ 
echo '<h1>Success!</h1>'; 
echo '<p>A song with Song ID ' .$Song_ID . 'was added to the playlist ' . $Updated_Tag . 'from ' .$Tag .'</p>';
} 
else 
{
echo '<h1>You Failed</h1>'; 
echo '<p>A song with Song ID ' .$Song_ID . 'was not added to the playlist ' . $Updated_Tag . 'from ' .$Tag .'</p>';
echo 'Execute failed: (' . $stmt->errno . ') ' . $stmt->error; 
} 
$stmt->close(); 
$mysqli->close();
?>

<form id="form3" action="index.php" method="get">
	<input type="submit" value="Home"/>
</form>
</body>
