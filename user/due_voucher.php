
 <?php 
error_reporting(0);
//Setting session start
 include 'code/session.php';?>
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
<?php
	
	
	 if(!isset($_GET['name']) && !isset($_GET['voucherID']) && !isset($_GET['cell']) && !isset($_GET['oid']) && !isset($_GET['month']) && !isset($_GET['year']) ){
		header("Location:voucher_list.php");
	}else{ 
	
	$voucherID = $_GET['voucherID'];
	$name = $_GET['name'];
	$cell = $_GET['cell'];
	$oid = $_GET['oid'];
	$month = $_GET['month'];
	$year = $_GET['year'];
	
	$que = "SELECT * FROM owner_table WHERE auto_id = '$oid'";
	$res = mysqli_query($con,$que);
	while($row = mysqli_fetch_assoc($res)){
		$housenumber = $row['housenumber'];
		$roadnumber = $row['roadnumber'];
		$area = $row['area'];
		$policestation = $row['policestation'];
	}
	}
	
 ?>		

<div class="container-fluid" style="margin-top:100px">
	<div class="row container-fluid">
		<div class="row" container-fluid>
			<div class="col-md-3"></div>
			<div class="col-md-6"  style="border-bottom:1px solid black; margin-bottom:10px">
				<h4 style="text-align:center"> Home Management System </h4>
				<p style="text-align:center"> <?php echo "Road No.".$roadnumber." House No.".$housenumber." ,".$area." ,".$policestation." - Dhaka"; ?> </p>
				<p style="text-align:center;"> Payment Voucher </p>
			</div>
			<div class="col-md-3"></div>
		</div>	
			
		<div class="row container-fluid">
			<div class="col-md-3"></div>
			<div class="col-md-6">

				<div class="" id="top1" style="display:none">
					
						<p  style="text-align:left; margin-left:20px">Name : <?php echo $name; ?></p>
						<p style="text-align:left; margin-left:20px">Date :  <?php echo date('d-M-Y');?></p>
						<p style="text-align:left; margin-left:20px">Rent Month :  <?php echo $month.", ".$year;?></p>
						<p style="text-align:left; margin-left:20px">Contact No : <?php echo $cell;?></p>
						<p style="text-align:left; margin-left:20px">Voucher :  <?php echo $voucherID; ?></p>
					
				</div>
			
				<div class="" id="top">
					<div class="col-md-4">
						<p  style="float:left">Name : <?php echo $name; ?>&nbsp;&nbsp;</p></br>
						<p style="float:left">Date :  <?php echo date('d-M-Y');?>&nbsp;&nbsp;</p>
						<p style="float:left">Rent Month :  <?php echo $month.", ".$year;?>&nbsp;&nbsp;</p>
					</div>
					<div class="col-md-2 hidden-sm"></div>
					<div class="col-md-6">
						<p style="float:right">Contact No : <?php echo $cell;?> &nbsp;&nbsp;</p>
						<p style="float:right">Voucher :  <?php echo $voucherID; ?> &nbsp;&nbsp;</p>
					</div>
				</div>	
			</div>
			<div class="col-md-3"></div>
		</div>
		<div class="row container-fluid">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				</br></br>
				<table class="table table-striped">
					<thead>
						<th>Paied Date</th>
						<th>Amount</th>
					</thead>
					<tbody>

<?php
	$i=0;
	$query1 = "SELECT * FROM due_pay WHERE vid = '$voucherID'";
	$res1 = mysqli_query($con,$query1);
	
	if($res1){		
		while($row1 = mysqli_fetch_array($res1)){
			$date = date_create($row1['date']);
			$paied_due = $row1['paied_due'];
?>

					<tr>
						<td><?php echo date_format($date,'d-M-y');?></td>
						<td><?php echo $paied_due;?></td>
					</tr>

				
	<?php }}?>
						</tbody>
				</table>
			<button id="abc" onclick="myFunction()" class="btn btn-primary pull-right" style="margin-bottom:5px;">Print this page</button>			
					

<script>
function myFunction() {
	var newURL = window.location.href;
    document.getElementById("abc").style.display="none";
    document.getElementById("top").style.display="none";
    document.getElementById("top1").style.display="inline";
	window.open('','_self');
	window.print();
}
</script>				
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</div>
</body>
</html>