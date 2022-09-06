<body>
<h1>Search Playlist</h1>
<?php
// Enable error logging: 
error_reporting(E_ALL ^ E_NOTICE);
// mysqli connection via user-defined function

include('./my_connect.php');
$mysqli = get_mysqli_conn();

$sql="SELECT Favourites.Song_ID, Favourites.Tag, Song.Song_Name, Song.Song_Length, Song.Genre, Song.BPM, Album.Album_Name, Artist.Artist_Name, Album.Date_Released 
FROM Favourites, Song, Album, Artist 
WHERE Favourites.Song_ID = Song.Song_ID AND Song.Album_ID = Album.Album_ID AND Album.Artist_ID = Artist.Artist_ID 
AND Favourites.Client_ID = ? AND Favourites.Tag = ?";
//does this change 
// Prepared statement, stage 1: prepare
$stmt = $mysqli->prepare($sql);

// Prepared statement, stage 2: bind and execute 


$Client_ID = $_GET['Client_ID']; 
$Spec_Tag = $_GET['Spec_Tag']; 
//spec tag is the text inputted by user from previous page 
//specifying which playlist the user is attempting to search

// "i" for integer, "d" for double, "s" for string, "b" for blob 
$stmt->bind_param('ss', $Client_ID, $Spec_Tag); 
$stmt->execute();

// Bind result variables v1, v2, etc where v is placeholder variable 
$stmt->bind_result($v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9); 
echo '<table>';
	echo '<tr>';
		echo '<th>Song ID</th>';
		echo '<th>Song Tag</th>';
		echo '<th>Song Name</th>';
		echo '<th>Song Length</th>';
		echo '<th>Genre</th>';
		echo '<th>BPM</th>';
		echo '<th>Album Name</th>';
		echo '<th>Artist Name</th>';
		echo '<th>Date Released</th>';
	echo '</tr>';
while ($stmt->fetch()) {
	echo'<tr><td>' . $v1 . '</td><td>' . $v2 . '</td><td>' . $v3 . '</td><td>'. $v4 . '</td><td>'. $v5 . '</td><td>'. $v6 . '</td><td>'. $v7 . '</td><td>'. $v8 .'</td><td>'. $v9 . '</td><tr>';
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