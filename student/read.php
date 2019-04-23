<?php
require_once('../inc/student_session.php');
require_once('../inc/header_student.php');
if (isset($_POST['read'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{

	$conn->query("insert into notification_read (student_id,student_read,notification_id) values('$session_id','yes','$id[$i]')")or die(mysql_error());
	
	
	
}
?>
<script>
window.location = 'student_notification.php';
</script>
<?php
}
?>