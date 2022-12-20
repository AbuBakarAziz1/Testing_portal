<?php

////// Connection ///////////
$conn = mysqli_connect("localhost", "root", "", "testdec");

if ($conn == false) {
   echo "<script>alert('Connection Error')</script>";
}



?>