<?php include('../config/dbcon.php');
//Start session
session_start();

 $role=  $_SESSION['role_session'];
if(!isset($_SESSION['instructor'])  && $role!=1)
{
        header("Location: ../index");
        exit();
}
else{
     $session_id= $_SESSION['id'];
 $stmt=$conn->query("SELECT teacher.*, tbl_login.id FROM tbl_login INNER JOIN teacher ON (tbl_login.id = teacher.teacher_id)
WHERE (tbl_login.id ='$session_id')");
    $row=mysqli_fetch_assoc($stmt);
    $fullname = $row['firstname'].' '.$row['lastname'];

}
 ?>