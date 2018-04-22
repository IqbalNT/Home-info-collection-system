<?php
  include('../connect.php');

if(isset($_POST['login'])){

  $psName = $_POST['psName'];
  $pspass = $_POST['pspass'];
  //$employee_password_md5 = md5($employee_password);

  $login_query = "SELECT * FROM ps_with_dis where psName = '$psName' and  disName='Dhaka' and p_password = '$pspass'";
  $login = mysqli_query($con,$login_query);

  $count = mysqli_num_rows($login);


  if($count == 1){

    $row= mysqli_fetch_assoc($login);
    $id = $row['id'];
    //echo $id;
	 $psName=$row['psName'];

    header("location: ../police_pro.php");
    //echo "successfully logged in";
    session_start();
    
    $_SESSION['p_id'] = $id;
    $_SESSION['name'] = $psName;
	

     
    exit();


  }
  else{
      echo "<script> alert(' Incorrect information, try again !!') </script>";
      echo "<script> window.open('../index.php','_self'); </script>";
    }

}
?>         