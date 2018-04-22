<?php

include ('../connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	date_default_timezone_set("Asia/Dhaka");
	$autoID ="ID".date('Ymdhms');
	
	$personalIMG = $autoID."-".$_FILES['personalIMG']['name'];
    $file_loc1 = $_FILES['personalIMG']['tmp_name'];
	$file_size1 = $_FILES['personalIMG']['size'];
	$file_type1 = $_FILES['personalIMG']['type'];
	$folder1="uploads_personal_img/";
	
	
	$personalNID =$autoID."-".$_FILES['personalNID']['name'];
    $file_loc2 = $_FILES['personalNID']['tmp_name'];
	$file_size2 = $_FILES['personalNID']['size'];
	$file_type2 = $_FILES['personalNID']['type'];
	$folder2="uploads_personal_nid/";
 
	
	$owName=$_POST['owName'];
	$fatName=$_POST['fatName'];
	$motName=$_POST['motName'];
	$DOB=$_POST['DOB'];
	$occupation=$_POST['occupation'];
	$nid=$_POST['nid'];
	$gender=$_POST['gender'];
	$marital_status=$_POST['marital_status'];
	$passposrt=$_POST['passposrt'];
	$housenumber=$_POST['housenumber'];
	$roadnumber=$_POST['roadnumber'];
	$area = $_POST['area'];
	$postcode = $_POST['postcode'];
	$policestation = $_POST['policestation'];
	$cell = $_POST['cell'];
	$religion = $_POST['religion'];
	$qualification = $_POST['qualification'];
	$email = $_POST['email'];
	$fmlyname = $_POST['fmlyname'];
	$relation = $_POST['relation'];
	$emergenceName = $_POST['emergenceName'];
	$emergenceRelation = $_POST['emergenceRelation'];
	$emergenceNumber = $_POST['emergenceNumber'];
	$pword = $_POST['pword'];
	
	$query = "SELECT cell FROM owner_table WHERE cell = '$cell'";
	$res1 = mysqli_query($con,$query);

	$query0 = "SELECT email FROM owner_table WHERE email = '$email'";
	$res0 = mysqli_query($con,$query0);

		if(mysqli_num_rows($res0) > 0 OR mysqli_num_rows($res1) > 0){
			echo "<script> alert('Email OR Phone Already Exists !') </script>";
			echo "<script> window.open('../owner_reg.php','_self'); </script>";				
		}
		else{
	
	
			if($passposrt == "passport"){
				$passposrt = 'N/A';
			}
			
			if($email == "Email"){
				$email = 'N/A';
			}
			 
			$date=date("Y/m/d");
			move_uploaded_file($file_loc1,$folder1.$personalIMG);
			move_uploaded_file($file_loc2,$folder2.$personalNID);
					
				$ins = mysqli_query($con,"INSERT INTO owner_table(owName,fatName,
				motName,DOB,occupation,nid,gender,marital_status,passposrt,
				housenumber,roadnumber,area,postcode,policestation,cell,
				religion,qualification,email,emergenceName,emergenceRelation,
				emergenceNumber,pword,personalIMG,personalNID,c_date,auto_id) VALUES('$owName',
				'$fatName','$motName','$DOB','$occupation','$nid','$gender','$marital_status',
				'$passposrt','$housenumber','$roadnumber','$area','$postcode','$policestation',
				'$cell','$religion','$qualification','$email','$emergenceName',
				'$emergenceRelation','$emergenceNumber','$pword','$personalIMG',
				'$personalNID','$date','$autoID')");
				
				$c = count($fmlyname);
				
				for($i=0;$i<$c;$i++){
				
				$ins2=mysqli_query($con,"INSERT INTO owners_family_table(o_id,fname,frelation,c_date)
				VALUES('$autoID','$fmlyname[$i]','$relation[$i]','$date')");
				}

				if($ins==1 && $ins2 == 1){

					echo "<script> alert(' Successfully Registered!!') </script>";
					echo "<script> window.open('../index.php','_self'); </script>";
				}
		}
	}
	else{
		echo "<script> alert(' Failed, try again !!') </script>";
	} 
?>
