<?php 
include 'code/session.php';
$tname=$_SESSION['name'];
	//$i="IQBAL";

?>
<!DOCTYPE html> 
<html>
<head>
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
	<div class="container">
		<h4>Owner List</h4>
		<table id="short" class="table table-responsive table-hover display">
			<thead>
				<th>SL.</th>
				<th>Owner Name</th>
				<th>Police Station</th>
				<th>Road No.</th>
				<th>House No.</th>
				<th>Area</th>
				<th>Contact</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php 
				$sql="SELECT * FROM owner_table WHERE policestation='$tname'";
				$res=mysqli_query($con,$sql);
				$i=0;
				while ($row=mysqli_fetch_assoc($res)) {?>
				<tr>
					<td><?php echo ++$i; ?></td>
					<td><?php echo $row['owName'];?></td>
					<td><?php echo $row['policestation'];?></td>
					<td><?php echo $row['roadnumber'];?></td>
					<td><?php echo $row['housenumber'];?></td>
					<td><?php echo $row['area'];?></td>
					<td><?php echo $row['cell'];?></td>
					<td><a class="btn btn-info" href="view_details.php?r_id=<?php echo $row['auto_id'] ?>">View</a></td>
				</tr>
				<?php } ?>		
			</tbody>
		</table>
	</div>
	<script>
		$(document).ready( function () {
			$('#short').DataTable();
		} );
	</script>	    	
</body>
</html>	