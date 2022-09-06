<body>
<h1>Favorites Menu</h1>
<?php
	//receiving client_id in this get method will be useful in 
	//sending client_id as a hidden input to all subsequent pages 
	 $Client_ID = $_GET['Client_ID']; 
	//this form directs user to page where the user can view all playlists belonging to user
	echo '<h4>All Playlists</h4>';
	echo '<form id="form11" action="user_view_all_playlists.php" method="get">';
	echo '<input type ="hidden" name ="Client_ID" value ="' . $Client_ID . '"/>';
	echo '<input type="submit" value="View All Playlists"/><br>';
	echo '</form>';
	//this forms directs user to list of currently used playlists by user 
	echo '<h4>Current Playlists</h4>';
	echo '<form id="form12" action="user_current_tags.php" method="get">';
	echo '<input type ="hidden" name ="Client_ID" value ="' . $Client_ID . '"/>';
	echo '<input type="submit" value="View Current Tags"/><br>';
	echo '</form>';
	echo '<h4>Search for Playlist</h4>';
	echo '<form id="form13" action="user_specific_playlist.php" method="get">';
	echo '<input type ="hidden" name ="Client_ID" value ="' . $Client_ID . '"/>';

	//this form directs user to search page where the user can search the favourites table by a playlist name
	echo '<input type="text" name="Spec_Tag"><br>';
	echo '<input type="submit" value="Search for Playlist"/><br>';
	echo '</form>';
	//this form directs user to page displaying all playlists belonging to user with less than three songs
	echo '<form id="form12" action="user_small_playlists.php" method="get">';
	echo '<input type ="hidden" name ="Client_ID" value ="' . $Client_ID . '"/>';
	echo '<input type="submit" value="View Small Playlists"/><br>';
	echo '</form>';
	//this form allows user to add a song to a particular playlist
	echo '<h4>Adding Song to Playlist:</h4>';
	echo '<form id="form12" action="user_add_to_playlist.php" method="get">';
	echo '<input type ="hidden" name ="Client_ID" value ="' . $Client_ID . '"/>';
	echo 'Please Enter Song ID:<br>';
	echo '<input type="text" name="Song_ID"/>	<br>';
	echo 'Please Enter Playlist Name / Tag Name:<br>';
	echo '<input type="text" name="Tag"/><br><br>';
	echo '<input type="submit" value="Add to playlist"/><br>';
	echo '</form>';
	//this form allows user to modify song membership in a playlist by 
	//switching the song to a new playlist
	echo '<h4>Modify Song Membership in Playlist:</h4>';
	echo '<form id="form12" action="user_modify_tag.php" method="get">';
	echo '<input type ="hidden" name ="Client_ID" value ="' . $Client_ID . '"/>';
	echo 'Please Enter Song ID:<br>';
	echo '<input type="text" name="Song_ID"/>	<br>';
	echo 'Please Enter Playlist Name / Tag Name:<br>';
	echo '<input type="text" name="Tag"/><br><br>';
	echo 'Please Enter New Playlist Name / Tag Name:<br>';
	echo '<input type="text" name="Updated_Tag"/><br><br>';
	echo '<input type="submit" value="Switch song to new playlist"/><br>';
	echo '</form>';
	//this form directs user to page displaying recommended songs based off of the
	//most similar user's playlists
	echo '<h4>Recommended Songs</h4>';
	echo '<form id="form12" action="user_recommended_songs.php" method="get">';
	echo '<input type ="hidden" name ="Client_ID" value ="' . $Client_ID . '"/>';
	echo '<input type="submit" value="View My Recommended Songs"/><br>';
	echo '</form>';
	//this form directs user to page displaying all users of the database
	//ranked by how many songs are mutually added to playlists
	echo '<h4>User Matches</h4>';
	echo '<form id="form12" action="user_matches.php" method="get">';
	echo '<input type ="hidden" name ="Client_ID" value ="' . $Client_ID . '"/>';
	echo '<input type="submit" value="View Ranked User Matches"/><br>';
	echo '</form>';
?>



<!--home button--> 

<form id="form3" action="index.php" method="get">
	<input type="submit" value="Home"/>
</form>


</body>