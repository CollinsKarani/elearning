<?php
 $conn=mysqli_connect("localhost","root","","sodec");
 if(!$conn){
     echo "Error in connection".mysqli_error($conn);
 }
 
?>