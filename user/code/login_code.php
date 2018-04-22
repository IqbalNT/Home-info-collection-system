<?php
  include('../connect.php');

if(isset($_POST['login'])){

  $email = $_POST['email'];
  $password = $_POST['password'];
  //$employee_password_md5 = md5($employee_password);

  $login_query = "SELECT * FROM owner_table where (email = '$email' or cell='$email') and pword = '$password'";
  $login = mysqli_query($con,$login_query);

  $count = mysqli_num_rows($login);


  if($count == 1){

    $row= mysqli_fetch_assoc($login);
    $id = $row['id'];
    echo $id;
	$autoid=$row['auto_id'];

    header("location: ../owner_pro.php");
    //echo "successfully logged in";
    session_start();
    
    $_SESSION['id'] = $id;
    $_SESSION['auto_id'] = $autoid;
	

     
    exit();


  }
  else{
      echo "<script> alert(' Incorrect information, try again !!') </script>";
      echo "<script> window.open('../index.php','_self'); </script>";
    }

}
?>         