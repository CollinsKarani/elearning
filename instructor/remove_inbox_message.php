<?php include('../config/dbcon.php'); ?>
<?php
$id = $_POST['id'];
$conn->query("delete from message where message_id = '$id'");
?>

