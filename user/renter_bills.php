<?php include 'code/session.php';
$id=$_SESSION['auto_id'];
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
	<body ng-app>
		<?php include 'include/navbar.php'; ?>
		<div class="wrapper">
			<div class="row container">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<?php 
						if(isset($_GET['r_id']) && isset($_GET['r_name']) && isset($_GET['r_floor']) && isset($_GET['r_block'])){
						$renter_id = $_GET['r_id'];
						$r_name=$_GET['r_name'];
						$que = "SELECT housenumber,roadnumber,policestation,area FROM owner_table WHERE auto_id='$id'";
						$res = mysqli_query($con,$que);
						while($row1 = mysqli_fetch_array($res)){
							$housenumber = $row1['housenumber'];
							$roadnumber = $row1['roadnumber'];
							$policestation = $row1['policestation'];
							$area = $row1['area'];
						}
						
					?>
					
					<h3>Home Management System</h3>
					<form id="cal" class="form-horizontal" action="" method="POST" >
						<label>House No:</label><?php echo $housenumber; ?>,
						<label>Road No:</label><?php echo $roadnumber; ?>,<?php echo $area; ?>
						<label>Name : </label><?php echo $_GET['r_name']; ?>
						<label>Floor No : </label><?php echo $_GET['r_floor']; ?>
						<label>Block No : </label><?php echo $_GET['r_block']; ?>
						<label>Month : </label><select name="month">
												<option value="January">January</option>
												<option value="February">February</option>
												<option value="March">March</option>
												<option value="March">April</option>
												<option value="May">May</option>
												<option value="June">June</option>
												<option value="July">July</option>
												<option value="August">August</option>
												<option value="September">September</option>
												<option value="October">October</option>
												<option value="November">November</option>
												<option value="December">December</option>
											</select>
						<label>Year : </label><select name="year">
												<?php $d = idate("Y"); 
													for($i=$d;$i >= $d-8;$i--){
												?>
														<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php }?>
										   </select>
						<?php				
							}else{
								header('LOCATION:view_renter.php');
							}					
						?>
					
					
						<div class="form-group">
							<label>House Rent</label><input type="text" class="amount form-control text-right" name="house_Rent" placeholder="House Rent">
						</div>
						<div class="form-group">					
							<label>Gas Bill</label><input type="text" class="amount form-control text-right"  name="gas" placeholder="Gas Bill">
						</div>
						<div class="form-group">
							<label>Current Bill</label><input type="text" class="amount form-control text-right" name="current" placeholder="Current Bill ">
						</div>
						<div class="form-group">
							<label>Water Bill</label><input type="text" class="amount form-control text-right" name="water" placeholder="Water Bill">
						</div>
						<div class="form-group">	
							<label>Dust Bill</label><input type="text" class="amount form-control text-right" name="dust" placeholder="Dust Bill">
						</div>
						<div class="form-group">	
							<label>Others Bill</label><input type="text" class="amount form-control text-right" name="others" placeholder="Others Bill">
						</div>
						<div class="form-group a">	
							<label>Due</label><input type="text" class="due form-control text-right" name="due" placeholder="Due">
						</div>						
						<div class="form-group">	
							<label>Total</label>&nbsp; &#2547; &nbsp;<output id="tot"></output>
						</div>	
						<button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
				    </form>
					
				</div>	
				<div class="col-md-3"></div>	
			</div>
		</div>
<?php
	if(isset($_POST['submit'])){
		date_default_timezone_set('asia/dhaka');
		$month 		= $_POST['month'];
		$year  		= $_POST['year'];
		$house_Rent = $_POST['house_Rent'];
		$gas		= $_POST['gas'];
		$current 	= $_POST['current'];
		$water 		= $_POST['water'];
		$dust 		= $_POST['dust'];
		$due 		= $_POST['due'];
		$others 	= $_POST['others'];
		$total		= 0;
		$voucher_id = "vid".date('Ymdhms');
		$date = date('Y:m:d:h:i:sa');
		
		if($house_Rent == ''){
			$house_Rent = 0;
		}
		
		if($gas == ''){
			$gas = 0;
		}		
		
		if($current == ''){
			$current = 0;
		}

		if($water == ''){
			$water = 0;
		}

		if($dust == ''){
			$dust = 0;
		}

		if($due == ''){
			$due = 0;
		}
		
		if($others == ''){
			$others = 0;
		}		
		
		if($house_Rent == 0 && $gas == 0 && $current == 0 && $water == 0 && $dust == 0 && $due == 0 && $others == 0){
			echo "<script> alert('All Fields May Not Empty') </script>";
			echo "<script> window.open('view_renter.php','_self'); </script>";				
		}
		else{	
			$total = (float)$house_Rent + 	(float)$gas + (float)$current + (float)$water + (float)$dust + (float)$others;
			
			$pay =  $total - (float)$due;
			
			$query = "INSERT INTO all_rents(
						month,year,house,
						gas,water,current,
						dust,other,total,
						pay,due,renter_id,
						owner_id,voucher_id,date)
						
						VALUES(
						'$month','$year','$house_Rent',
						'$gas','$water','$current','$dust',
						'$others','$total','$pay','$due','$renter_id',
						'$id','$voucher_id','$date')";
			
			$res = mysqli_query($con,$query);
			if($res){
				echo "<script> alert(' Successfully Paied') </script>";
				echo "<script> window.open('voucher_list.php?r_id=$renter_id && name=$r_name','_self'); </script>";			
			}
		}	

	}
?>		
		
		<script src="files/js/jquery.min.js"></script>
		<script>
	$('.form-group').on('input','.amount',function(){
		var totalSum = 0;				
			
			$('.form-group .amount').each(function(){
				var inputVal = $(this).val();
				if($.isNumeric(inputVal)){
					totalSum+=parseFloat(inputVal);
				}
			});	
			
			$('#tot').text(totalSum);
			//document.getElementById('#tot').innerHTML = totalSum;
	});
		</script>
		
	</body>
</html>