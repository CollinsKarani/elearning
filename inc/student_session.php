<?php include('../config/dbcon.php');
//Start session
session_start();

 $role=  $_SESSION['role_session'];
if(!isset($_SESSION['student'])  && $role!=3)
{
        header("Location: ../index");
        exit();
}
else{
     $session_id= 	$_SESSION['id'];
 $stmt=$conn->query("SELECT student.*, tbl_login.id FROM tbl_login INNER JOIN student ON (tbl_login.id = student.student_id)
WHERE (tbl_login.id ='$session_id')");
    $row=mysqli_fetch_assoc($stmt);
    $fullname = $row['firstname'].' '.$row['lastname'];

}

//$session_id=$_SESSION['id'];
 ?>