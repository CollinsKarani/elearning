<?php
include('../config/dbcon.php');
$session_id = $_POST['session_id'];
$subject_id = $_POST['subject_id'];
$class_id = $_POST['class_id'];
$school_year = $_POST['school_year'];
$query = $conn->query("select * from teacher_class where subject_id = '$subject_id' and class_id = '$class_id' and teacher_id = '$session_id' and school_year = '$school_year' ");
$count = mysqli_num_rows($query);
if ($count > 0){ 
echo "true";
}else{

$conn->query("insert into teacher_class (teacher_id,subject_id,class_id,thumbnails,school_year) values('$session_id','$subject_id','$class_id','../public/uploads/thumbnails.jpg','$school_year')")or die(mysql_error());

$teacher_class = $conn->query("select * from teacher_class order by teacher_class_id DESC");
$teacher_row = mysqli_fetch_array($teacher_class);
$teacher_id = $teacher_row['teacher_class_id'];


$insert_query =$conn->query("select * from student where class_id = '$class_id'");
while($row = mysqli_fetch_array($insert_query)){
$id = $row['student_id'];
$conn->query("insert into teacher_class_student (teacher_id,student_id,teacher_class_id) value('$session_id','$id','$teacher_id')");
echo "yes";
}
}
?>