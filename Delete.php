<?php
include 'Connection.php';
$sno = $_GET['id'];
$sql = "DELETE FROM `student_detail` Where id  = $sno";
$result = mysqli_query($conn, $sql);
  header("Location:Student.php");