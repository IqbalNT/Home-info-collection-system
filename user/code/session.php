<?php
include("connect.php");
session_start();
$username = $_SESSION['id'];

if(!isset($_SESSION['id'])){
    header("location:index.php");

}

?>
