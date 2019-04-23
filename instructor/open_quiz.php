<?php
include('../config/dbcon.php');

$id = $_GET['id'];
$conn->query("update class_quiz set status = 1 where quiz_id = '$id'");
?>
<script>
 window.location = 'teacher_quiz';
</script>