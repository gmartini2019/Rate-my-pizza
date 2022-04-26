<?php
session_start();
$user = 'root';
$pass ='';
$Section_Chosen = 0;
$db = 'rate_my_pizza';
global $conn;
$conn = new mysqli('localhost', $user, $pass, $db) or die('unable to coonnect');
	echo'
	<html>
	<head>
		<title> Add post </title>
		<style>
		body
		{
			background-image: url("http://localhost/RMPphp/bg.gif");
    background-size: cover;
		}
		
		#add
		{
			background-color: white;
			position: center;
			width:12%;
			align: center;
			border: 2px solid black;
			margin-left: auto;
			height: 40%;
			box-shadow: 5px 10px #888888;
			font-family: "Lucida Console", "Courier New", monospace;
		}
		.float_child
		{
		 width: 50%;
    float: left;
    padding: 20px;
		}
		
		#aPSubmitButton
		{
			background:url(http://localhost/RMPphp/SEARCHII.png) no-repeat;
			cursor:pointer;
			width: 350;
			height: 100;
			border: none;
		}
		
		</style>
		
	</head>
	
	<body>
	<div id= "add" class = "float_child">
		<form id = "addPostForm"  method = "post" >
<img src="https://fontmeme.com/permalink/211215/ee04213e886866f74a0731b15d3a3d84.png" alt="brush-fonts" border="0">
			<input type="file" id ="postImage" name="pImage" accept="image/png, image/jpeg"><br>
	<img src="https://fontmeme.com/permalink/211215/7ae2d648de57ab8f7e0a154f1c9bdd89.png" alt="brush-fonts" border="0"><br>
			<input type = "text" id = "caption" name = "caption"/> <br>
<img src="https://fontmeme.com/permalink/211215/3a4a631b1d20d7c8b5ddbb742450132f.png" alt="brush-fonts" border="0">
		<input type = "text" id = "location" name = "location"/> <br>
			<input type="submit" name = "submit" id = "aPSubmitButton" value=""><br>
		</form>
		';
		if(isset($_POST['submit']))
	{
	$image = $_POST['pImage'];
	$caption = $_POST['caption'];
	$location = $_POST['location'];
	$username = $_SESSION['userLogin'];
	
	if($image == "" or $caption == "" or $location == "")
	{
		echo '<h3> FILL ALL FIELDS CORRECTLY</h3>';
	}
	else
	{
	
	
	
	
	$date = date("Y/m/d");
	$id = rand();
	$sqlAdd = "INSERT INTO `post` (`postId`, `username`,  `date`, `caption`, `photo`,  `Location`) VALUES ('".$id."', '".$username."', '".$date."', '".$caption."', '".$image."','".$location."');";
	$conn -> query($sqlAdd);
	}
	}
	echo'
	</div>
	';
	
echo'
	<div id = "backArrow" style = "position: fixed; bottom: 5%;">
			<a href = "http://localhost/RMPphp/personalProfile.php"><img src = "http://localhost/RMPphp/backArrow.png" style = "height: 30px; width: 30px;"></a>
		</div>
	</body>

</html>
'



?>