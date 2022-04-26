<?php
session_start();

$user = 'root';
$pass ='';
$db = 'rate_my_pizza';
global $conn;
$conn = new mysqli('localhost', $user, $pass, $db) or die('unable to coonnect');
$chosenUser = $_SESSION['userLogin'];

$sqlFeed = "SELECT * FROM `post` WHERE `post`.`username` = (SELECT `followed` FROM `followtable` WHERE `user` = '".$chosenUser."');";
$data = $conn -> query($sqlFeed);
echo $sqlFeed;

echo'
   <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<style>
		
		
		
		table
		{
			font-color: black;
			border: 3px solid black;
		}
		
		th{
			border: 3px solid black;
		}
		.caption
		{
			font-color: solid black;
		}
		* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
header {
  background-color: black;
  width: 100%;
  padding: 20px;
  text-align: center;
  color: white;
  position: fixed;
  top: 0;
  height:80px;
}

.flex-container {
  display: flex;
  flex: 1 1 0;
  text-align: center;
  height: 1000px;
  top:80px;
}

.flex-container h2 {
  margin-top: 30px;
  font-size: 2rem;
}

.main-section {
  background-color: rgb(255, 222, 144);
  width: calc(100% / 2);
  position:absolute;
  bottom:0;
  right:calc(100% / 2);
  left:calc(100% / 4);
  top: 0px;
  height: inherit;
  z-index: -1;
  top:80px;
}


.secondary-section {
  width: calc(100% / 4);
  height: 100vh;
  position: fixed;
  top:80px;
}
.secondary-section.right{
  right:0;
}

.column {
  padding: 5px;
}

#profileFromFeed
{
height: 50px;
width: 50px;
float: left;

}

#addPost{
height: 50px;
margin-left: 10%;
width: 50px;
margin-top:-3%;
}

#logOutFromFeed
{
height: 50px;
margin-left:90%;
margin-top: -3%;
width: 50px;

}

.row::after {
  content: "";
  clear: both;
  display: table;
}
		</style>
        <title>Feed</title>
      </head>
      <body>
      
    <header>
      <h1><p id = "usernameFeed"> username </p></h1>
	  <div class = "row">
			<div class = "column" id = "profileFromFeed">
				<img src="C:\xampp\htdocs\RMP\profileFromFeed.png" alt="Profile" style="width:100%">
			</div>
			
			<div class = "column" id = "addPost">
				<img src="C:\xampp\htdocs\RMP\addPost.png" alt="Add Post" style="width:100%">
			</div>
			
			<div class = "column" id = "logOutFromFeed">
				<a href<img src="C:\xampp\htdocs\RMP\logOutFromFeed.png" alt="Log Out" style="width:100%">
			</div>
		
	  </div>
	  ';
	  echo'
	';	
	
	  
	  
	  echo'
    </header>
    <div class="flex-container">
      <section class="secondary-section">
        <h2>Rate my pizza</h2>
		';
		echo'
      </section>
      <section class="main-section">
	  <table>';
	  $numberOfRows = mysqli_num_rows($data);
	  echo $numberOfRows;
	for($i = 0; $i < $numberOfRows; $i++)
	{
		while($row = $data->fetch_assoc()) 
		{
			
			echo '<th>';
			echo '<tr> <img class = "picturePost" src = "'.$row['photo'].'" /></tr> <br>';
			echo '<tr class = "caption"> <i> Caption: </i>'.$row['caption'].'</tr> <br>';
			echo '<tr class = "location"> <i> Location: </i>'.$row['Location'].'</tr> <br>';
			echo '<tr class = "date"> <i> date: </i>'.$row['date'].'</tr><br>';
			echo '</th>';
		}
	}
	
	echo'
	</table>
	  
	   </section>
      <section class="secondary-section right">
        <h2>Rate my pizza</h2>
      </section>
    </div>
  </body>
</html>';


?>