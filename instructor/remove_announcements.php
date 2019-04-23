<?php include('../config/dbcon.php'); ?>
<?php
$id = $_POST['id'];
$conn->query("delete from teacher_class_announcements where teacher_class_announcements_id = '$id'")or die(mysql_error());
$conn->query("delete from teacher_class_announcements where teacher_class_announcements_id = '$id'")or die(mysql_error());
?>

