<?php include('../inc/dbcon.php'); ?>
<?php
$id = $_POST['id'];
$conn->query("delete from message_sent where message_sent_id = '$id'");
?>

