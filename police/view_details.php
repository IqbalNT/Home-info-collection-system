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


	<link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />
<style type="text/css">
    a.fancybox img {
        border: none;
        box-shadow: 0 1px 7px rgba(0,0,0,0.6);
        -o-transform: scale(1,1); -ms-transform: scale(1,1); -moz-transform: scale(1,1); -webkit-transform: scale(1,1); transform: scale(1,1); -o-transition: all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out; transition: all 0.2s ease-in-out;
    } 
    a.fancybox:hover img {
        position: relative; z-index: 999; -o-transform: scale(1.03,1.03); -ms-transform: scale(1.03,1.03); -moz-transform: scale(1.03,1.03); -webkit-transform: scale(1.03,1.03); transform: scale(1.03,1.03);
    }
</style>
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

	<?php
	if(isset($_GET['r_id']))  {
		$r_id = $_GET['r_id'];
		$sql="SELECT * FROM  owner_table where auto_id='$r_id'";
		$query=mysqli_query($con,$sql);

		?>


		
		<!-- One "tab" for each step in the form: -->
		<div class="container">
		<h4> Owner Details</h4>
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
								<th>Road No</th>
								<th>House No</th>
								<th>Entry Date</th>
								<th>Personal Image</th>
								<th>NID Image</th>
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
								<td><?php echo $row['roadnumber'];?></td>
								<td><?php echo $row['housenumber'];?></td>
								<td><?php echo $row['c_date'];?></td>
								<td><img class="fancybox"  src="../user/code/uploads_personal_img/<?php echo $row['personalIMG'];?>" width="50" height="50"></td>
								<td><img class="fancybox" src="../user/code/uploads_personal_nid/<?php echo $row['personalNID'];?>" width="50" height="50"></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					<h4>Owner Family Members</h4>
					<table class="table">
						<thead>
							<tr>
								<th colspan="6">Name </th>
								<th>Relation</th>
								<th>NID Image</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql="SELECT * FROM owners_family_table where o_id='$r_id'";
							$query=mysqli_query($con,$sql);
							while($row=mysqli_fetch_assoc($query)){?>
							<tr>
								<td colspan="6"><?php echo $row['fname'];?></td>
								
								<td><?php echo $row['frelation'];?></td>
								<td><img class="fancybox" src="../user/code/uploads_family_img_owner/<?php echo $row['owner_rlnipimg'];?>" width="50" height="50"></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<h3>Renter List</h3>
					<table class="table" id="short">
						<thead>
							<tr>
								<th>Serial  No</th>
								<th>Name</th>
								<th>Occupation</th>
								<th>Nid No</th>
								<th>Gender</th>
								<th>Floor No</th>
								<th>Block</th>
								<th>Contact No</th>
								<th>Entrance Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql="SELECT * FROM renter_table WHERE 	owner_id='$r_id'";
							$res=mysqli_query($con,$sql);
							$i=0;
							while ($row=mysqli_fetch_assoc($res)) {?>
							<tr>
								<th><?php echo ++$i;?></th>
								<td><?php echo $row['owName'];?></td>
								<td><?php echo $row['occupation'];?></td>
								<td><?php echo $row['nid'];?></td>
								<td><?php echo $row['gender'];?></td>
								<td><?php echo $row['floorNum'];?></td>
								<td><?php echo $row['block'];?></td>
								<td><?php echo $row['cell'];?></td>
								<td><?php echo $row['entranceDate'];?></td>
								<td><a class="btn btn-info" href="view_details_renter.php?r_id=<?php echo $row['renter_id'] ?> && o_id=<?php echo $r_id;?>">View</a></td>
							</tr>
							<?php } }?>
						</tbody>
					</table>

					<a class="btn btn-info"href="police_pro.php">Back</a>
				</div>
				
			</div>
		</div>

		<!-- Modal Start -->
		<div id="myModal" class="modal">
		  <span class="close">&times;</span>
		  <img class="modal-content" id="img01">
		  <div id="caption"></div>
		</div>
		<!-- Modal End -->

		<!-- Modal Start -->
		<div id="myModal" class="modal">
		  <span class="close">&times;</span>
		  <img class="modal-content" id="img01">
		  <div id="caption"></div>
		</div>
		<!-- Modal End -->

<script>
	$(document).ready( function () {
		$('#short').DataTable();
	} );
</script>

<script type="text/javascript" src="../user/files/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../user/files/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../user/files/js/jquery.fancybox-1.3.4.pack.min.js"></script>
<script type="text/javascript">
    $(function($){
        var addToAll = false;
        var gallery = true;
        var titlePosition = 'inside';
        $(addToAll ? 'img' : 'img.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
    });
    $.noConflict();
</script>	  



	</body>
	</html>