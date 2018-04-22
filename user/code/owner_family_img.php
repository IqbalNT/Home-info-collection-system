<?php

include '../connect.php';

if (isset($_POST['img'])){
	$id=$_GET['id'];
	$rel=$_GET['rel'];
	
	$fmily_nid = rand(1000,100000)."-".$_FILES['fmily_nid']['name'];
    $file_loc = $_FILES['fmily_nid']['tmp_name'];
	$file_size = $_FILES['fmily_nid']['size'];
	$file_type = $_FILES['fmily_nid']['type'];
	$folder="uploads_family_img_owner/";
	move_uploaded_file($file_loc,$folder.$fmily_nid);
			
		$ins = mysqli_query($con,"UPDATE owners_family_table SET owner_rlnipimg='$fmily_nid' where o_id='$id' and frelation='$rel'		");
	
		if($ins==1){
	
            echo "<script> alert(' Successfully Updated Nid!!') </script>";
			echo "<script> window.open('../owner_details.php','_self'); </script>";
		}
	}
 else{
    echo "<script> alert(' Failed, try again !!') </script>";
	}
?>