<?php
session_start();
$user = 'root';
$pass ='';
$Section_Chosen = 0;
$db = 'rate_my_pizza';
$conn = new mysqli('localhost', $user, $pass, $db) or die('unable to coonnect');
echo '
<html>
	<head>
		<title> Login </title>
		<style>
		
		body
		{
			background-color: #fed8b1;
		}
		
		#loginBox
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
		
		
		
		#logo
		{
			margin-right: auto;
			margin-left: auto;

		}
		
		.float_container
		{
			
    padding: 20px;
		}
		.float_child
		{
		 width: 50%;
    float: left;
    padding: 20px;
		}
		
		#main_text
		{
		width: 1000px;
		height: 700px;
		}
		
		#lSubmitButton
		{
		width: 150px;
		height: 50px;
		}
		
		
		#lSubmitButton
		{
			cursor:pointer;
			width: 100px;
			height: 50px;
			border: 1px;
		}
		</style>
	</head>
	<body>
		<header>
			<img src = "http://localhost/RMPphp/RMPLogo.png" id = "logo">
		</header>
	<div class = "float_container">
		<div id = "loginBox" class = "float_child">
			<form method = "post" id = "loginForm">
				<img src = "https://fontmeme.com/permalink/211128/f891a56b5e90845803332568b4ff8b77.png">
				 <input type="text" class ="username" name="lname" id = "username"> <br>
				 <img src = "https://fontmeme.com/permalink/211128/325c9fd38e7a544a4df22d7cedcd1ebc.png">
				 <input type = "password" class  = "password" id = "password" name = "lpassword"/> <br>
				 <input type="submit" src = "C:\xampp\htdocs\RMPphp\loginButton.png "id = "lSubmitButton" name = "submit" value="Login">
			</form>
			</div>
			
		';
		if(isset($_POST['submit'])) 
		{
			$username = $_POST['lname'];
			$password = $_POST['lpassword'];
			$sqlCheck = "SELECT * FROM `user` WHERE `username` = '".$username."' AND `password` = '".$password."';";
			$result = $conn -> query($sqlCheck);
			if ($result) 
			{
				if (mysqli_num_rows($result) > 0) 
				{
							$_SESSION['userLogin'] = $username;
							echo' <script> 
					var username = document.getElementById("username").value;
					var password  = document.getElementById("password").value;
					
					
					window.location = "http://localhost/RMPphp/personalProfile.php" + username + password; </script>';
						}else {
				echo '<p style = "color: red;"> <i>INCORRECT PASSWORD OR USERNAME</i> </p> ';
			}
			} else {
				echo 'Error: ';
			}
		}
		
		echo '
		<div class = "float_child">
		
		<img src = "https://fontmeme.com/permalink/211128/f99c9951e8aa930262c527b77a9bd333.png">
		<a href = "http://localhost/RMPphp/registrationPage.php"><label id = "registerBox" class = "labels"> Dont have an account? Register! </label></a>
		</div>
		</div>
	</body>
	
</html>
';

?>