<?php
include ('../constant/constant.php');
?>
<html>
<head>
<title>Login Lily's Cakes as Admin</title>
<link rel = "stylesheet" href = "../css/admin.css">
</head>

<body>
	<div class = "login">
		<h1 class = "text-center">Admin Login</h1>
		<br>
		<?php
		if(isset($_SESSION['login']))//if login failed
		{
			echo $_SESSION['login'];
			unset($_SESSION['login']);
		}
		?>
		<br>

		<!--login form-->
		<form action = "" method = "POST" class = "text-center">
			Username:
			<br>
			<input type = "text" name = "admin_username" placeholder = "Username">
			<br><br>

			Password: 
			<br>
			<input type = "password" name = "admin_password" placeholder = "Password">
			<br><br>

			<input type = "submit" name = "submit" value = "Log In" class = "btn-primary">

		</form>
		<br>
		<!--login form-->

		<p class = "text-center">&copy; Lily's Cakes Website</p>
	</body>
</div>
</html>

<?php
	if(isset($_POST['submit']))
	{
		//get data from form
		$admin_username = $_POST['admin_username'];
		$admin_password = md5($_POST['admin_password']);

		//query
		$query = "SELECT * FROM admin WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'";

		//execute
		$result = mysqli_query($connect, $query);

		$count = mysqli_num_rows($result);

		if($count>0)
		{
			//user exist
			$_SESSION['login'] = "<div class = 'success'>Welcome Back!</div>";

			//redirect to admin.php
			header('location:'.SITEURL.'admin/');

		}
		else
		{
			//user didn't exist
			$_SESSION['login'] = "<div class = 'error'>Failed to login. Please try again.</div>";

			//redirect to login.php
			header('location'.SITEURL.'admin/login.php');
		}
	}
?>