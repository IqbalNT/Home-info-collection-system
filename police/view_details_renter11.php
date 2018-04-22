<?php include 'code/session.php';
$tname=$_SESSION['name'];
?>
<!DOCTYPE html> 
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../user/files/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="../user/files/css/style.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="../user/files/datatable/data_table.css">
	<script src="../user/files/js/jquery-1.11.1.min.js"></script>		
	<script src="../user/files/js/bootstrap.min.js"></script>
	<script type="text/javascript" charset="utf8" src="../user/files/datatable/jsDatatable.js"></script>
	<!------ Include the above in your HEAD tag ---------->	

	<title>Home Management System</title>
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
				<a class="navbar-brand" href="">HMS</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav pull-right" >
					<li><a href="" style="color: blue;"><?php echo $tname; ?></a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>	

	<?php
	if(isset($_GET['r_id']))  {
		$r_id = $_GET['r_id'];
		//echo "$r_id"."<br>";
		$o_id = $_GET['o_id'];
		//echo "$o_id";

		 ?>


		<div class="container">
			<h4>Renter Details</h4>
			<div class="row">
				<div class="col-md-12">
					<table class="table display device-width">
						<thead>
							<tr>
								<th>Name</th>
								<th>Occupation</th>
								<th>Flat No</th>
								<th>Block</th>
								<th>Contact</th>
								<th>NID NO</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql="SELECT * FROM renter_table where renter_id='$r_id' and owner_id='$o_id'";
							$res=mysqli_query($con,$sql);
							while ($row=mysqli_fetch_assoc($res)) {?>
							<tr>
								<td><?php echo $row['owName'];?></td>
								<td><?php echo $row['occupation'];?></td>
								<td><?php echo $row['floorNum'];?></td>
								<td><?php echo $row['block'];?></td>
								<td><?php echo $row['cell'];?></td>
								<td><?php echo $row['nid'];?></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php }?>
	</body>
	</html>