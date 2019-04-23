<?php
require_once('../inc/student_session.php');
require_once('../inc/header_student.php');

$sql = $conn->query("SELECT * FROM student_class_quiz WHERE student_id = '$session_id'")or die(mysql_error());
$row = mysqli_fetch_array($sql);
$quiz_time = $row['student_quiz_time'];

$sqlp = $conn->query("SELECT * FROM class_quiz")or die(mysql_error());
$rowp = mysqli_fetch_array($sqlp);
if($quiz_time <= $rowp['quiz_time'] AND $quiz_time > 0){
	 $conn->query("UPDATE student_class_quiz SET student_quiz_time = ".$row['student_quiz_time']." - 1 WHERE student_id = '$session_id'")or die(mysql_error()); 
	/* $_SESSION['take_exam'] = 'continue'; */

	$init = $quiz_time;
    $hours=floor($init/3600);
	$minutes = floor(($init / 60) % 60);
	$seconds = $init % 60;
	if($init > 59){		
		echo "$hours Hrs $minutes minutes and $seconds seconds";
	} else {
		echo "$seconds seconds";
	}
} /* else {
	$_SESSION['take_exam'] = 'denied';
} */
?>