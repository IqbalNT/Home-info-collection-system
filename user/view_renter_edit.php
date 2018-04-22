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
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="files/css/style.css" rel="stylesheet" type="text/css">
		<link href="files/css/reg.css" rel="stylesheet" type="text/css">
	
	</head>
	<body>
<?php include 'include/navbar.php'; ?>	
<?php
	if(isset($_GET['r_id']))  {
        $r_id = $_GET['r_id'];
		$sql="SELECT * FROM  renter_table where renter_id='$r_id'";
		$query=mysqli_query($con,$sql);

		?>
		 <div class="container">
		  Renter List:
			<div class="row">
				<div class="col-md-12">
				<table class="table">
				<thead>
						<tr>
							<th>Name </th>
							<th>Father Name </th>
							<th>Mother Name </th>
							<th>Occupation </th>
							<th>Qualification </th>
							<th>Marital Status </th>
							<th>Nid</th>
							<th>Phone No</th>
							<th>Flat No</th>
							<th>Block</th>
							<th>Entry Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
					while($row=mysqli_fetch_assoc($query)){?>
						<tr>
							<td><?php echo $row['owName'];?></td>
							<td><?php echo $row['fatName'];?></td>
							<td><?php echo $row['motName'];?></td>
							<td><?php echo $row['occupation'];?></td>
							<td><?php echo $row['qualification'];?></td>
							<td><?php echo $row['marital_status'];?></td>
							<td><?php echo $row['nid'];?></td>
							<td><?php echo $row['cell'];?></td>
							<td><?php echo $row['floorNum'];?></td>
							<td><?php echo $row['block'];?></td>
							<td><?php echo $row['reg_date'];?></td>
						</tr>
	<?php }?>
				</tbody>
				</table>
				<h5> Family Members</h5>
				<table class="table">
				<thead>
						<tr>
							<th>Name </th>
							<th>Relation</th>
							<th>NID No</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$sql="SELECT * FROM   renter_family_table where renter_id='$r_id'";
					$query=mysqli_query($con,$sql);
					while($row=mysqli_fetch_assoc($query)){?>
						<tr>
							<td><?php echo $row['fmlyname'];?></td>
							<td><?php echo $row['relation'];?></td>
							<td><?php echo $row['relnid'];?></td>
						</tr>
	<?php }}?>
				</tbody>
				</table>
				<a href="view_renter.php" class="btn btn-primary">Back</a>
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $row['r_id']; ?>">Edit</button>
				
				</div>
			
			</div>
			</div>
<!-- Modal -->
<div id="edit<?php echo $row['r_id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Renter Details</h4>
      </div>
      <div class="modal-body">
       <div class="row">
			<div class="col-md-6">
			<form method="post" action="" enctype="multipart/form-data" role="form">
			<?php
				$sql="SELECT * FROM  renter_table where renter_id='$r_id'";
				$query=mysqli_query($con,$sql);
				while($row=mysqli_fetch_assoc($query)){?>
					<p>Name<input value="<?php echo $row['owName']; ?>"  name="owName"></p>
					<p>Floor<input value="<?php echo $row['floorNum']; ?>"  name="floor"></p>
					<p>Block<input value="<?php echo $row['block']; ?>"  name="block"></p>
					<p>
						<select name="marital_status"  class="form-control" required>
							<option>----Select Your Marital Status----</option>
							<option <?php if($row['marital_status']=='Married') echo 'selected';?> value="Married">Married</option>
							<option <?php if($row['marital_status']=='Unmarried') echo 'selected';?> value="Unmarried">Unmarried</option>
							<option <?php if($row['marital_status']=='Divorced') echo 'selected';?> value="Divorced">Divorced</option>
						</select>
					</p>
			</div>
			<div class="col-md-6">
					<p>Phone No:<input value="<?php echo $row['cell']; ?>"  name="cell"></p>
					<p>Emergency Contact Name<input value="<?php echo $row['emergenceName']; ?>"  name="eName"></p>
					<p>Emergency Contact No<input value="<?php echo $row['emergenceNumber']; ?>" name="econtact"></p>		
			</div>
				<?php }?>
	   </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" name="edit" class="btn btn-success" >Submit</button>
      </div> 
	  </form>
    </div>

  </div>
</div>


 <?php
if (isset($_POST['edit'])){

$owName=$_POST['owName'];
$floor=$_POST['floor'];
$block=$_POST['block'];
$marital_status=$_POST['marital_status'];
$cell=$_POST['cell'];
$eName=$_POST['eName'];
$econtact=$_POST['econtact'];
//$pword=$_POST['pword'];
	
 $ins = mysqli_query($con,"UPDATE  renter_table SET owName = '$owName', floorNum = '$floor', block = '$block', marital_status='$marital_status',cell='$cell',emergenceName='$eName',emergenceNumber='$econtact' WHERE renter_id='$r_id' ");

   if($ins==1){

		echo "<script> alert(' Successfully Updated Iformation!!') </script>";
	   $link="view_renter_edit.php?r_id=$r_id";
		echo "<script> window.open('$link','_self'); </script>";
} }   ?>
		  
	</body>
</html>