<?php
session_start();

$user = 'root';
$pass ='';
$Section_Chosen = 0;
$db = 'rate_my_pizza';
global $conn;
$conn = new mysqli('localhost', $user, $pass, $db) or die('unable to coonnect');

function endit()
{
	$usernameChosen = $_POST['usernameChoice'];
	$_SESSION['searched'] = $usernameChosen;
	$sqlSend = "INSERT INTO `searchedusername` (`usernameChosen`,`SelectedOrOriginal` ) VALUES ('".$usernameChosen."','0');";
	echo $sqlSend;
	global $conn ;
	$conn -> query($sqlSend);
	echo '<script> window.location.replace("http://localhost/RMPphp/profilePageReal.php"); </script>';
}


if(array_key_exists('usernameChoice', $_POST)) {
            endit();
        }


echo'
<html>
	<head>
		<title> Search </title>
		<style>
		body
		{
			background-image: url("http://localhost/RMPphp/bg.gif");
    background-size: cover;
		}
		#header
		{
			background-color: #D12703;
		}
		
		
		</style>
	</head>
	
	<body>
		<div id = "header" style = "border: 1px solid black; position: fixed; width: 99%;">
			<form method = "post" id = "headerSearch">
				<img src="https://fontmeme.com/permalink/211215/318e7c529136b0c811a179856b208d9b.png" alt="chalk-fonts" border="0">
				<input type = "text" class  = "search" name = "sSearch"/> 
				<input type="submit" id = "sSubmitButton" value="Search" name = "submit"><br>
			</form>';
			
if(isset($_POST["submit"])) 
{
	$subString = $_POST['sSearch'];
	$sqlCheckSubString = "SELECT `username`,`photo`  FROM `user` WHERE `username` LIKE '%".$subString."%';";
	$result = $conn -> query($sqlCheckSubString);
	echo '<form method = "POST">';
	$numberOfRows = mysqli_num_rows($result);
	if($numberOfRows == 0)
	{
		echo '<img src="https://fontmeme.com/permalink/211215/d2570a0e2982fc0482a4c554888c0355.png" alt="chalk-fonts" border="0">';
	}else
	{
	echo '<select name = "usernameChoice" id  ="choice">';
	
	
	for($i = 0; $i < $numberOfRows; $i++)
	{
	while ($row = $result->fetch_assoc()) {
		
		
		echo ' <option> <a href = "http://localhost/RMPphp/profilePageReal.php">'.$row["username"]. '</a> </option>';
		
		}
	}
	
		
	
	
	echo '</select>';

	echo '<input type = "submit" id = "ssSubmitButton" value = "finalSearch" name = "finalSearch" onclick = "change();">';
	echo '</form>';
	
	
	
	
	
}
}
		
	
echo'
		</div>
		<div id = "rest">
		</div>
		<div id = "backArrow" style = "position: fixed; bottom: 5%;">
			<a href = "http://localhost/RMPphp/personalProfile.php"><img src = "http://localhost/RMPphp/backArrow.png" style = "height: 30px; width: 30px;"></a>
		</div>
		
	</body>
</html>';





?>