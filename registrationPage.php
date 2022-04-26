<?php
session_start();
$user = 'root';
$pass ='';
$Section_Chosen = 0;
$db = 'rate_my_pizza';
$conn = new mysqli('localhost', $user, $pass, $db) or die('unable to coonnect');



echo'
<html>
	<head>
		<title> Registration </title>
		<style>
		body
		{
			background-color: #fed8b1;
		}
		
		#rSubmitButton
		{
			width: 200px;
			height: 50px;
		}
		
		
		#all
		{
			border: 1px solid black;
			background: white;
			width: 30%;
			box-shadow: 5px 10px #888888;
		}
		
		
		#rSubmitButton
		{
			background:url(http://localhost/RMPphp/registerButton.png) no-repeat;
			cursor:pointer;
			width: 350;
			height: 100;
			border: none;
		}
		</style>
		
	</head>
	
	
	
	<body>
	<header>
		<img src = "http://localhost/RMPphp/RMPLogo.png" id = "logo">
		</header>
		<div id = "all">
		<form method = "post"  id = "methodForm">
		<img src = "https://fontmeme.com/permalink/211128/a7732c3e95463b6a4ef93226d9978149.png"><input type="text" class ="username" name="rname"> <br>
		<ul>
			<li>  <img src = "https://fontmeme.com/permalink/211128/c8c9cb36e1c6a36d5b6f0405868e4b69.png">
			<li> <img src = "https://fontmeme.com/permalink/211128/2166f2bcd83d9592f7e0610b7a7da6c5.png">
			<li> <img src = "https://fontmeme.com/permalink/211128/d8c89dd49d9c09388f05da9d1222e1c4.png">
		</ul>
		
		<img src = "https://fontmeme.com/permalink/211128/325c9fd38e7a544a4df22d7cedcd1ebc.png"><br>
		<input type = "password" class  = "password" name = "rpassword"/> <br>
		<img src = "https://fontmeme.com/permalink/211128/b5c4404f7baf5ec2ccc4983dbc0a63ea.png"><br>
		<input type = "password" class  = "password" name = "rcpassword"/> <br>
		<img src = "https://fontmeme.com/permalink/211128/853d99e80f8143f6c2d088f2a7a860ef.png"><br>
		<input type = "text" class  = "emails" name = "remail"/> <br>
		<img src = "https://fontmeme.com/permalink/211128/e3ab4c18c7a1348917d76641971976d3.png"><br>
		<input type = "text" class  = "emails" name = "rcemail"/> <br>
		<img src = "https://fontmeme.com/permalink/211128/293f7418551d89bd489b6c44e6e573e5.png"><br>
		<input type="file" class ="profileImage" name="rImage" accept="image/png, image/jpeg"><br>
		<a href = "http://localhost/RMPphp/personalProfile.php"> <input type="submit" id = "rSubmitButton" value="" name = "submit"></a>

		
		</form>
		';
		if(isset($_POST['submit'])) 
		{
			$username = $_POST['rname'];
			$password = $_POST['rpassword'];
			$confirmed_password = $_POST['rcpassword'];
			$email = $_POST['remail'];
			$confirmed_email = $_POST['rcemail'];
			$profileImage = $_POST['rImage'];
			$correctPasswords = false;
			if($confirmed_password != $password or $confirmed_email!= $email or $username == "" or $password == "" or  $confirmed_password == "" or $email == "" or $confirmed_email  == "" or $profileImage == "" )
				
			{
				echo '<h3> FILL ALL FIELDS CORRECTLY</h3>';
			} else if (strlen($password) < 8 or (!preg_match('/[A-Z]/', $password)) or (!preg_match('/[1-10]/', $password)))
			{
				echo '<h3> FILL ALL FIELDS CORRECTLY</h3>';
			}
			else
			{
				
				
			
			$_SESSION['userLogin'] = $username;
			$sqlInsert = "INSERT INTO `user`(`username`, `password`,  `email`,  `photo`) VALUES ('".$username."', '".$password."', '".$email."', '".$profileImage."');";
			$conn -> query($sqlInsert);
			header("http://localhost/RMPphp/personalProfile.php");
			echo '<script> window.location("http://localhost/RMPphp/personalProfile.php"); </script>';
			}
		}
		
		echo'
		</div>
	</body>

</html>
';