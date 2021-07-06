<?php 
	 session_start();

	 include("connection.php");
	 include("functions.php");

	 if ($_SERVER['REQUEST_METHOD'] == "POST") {
	 	$username = $_POST['user_name'];
	 	$password = $_POST['password'];

	 	if(!empty($username) && !empty($password)){

	 		$query = "select * from users where user_name = '$username'";

	 		$result = mysqli_query($con, $query);

	 		if ($result) {
	 			if($result && mysqli_num_rows($result)>0){
					$user_data = mysqli_fetch_assoc($result);
					if($user_data['password']==$password){
						$_SESSION['user_id'] = $user_data['user_id'];
						if ($username=="admin") {
							header("location: index.php");
						}
						else{
							header("location: index_1.php");
						}
					}
				}
	 		}
	 		echo "incorrect username or password";
	 	}
	 	else{
	 		echo "Enter valid information";
	 	}
	 }

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<style type="text/css">
		body {
			font-size: 125%;
		}
		.textInput {

                padding: 5px 5px 12px 5px;
                font-size: 25px;
                border-radius: 5px;
                border: 1px solid grey;
                width:200px;

                }
		label {
                
                position: relative;
                top:12px;
                width:100px;
                float: left;
            }
		#wrapper{
			width: 500px;
			margin: 0 auto;
		}
		#btn {
			margin-left: 100px;
			font-size: 25px;
		}
		a{
			text-decoration: none;
			margin-left: 80px;
		}
	</style>
</head>
<body>
	<div id="wrapper">
		<h1>Login</h1>
		<form method="post">
			<p>
				<label for="user_name">User Name</label>
				<input type="text" name="user_name" class="textInput">
			</p>
			<p>
				<label for="password">Password</label>
				<input type="password" name="password" class="textInput">
			</p>
			<input type="submit" value="login" id="btn">
			<a href="signup.php">Signup</a>
		</form>
	</div>
</body>
</html>