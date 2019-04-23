<?php
include('../config/dbcon.php');
//include('session.php');
	$content = $_POST['content'];		
	$id=$_POST['selector'];
		$N = count($id);
		for($i=0; $i < $N; $i++)
		{			
			$conn->query("insert into teacher_class_announcements (teacher_class_id,teacher_id,content,date) values('$id[$i]','$session_id','$content',NOW())")or die(mysql_error());
			$conn->query("insert into notification (teacher_class_id,notification,date_of_notification,link) value('$id[$i]','Add Annoucements',NOW(),'announcements_student.php')")or die(mysql_error());
		}
?>


