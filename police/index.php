<?php 
session_start();
if(isset($_SESSION['p_id'])){
	header("location:police_pro.php");

} 

?>


<!DOCTYPE html> 
<html>
	<head>
		<link href="../user/files/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="../user/files/css/style.css" rel="stylesheet" id="bootstrap-css">
		<script src="../user/files/js/jquery-1.11.1.min.js"></script>		
		<script src="../user/files/js/bootstrap.min.js"></script>
		<!------ Include the above in your HEAD tag ---------->	
		
		<title>Home Management System</title>
	</head>
	
	<body>
		<div class="container">
			<div class="row" style="margin-top:100px">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<form method="POST" action="code/login_code.php">
						<div class="alert alert-success" role="alert">
						  	Police Login
						</div>						
						<select class="form-control" name="psName">
							<option>---- SELECT POLICE STATION -----</option>
							<?php 
								Include '../user/connect.php';
								$query = "SELECT * FROM ps_with_dis WHERE disName='Dhaka'";
								$res = mysqli_query($con,$query);
								while($row = mysqli_fetch_array($res)){
							 ?>
							<option value="<?php echo $row['psName'];?>"><?php echo $row['psName'];?></option>
							<?php } ?>
						</select>
						<br>
						<input type="password" name="pspass" class="form-control" placeholder="password">
						<br>
						<input type="submit" name="login" value="Login" class="btn btn-primary pull-right">
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>	
	</body>
</html>	