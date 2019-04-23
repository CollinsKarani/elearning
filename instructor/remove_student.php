<?php
include('../config/dbcon.php');
$id = $_POST['id'];
$conn->query("delete from teacher_class_student where teacher_class_student_id = '$id'")or die(mysql_error());
?>

