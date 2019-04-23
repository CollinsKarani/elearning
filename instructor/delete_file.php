<?php
include('../config/dbcon.php');
$id = $_POST['id'];
$conn->query("delete from files where file_id = '$id' ")or die(mysql_error());
?>
