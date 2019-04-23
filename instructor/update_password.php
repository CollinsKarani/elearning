 <?php
require_once('../inc/lecturer_session.php');
 $new_password  = $_POST['new_password'];
$conn->query("update tbl_login set password = '$new_password' where id = '$session_id'")or die(mysql_error());
 ?>