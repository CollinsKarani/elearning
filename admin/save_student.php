<?php
include('../config/dbcon.php');
        
               $un = $_POST['un'];
               $fn = $_POST['fn'];
               $ln = $_POST['ln'];
               $phone = $_POST['phone'];
               $class_id = $_POST['class_id'];
               $level= $_POST['level_id'];
               $email = $_POST['email'];
               $password = "student321";
               $role=3;

            $result= $conn->query("INSERT into student (username,firstname,lastname,phone_number,student_email,location,class_id,level_id,status)
		values ('$un','$fn','$ln','$phone','$email','../public/uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','$level','Unregistered')");
        if($result){
            $last= $conn->insert_id;
            $conn->query("INSERT INTO tbl_login (id,username,password,role_id) VALUES('$last','$un','$password','$role')");
        }


         ?>
