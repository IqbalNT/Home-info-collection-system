<?php
 include'../connect.php';
 session_start();
 $owner_id = $_SESSION['auto_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	date_default_timezone_set("Asia/Dhaka");
	$autoID ="RenterID".date('Ymdhms');
	$max_file_size = 1048576;
	
	$personalIMG = $autoID."-".$_FILES['personalIMG']['name'];
    $file_loc1 = $_FILES['personalIMG']['tmp_name'];
	$file_size1 = $_FILES['personalIMG']['size'];
	$file_type1 = $_FILES['personalIMG']['type'];
	$folder1="uploads_personal_img/";
	$extension1 = strtolower(substr($personalIMG,strpos($personalIMG,'.')+1));
	
	
	$personalNID =$autoID."-".$_FILES['personalNID']['name'];
    $file_loc2 = $_FILES['personalNID']['tmp_name'];
	$file_size2 = $_FILES['personalNID']['size'];
	$file_type2 = $_FILES['personalNID']['type'];
	$folder2="uploads_personal_nid/";
	$extension2 = strtolower(substr($personalNID,strpos($personalNID,'.')+1));
 
	
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
	$dist = $_POST['dist'];
	$religion = $_POST['religion'];
	$qualification = $_POST['qualification'];
	$email = $_POST['email'];
	$fmlyname = $_POST['fmlyname'];
	$relation = $_POST['relation'];
	$relnid = $_POST['relnid'];
	$emergenceName = $_POST['emergenceName'];
	$emergenceRelation = $_POST['emergenceRelation'];
	$emergenceNumber = $_POST['emergenceNumber'];
	$floorNum = $_POST['floorNum'];
	$block = $_POST['block'];
	$roomNumber = $_POST['roomNumber'];
	$entranceDate = $_POST['entranceDate'];
	
	$query = "SELECT cell FROM renter_table WHERE cell = '$cell'";
	$res1 = mysqli_query($con,$query);

	$query0 = "SELECT email FROM renter_table WHERE email = '$email'";
	$res0 = mysqli_query($con,$query0);

		if(mysqli_num_rows($res0) > 0 OR mysqli_num_rows($res1) > 0){
			echo "<script> alert('Email OR Phone Already Exists !') </script>";
			echo "<script> window.open('../renter_reg.php','_self'); </script>";				
		}
		else{
	
			if(($extension1=='jpg' || $extension1=='jpeg' || $extension1=='png') && ($extension2=='jpg' || $extension2=='jpeg' || $extension2=='png')){
				if($file_size1 <= $max_file_size AND $file_size2 <= $max_file_size){
					if($passposrt == "passport"){
						$passposrt = 'N/A';
					}
					
					if($email == "Email"){
						$email = 'N/A';
					}
				 
					$date=date("Y/m/d");

						
					$ins = mysqli_query($con,"INSERT INTO renter_table(owName,fatName,
					motName,DOB,occupation,nid,gender,marital_status,passposrt,
					housenumber,roadnumber,area,postcode,policestation,cell,dist,
					religion,qualification,email,emergenceName,emergenceRelation,
					emergenceNumber,floorNum,block,roomNumber,entranceDate,personalIMG,personalNID,reg_date,renter_id,owner_id) VALUES('$owName',
					'$fatName','$motName','$DOB','$occupation','$nid','$gender','$marital_status',
					'$passposrt','$housenumber','$roadnumber','$area','$postcode','$policestation',
					'$cell','$dist','$religion','$qualification','$email','$emergenceName',
					'$emergenceRelation','$emergenceNumber','$floorNum','$block','$roomNumber','$entranceDate','$personalIMG',
					'$personalNID','$date','$autoID','$owner_id')");
					
					$c = count($fmlyname);
					
					for($i=0;$i<$c;$i++){
					
					$ins2=mysqli_query($con,"INSERT INTO renter_family_table(fmlyname,relation,relnid,renter_id,reg_date)
					VALUES('$fmlyname[$i]','$relation[$i]','$relnid[$i]','$autoID','$date')");
					}

					if($ins==1 && $ins2 == 1){
						move_uploaded_file($file_loc1,$folder1.$personalIMG);
						move_uploaded_file($file_loc2,$folder2.$personalNID);
						echo "<script> alert(' Successfully Registered!!') </script>";
						echo "<script> window.open('../index.php','_self'); </script>";
					}
				}
				else{
					echo "<script> alert('File Size Must Be Equal Or Less Than 1MB') </script>";
					echo "<script> window.open(../renter_reg.php','_self'); </script>";					
				}			
			}else{
				echo "<script> alert('File Types Must Be JPEG/JPG/PNG') </script>";
				echo "<script> window.open(../renter_reg.php','_self'); </script>";
			}
		}
	}
	else{
		echo "<script> alert(' Failed, try again !!') </script>";
	} 
?>
