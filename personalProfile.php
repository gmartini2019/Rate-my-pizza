
<?php
session_start();

$user = 'root';
$pass ='';
$db = 'rate_my_pizza';
global $conn;
$conn = new mysqli('localhost', $user, $pass, $db) or die('unable to coonnect');
$sqlUnderstand = "SELECT * FROM `searchedusername` WHERE `SelectedOrOriginal` = 1;";
$data = $conn -> query($sqlUnderstand);
$chosenUser = $_SESSION['userLogin'];

$sqlAll = "SELECT * FROM `user` WHERE `username` = '".$chosenUser."';";
$all = $conn -> query($sqlAll);
while ($row = $all->fetch_assoc()) 
{
	$numberOfFollowers = $row['nFollowers'];
	$numberOfPosts = $row['nPosts'];
	$userName = $row['username'];
	$rating = $row['rating'];
	$picture = $row['photo'];
	$email = $row['email'];
}

$sqlGetPosts = "SELECT * FROM `post` WHERE `username` = '".$chosenUser."';";

$postsObtained = $conn -> query($sqlGetPosts);
$numberOfRows = mysqli_num_rows($postsObtained );


echo '
<html>
	<head>
		<title> Profile </title>
		<style>
		img {
  border: 2px solid #555;
}
			.flex-container{
				width: 80%;
				min-height: 50px;
				margin: 0 auto;
				display: flex;
				background: #dbdfe5;
				font-family: "Lucida Console", "Courier New", monospace;
			}
			.flex-container .column{
				padding: 10px;
				background: #dbdfe5;
				
				flex: 1; 
			}
			#posts{
				
  width: 50%;
  margin: 0 auto;
background-color: white;
box-shadow: 5px 10px #888888;
			font-family: "Lucida Console", "Courier New", monospace;
			}
			
			.picture
			{
				
			}
			.picturePost
		{
			width:100%;
			height:100%;
		}
			body
		{
			background-color: #fed8b1;
		}
			
			.picture
			{
				width: 100px;
				height: 100px;
				padding-left: 40%;
				padding-top: 5%;
				
			}
			
			.profilePic
			{
				height : 150px;
			}
</style>
	</head>
	
	<body>
	
		<div id = "header" class = "flex-container" style = "border: 1px solid black; position: fixed; width: 99%;  height:5%;position:relative;">	
				<div id = "profileImage"  class = "column" style = "height:160px;border: 3px solid black;box-shadow: 5px 10px #888888;">
					<label id = "profilePhoto"> Picture </label>
					<br>
					';
					echo '<img src = "'.$picture.'" class = "profilePic"/>';
echo'
				</div>
				<div id = "profileNameAccount" class="column" style = "height:25px;border: 3px solid black;box-shadow: 5px 10px #888888;">
					<label id "usernameLabel"> Username </label>
					<br>
					';
					echo $userName;
echo'
				</div>
				<div id = "profileRating"  class="column"style = "height:25px;border: 3px solid black;box-shadow: 5px 10px #888888;">
					<label id "ratingLabel"> Followers: </label>
					<br>
					';
					$sqlFollowers = "SELECT COUNT(*) FROM `followtable` WHERE `followed` = '".$chosenUser."';";
					$numberOfFollowers = $conn -> query($sqlFollowers);
					$numberOfFollowersB = mysqli_num_rows($numberOfFollowers );
					echo $numberOfFollowersB;
echo'
				</div>
				<div id = "profileEmail"  class="column"style = "height:160px; border: 3px solid black;box-shadow: 5px 10px #888888;">
					<label id "emailLabel"> email </label>
					<br>
					';
					echo $email;
					echo'
				</div>
	
	</div>
	<div style = "position:relative;border: 1px solid black;" id = "posts">
	<table>
	';	
	for($i = 0; $i < $numberOfRows; $i++)
	{
		while($row = $postsObtained->fetch_assoc()) 
		{
			echo '<th>';
			echo '<tr> <img class = "picturePost" src = "'.$row['photo'].'" /></tr> <br>';
			echo '<tr class = "caption"> <i> Caption: </i>'.$row['caption'].'</tr> <br>';
			echo '<tr class = "rating"> <i> Location: </i>'.$row['Location'].'</tr> <br>';
			echo '<tr class = "date"> <i> date: </i>'.$row['date'].'</tr><br>';
			echo '</th>';
		}
	}
	echo'
	</table>
	</div>
	
		<div id = "backArrow" style = "position: fixed; bottom: 5%;">
			<a href = "http://localhost/RMPphp/searchPagephp.php"><img src = "http://localhost/RMPphp/search.png" style = "height: 30px; width: 30px;"></a>
		</div>
		
		<div id = "addPostButton" style = "position: fixed; bottom: 5%; margin-left:95%;">
			<a href = "http://localhost/RMPphp/addPostPage.php"><img src = "http://localhost/RMPphp/addPost.png" style = "height: 50px; width: 50px;"></a>
		</div>
				
		</div>
	</body>
</html>
';

$sqlClear = "DELETE FROM `searchedusername` WHERE `usernameChosen` = ".$chosenUser.";";
$conn -> query($sqlClear);

?>