<?php 

include("include/connection.php");

if (isset($_POST['login'])) {



	$email = $_POST['email'];
	$password = $_POST['password'];


	$error = array();

	$q = "SELECT * FROM user WHERE email='$email' AND password='$password'";
	$qq = mysqli_query($connect,$q);

	$row = mysqli_fetch_array($qq);

	
	if(count($error)==0) {
		$query = "SELECT * FROM user WHERE email='$email' AND password='$password'";

		$res = mysqli_query($connect,$query);

		if(mysqli_num_rows($res)) {
			echo "<script>alert('Login Successful')</script>";
			$_SESSION['user'] = $email;
			header("Location:.//user/index.php");
		} else {
			echo "<script>alert('Invalid Account')</script>";
		}
	}

}

if(isset($error['login'])) {
	$l = $error['login'];

	$show = "<h5 class='text-center alert alert-danger'>$l</h5>";
} else {
	$show = "";
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>User Login Page</title>
</head>
<body>

	<?php  
	include("include/header.php");
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 jumbotron my-3">
					<h5 class="text-center my-2">User Login</h5>
						<div>
							<?php echo $show; ?>
						</div>

					<form method="post">
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" autocomplete="off" placeholder="Enter Email">
						</div>

						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" autocomplete="off">
						</div>

						<input type="submit" name="login" class="btn btn-success" value="Login">

					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>

</body>
</html>