
<?php include 'code/session.php';
$id=$_SESSION['auto_id'];
?>

<?php 
date_default_timezone_set('asia/dhaka');
$date = date('Y:m:d:h:i:sa');
	if(isset($_GET['r_id']) && isset($_GET['r_name']) ){
		$renter_id = $_GET['r_id'];
		$c_name = $_GET['r_name'];
		
	}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="files/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="files/css/style.css" rel="stylesheet" id="bootstrap-css">
		<script src="files/js/jquery-1.11.1.min.js"></script>
		
		<script src="files/js/bootstrap.min.js"></script>	
		<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>	-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script>	
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="files/css/style.css" rel="stylesheet" type="text/css">
		<link href="files/css/reg.css" rel="stylesheet" type="text/css">

	</head>
	<body> 
		<?php include 'include/navbar.php'; ?>
		<div class="container">
			<div class="row">
				<div class="panel-primary">
					<div class="panel-heading">
						<h4> <?php echo "Mr.".$c_name."'s"." Dues" ?></h4>
					</div>
					<div class="panel-body">
						<table class="table table-hover table-responsive">
							<thead>
							  <tr>
								<th>SL No.</th>
								<th>Month</th>
								<th>Year</th>
								<th>Total</th>
								<th>Paied</th>
								<th>Due</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody>
								<?php 
									$c = 0;
									$que = "SELECT 	month,year,total,pay,due,voucher_id FROM all_rents WHERE renter_id = '$renter_id' AND owner_id='$id' AND due > 0";
									$res = mysqli_query($con,$que);
									while($row = mysqli_fetch_array($res)){
									?>
									<form action="" method="POST">
										<tr>
											<td><?php echo ++$c;?></td>
											<td><?php echo $row['month'];?></td>
											<td><?php echo $row['year'];?></td>
											<td>&#2547;&nbsp;<?php echo $row['total'];?></td>
											<td>&#2547;&nbsp;<?php echo $row['pay'];?></td>
											<input type="hidden" name="tot" value="<?php echo $row['total'];?>">
											<input type="hidden" name="pay" value="<?php echo $row['pay'];?>">
											<input type="hidden" name="vid" value="<?php echo $row['voucher_id'];?>">
											<input type="hidden" name="currentDue" value="<?php echo $row['due'];?>">
											<input type="hidden" name="year" value="<?php echo $row['year'];?>">
											<input type="hidden" name="month" value="<?php echo $row['month'];?>">
											<td><input placeholder="&#2547;&nbsp;<?php echo $row['due'];?>" name="due" class="form-control text-right"></td>
											<td><button class="btn btn-primary" type="submit" name="submit">Pay</button></td>
										</tr>
									</form>
									<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- due Modal -->
<?php
	if(isset($_POST['submit'])){
		
		if(!empty($_POST['tot']) && !empty($_POST['vid']) && !empty($_POST['currentDue']) && !empty($_POST['due']) && !empty($_POST['pay']))
		{	
			$total = $_POST['tot'];
			$voucher_id = $_POST['vid'];
			$currentDue = $_POST['currentDue'];
			$due = $_POST['due'];
			$pay = $_POST['pay'] ;
			$month = $_POST['month'] ;
			$year = $_POST['year'] ;
			
			
			if($currentDue < $due){
				echo "<script> alert('Please Insert Correct Number ! ') </script>";				
			}else{
				$currentDue = $currentDue - $due;
				$pay = $pay + $due;
				
				$query = "UPDATE all_rents SET pay='$pay',due='$currentDue' WHERE voucher_id = '$voucher_id'";
				$res = mysqli_query($con,$query);
				
				$que = "INSERT INTO due_pay(paied_due,month,year,vid,renter_id,date) VALUES('$due','$month','$year','$voucher_id','$renter_id','$date')";
				
				
				if($res){
					$res1 = mysqli_query($con,$que);
					if($res1){
						echo "<script> alert('Successsfully Paid') </script>";
						echo "<script> window.open('due_voucher_list.php','_self'); </script>";
					}else{
						echo "<script> alert('Not Completed, Please Try Again !') </script>";
						echo "<script> window.open('view_renter.php','_self'); </script>";						
					}	
				}else{
					echo "<script> alert('Not Completed, Please Try Again !') </script>";
					echo "<script> window.open('view_renter.php','_self'); </script>";				
				}
			}
		}else{
				echo "<script> alert('Please Fill Up') </script>";
				echo "<script> window.open('view_renter.php','_self'); </script>";			
		}	
	}	
?>
		<!-- due Modal -->
	</body>
</html>	