<?php
require_once('../inc/lecturer_session.php');
if (isset($_POST['read'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$conn->query("insert into notification_read_teacher (teacher_id,student_read,notification_id) values('$session_id','yes','$id[$i]')")or die(mysql_error());	
}
?>
<script>
window.location = 'notification_teacher.php';
</script>
<?php
}
?>