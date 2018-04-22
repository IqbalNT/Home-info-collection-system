<?php include 'code/session.php';
$id=$_SESSION['auto_id'];
?>
<!DOCTYPE html>
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="files/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="files/css/style.css" rel="stylesheet" id="bootstrap-css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="files/datatable/data_table.css">
		<link href="files/css/style.css" rel="stylesheet" type="text/css">
		<link href="files/css/reg.css" rel="stylesheet" type="text/css">

		<script src="files/js/jquery-1.11.1.min.js"></script>
		<script src="files/js/bootstrap.min.js"></script>
		<script type="text/javascript" charset="utf8" src="../user/files/datatable/jsDatatable.js"></script>	
</head>
<body>
	<?php include 'include/navbar.php'; ?>	
	<?php
	$sql="SELECT * FROM  renter_table where owner_id= '$id' AND status = 1";
	$query=mysqli_query($con,$sql);

	?>
	<!-- One "tab" for each step in the form: -->
	<div class="container">	
		Renter List:
		<div class="row">
			<div class="container">
				<table class="table table-responsive table-hover display" id="table_id">
					<thead>
							<th>Serial No</th>
							<th>Name </th>
							<th>Phone No</th>
							<th>Flat No</th>
							<th>Block</th>
							<th style="text-align:center">Action</th>
					</thead>
					<tbody>
						<?php
						$i=0;
						while($row=mysqli_fetch_assoc($query)){?>
						<tr>
							<th><?php echo ++$i;?></th>
							<td><?php echo $row['owName'];?></td>
							<td><?php echo $row['cell'];?></td>
							<td><?php echo $row['floorNum'];?></td>
							<td><?php echo $row['block'];?></td>
							<td>
								<a class="btn btn-success" href="renter_bills.php?r_name=<?php echo $row['owName']; ?>&r_id=<?php echo $row['renter_id']; ?>&r_floor=<?php echo $row['floorNum']; ?>&r_block=<?php echo $row['block']; ?>">Renter Bills</a>
								<a class="btn btn-success" href="receive_due.php?r_id=<?php echo $row['renter_id'];?>&& r_name=<?php echo $row['owName'];?>">Pay Dues</a>
								<a class="btn btn-default" href="view_renter_details.php?r_id=<?php echo $row['renter_id'] ?>">View</a> 
								<a class="btn btn-info" href="view_renter_edit.php?r_id=<?php echo $row['renter_id'] ?>" >Edit</a>
								<a class="btn btn-warning" href="view_renter.php?action=leave&leave_id=<?php echo $row['renter_id'] ?>">Leave Renter</a> 								
								<a onclick ="return confirm('Are you Want to Delete??!');" class="btn btn-danger" href="view_renter.php?r_id=<?php echo $row['renter_id'] ?>">Delete</a></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
			</div>
				
		</div>
	</div>
		
		<?php 

		if(isset($_GET['r_id'])){
			$id = $_GET['r_id'];
			$res=mysqli_query($con,"SELECT personalIMG FROM  renter_table where renter_id = '$id'");
			$row=mysqli_fetch_array($res);
			//echo $row['personalIMG'];

			$res1=mysqli_query($con,"SELECT personalNID FROM  renter_table where renter_id = '$id'");
			$row1=mysqli_fetch_array($res1);

			$res3=mysqli_query($con,"SELECT * FROM  renter_family_table where renter_id = '$id'");
				while($row3=mysqli_fetch_assoc($res3)){
					unlink("code/uploads_family_img/".$row3['rlnipimg']);
				}

			$q = mysqli_query($con,"DELETE FROM renter_table WHERE renter_id = '$id'");
			$r = mysqli_query($con,"DELETE FROM renter_family_table WHERE renter_id = '$id'");
			
			if($q==1 && $r==1){

				echo "<script>alert</script>";
				unlink("code/uploads_personal_img/".$row['personalIMG']);
				unlink("code/uploads_personal_nid/".$row1['personalNID']);

				echo "<script> alert(' Successfully Deleted Renter  !!') </script>";
				echo "<script> window.open('view_renter.php','_self'); </script>";
			}
			
			
			else{
				echo "<script> alert(' Failed, try again !!') </script>";
			}	
		}
		?>
		<?php
			if(isset($_GET['action'])== 'leave'){
				$status = 0;
				$renter_id = $_GET['leave_id'];
				$date = date('y-m-d');
				$query = "UPDATE renter_table SET status = '$status', leave_date = '$date' WHERE renter_id = '$renter_id'";
				$res = mysqli_query($con,$query);
				if($res){
					echo "<script> alert(' Successfully Left Renter  !!') </script>";
					echo "<script> window.open('view_renter.php','_self'); </script>";					
				}
			}
		?>

		<script>
			$(document).ready( function () {
				$('#table_id').DataTable();
			} );
		</script>	
	</body>
	</html>