<?php 
 $total=0; ?>

 <?php 
error_reporting(0);
//Setting session start
 include 'code/session.php';
 $id=$_SESSION['auto_id'];
 ?>


<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="files/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link rel="stylesheet" type="text/css" href="files/datatable/data_table.css">
		<link href="files/css/style.css" rel="stylesheet" id="bootstrap-css">
		<script src="files/js/jquery-1.11.1.min.js"></script>
		
		<script src="files/js/bootstrap.min.js"></script>	
		<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>	-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script>	
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="files/css/style.css" rel="stylesheet" type="text/css">
		<link href="files/css/reg.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" charset="utf8" src="../user/files/datatable/jsDatatable.js"></script>

	</head>
	<body> 
		<?php include 'include/navbar.php'; ?>
		<div class="container-fluid" style="margin-top:100px">
			<div class="row container-fluid">
				<div class="row">
					<!-- Medicine Shortage -->
					<div class="col-md-3" ></div>
					<div class="col-md-6">
					
						<div class="panel panel-primary">
						
							<div class="container-fluid  heading_background_purple">
								<div class="col-md-5 col-md-offset-5">
								  <div class="navbar-header"> <a class="navbar-brand " style="color:white;" href="#" >Voucher List</a> </div>
								 </div>
							</div>
							
						
					
							<div class="panel-body">
								<table id="table_id" class="display table table-responsive table-border table-responsive table-striped" >
									<thead  class="thead_bg_green">
									  <tr>
										<th>SL.</th>
										<th>Name</th>
										<th>Voucher No</th>
										<th>Issue Date</th>
										<th>Action</th>
									  </tr>
									</thead>
									<tbody class="tbody_color_voucher" >
										<?php
											$i = 0;
											$que = "SELECT * FROM due_pay JOIN renter_table on renter_table.renter_id = due_pay.renter_id WHERE renter_table.owner_id = '$id' group by vid ORDER BY date DESC";
											$res = mysqli_query($con,$que);
											
											if($res){
												while($row = mysqli_fetch_array($res)){
													$voucher_id = $row['vid'];
													$issue_date = date_create($row['date']);
													$renter_id 	= $row['renter_id'];
													$name		= $row['owName'];
													$cell		= $row['cell'];
													$month		= $row['month'];
													$year		= $row['year'];

														
										?>
									  <tr>
										<td><?php echo ++$i; ?></td>
										<td><?php echo $name; ?></td>
										<td><?php echo $voucher_id; ?></td>
										<td><?php echo date_format($issue_date,'d-M-y'); ?></td>
										<td><a class="btn btn-success button_darkblue" href="due_voucher.php?voucherID=<?php echo $voucher_id; ?>&name=<?php echo $name;?>&cell=<?php echo $cell;?>&name=<?php echo $name;?>&oid=<?php echo $id;?>&month=<?php echo $month;?>&year=<?php echo $year;?>" target="_blank"> View </a></td>
									  </tr>
									   
											<?php }}?>						  
									</tbody>					
								</table>
									<script>
										$(document).ready( function () {
											$('#table_id').DataTable();
										} );
									</script>
								</div>
						 </div>
					</div>
					<div class="col-md-3" ></div>
				</div>
			</div>
		</div>
	</body>
</html>