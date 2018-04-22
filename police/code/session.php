<?php
include("connect.php");
session_start();
$username = $_SESSION['p_id'];

if(!isset($_SESSION['p_id'])){
    header("location:index.php");

}

?>
