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
		<?php include 'include/navbar.php'; ?>	
		<?php
			$sql="SELECT * FROM  owner_table where auto_id='$id'";
			$query=mysqli_query($con,$sql);

		?>


	<div class="container">	
		<!-- One "tab" for each step in the form: -->
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
							<th>House No</th>
							<th>Road No</th>
							<th>Ragistration Date</th>
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
							<td><?php echo $row['housenumber'];?></td>
							<td><?php echo $row['roadnumber'];?></td>
							<td><?php echo $row['c_date'];?></td>
							<td><img class="fancybox" src="code/uploads_personal_img/<?php echo $row['personalIMG'];?>" width="50" height="50"></td>
								<td><img class="fancybox" src="code/uploads_personal_nid/<?php echo $row['personalNID'];?>" width="50" height="50"></td>
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
							<th>NID Image</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql="SELECT * FROM   owners_family_table where o_id='$id'";
						$query=mysqli_query($con,$sql);
						while($row=mysqli_fetch_assoc($query)){?>
						<tr>
							<td><?php echo $row['fname'];?></td>
							<td><?php echo $row['frelation'];?></td>
							<td><img class="fancybox" src="code/uploads_family_img_owner/<?php echo $row['owner_rlnipimg'];?>" width="50" height="50">
								<a href="add_owner_family_nidpic.php?name=<?php echo $id;?> & rel=<?php echo $row['frelation'];?>"><button type="button" class="btn btn-primary pull-right">Add NID Image</button>
							 </td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
	

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
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