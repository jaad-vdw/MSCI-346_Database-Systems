<body>
<h1>User Login</h1>
<?php
	//receives client_id from previous page
	 $Client_ID = $_GET['Client_ID']; 

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

?>

<!--home button and back button --> 
<form id="form3" action="index.php" method="get">
	<input type="submit" value="Home"/>
</form>


</body>