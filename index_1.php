<?php
	session_start();

	 include("connection.php");
	 include("functions.php");

	 $user_data = check_login($con); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<style type="text/css">
		a {
			text-decoration: none;
		}
		button {
			float: right;
			height: 40px;
			width: 60px;
		}
	</style>
</head>
<body>
	<button><a href="logout.php">logout</a></button>
	<h1>Hello <?php echo $user_data['user_name']?>;</h1>
	<p>Here are users of this page</p>
	
	<?php
		$query = "select user_id,user_name from users";
		$result = mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0){
			while ($row = mysqli_fetch_assoc($result)) {
				echo "user_id:" .$row['user_id']. " user_name:" .$row['user_name']. "<br>";
			}
		}
		else{
			echo "no users";
		}
	?>
</body>
</html>