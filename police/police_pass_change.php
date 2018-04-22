<?php include 'code/session.php';
 $id =  $_SESSION['p_id'];
 $tname=$_SESSION['name'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="../user/files/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="../user/files/css/style.css" rel="stylesheet" id="bootstrap-css">
		<script src="../user/files/js/jquery-1.11.1.min.js"></script>
		<script src="../user/files/js/bootstrap.min.js"></script>	
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="../user/files/css/style.css" rel="stylesheet" type="text/css">
		<link href="../user/files/css/reg.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		

		<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="police_pro.php">HMS</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav pull-right" >
					<li><a href="" style="color: blue;"><?php echo $tname; ?></a></li>
					<li><a href="police_pass_change.php">Change Password</a></li>
					<li><a href="logout.php">Logout</a></li>

				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>



		<div class="row container">
			<div class="container">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="panel panel-primary container-fluid" style="margin-top: 150px">
						<div class="panel-heading">
							Change Password
						</div>
						<div class="panel-body">
							<form method="POST" action="">
								<input type="Password" name="current_pass" placeholder="Old Password" class="form-control"><br>
								<input type="Password" name="new_pass" placeholder="New Password" class="form-control"><br>
								<input type="Password" name="re_type_pass" placeholder="Re-Type new Password" class="form-control"><br>
								<button type="submit" name="submit" class="btn btn-primary pull-right">Update</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
<?php
	if(isset($_POST['submit'])){
		
		$Entered_old_pass = $_POST['current_pass'];
		$new_pass = $_POST['new_pass'];
		$re_type_pass = $_POST['re_type_pass'];
		$old_pass = "";
		$que1 = "SELECT p_password FROM ps_with_dis WHERE id = '$id' LIMIT 1";
		$res1 = mysqli_query($con,$que1);

		while($row = mysqli_fetch_array($res1)){
			$old_pass = $row['p_password'];
		}

		if(!empty($Entered_old_pass) && !empty($new_pass) && !empty($re_type_pass)){
			if($Entered_old_pass == $old_pass){

				if($new_pass == $re_type_pass){
					$que = "UPDATE ps_with_dis SET p_password = '$new_pass' WHERE id = '$id'";
					$res = mysqli_query($con,$que);

					if($res){
					echo "<script> alert('Successfully Updated') </script>";
					echo "<script> window.open('police_pass_change.php','_self') </script>";					
					}
				}
				else{
					echo "<script> alert('New Password and Re-Type Password Did Not Match !') </script>";
					echo "<script> window.open('police_pass_change.php','_self') </script>";	
				}
			}
			else{
				echo "<script> alert('Old Password Did Not Match !') </script>";
				echo "<script> window.open('police_pass_change.php','_self') </script>";
			}
		}
		else{
			echo "<script> alert('Field Must Not Be Empty!') </script>";
			echo "<script> window.open('police_pass_change.php','_self') </script>";			
		}
	} 
?>		
	</body>	
