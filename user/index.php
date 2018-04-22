<?php 
session_start();
if(isset($_SESSION['id'])){
	header("location:owner_pro.php");

} 

?>

<!DOCTYPE> 
<html>
	<head>
		<link href="files/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="files/css/style.css" rel="stylesheet" id="bootstrap-css">
		<script src="files/js/jquery-1.11.1.min.js"></script>		
		<script src="files/js/bootstrap.min.js"></script>
		<!------ Include the above in your HEAD tag ---------->	

		<title>Home Management System</title>
	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-md-offset-4">
					<h1 class="text-center login-title">Home Management System</h1>
					<div class="account-wall">
						<img class="profile-img" src="files/img/login_logo.png" alt="">
						<form class="form-signin" action="code/login_code.php" method="POST" >
							<input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
							<input type="password" class="form-control" name="password" placeholder="Password" required>
							<button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
							<label class="checkbox pull-left">
								<input type="checkbox" value="remember-me">
								Remember me
							</label>
							<a href="owner_reg.php" class="text-center new-account">Create an account </a>
						</form>
					</div>
				</div>
			</div>			
		</div>	
	</body>
</html>	