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
	<?php include 'include/navbar.php';
if(isset($_GET['name']))  {
	$id=$_GET['name'];
	$rel=$_GET['rel'];


	 ?>	

<div class="container">
	<div class="row">
		<div class="col-md-4">
		<form action="code/owner_family_img.php?id=<?php echo $id;?>& rel=<?php echo $rel;?>" method="POST" enctype="multipart/form-data">
		<span class="btn btn-default btn-file">
					Upload Your Nid <input type="file" name="fmily_nid">
		</span>
		<button type="submit" name="img" class="btn btn-success" >Submit</button>
		</form>
		</div>
	</div>
	
</div>

<?php 
}

?>
</body>
</html>