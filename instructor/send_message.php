<?php
include('../config/dbcon.php');
include('session.php');
$teacher_id = $_POST['teacher_id'];
$my_message = $_POST['my_message'];


$query = $conn->query("select * from teacher where teacher_id = '$teacher_id'");
$row = mysqli_fetch_array($query);

$name = $row['firstname']." ".$row['lastname'];

$query1 = $conn->query("select * from teacher where teacher_id = '$session_id'");
$row1 = mysqli_fetch_array($query1);
$name1 = $row1['firstname']." ".$row1['lastname'];


$conn->query("insert into message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$teacher_id','$my_message',NOW(),'$session_id','$name','$name1')");
$conn->query("insert into message_sent (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$teacher_id','$my_message',NOW(),'$session_id','$name','$name1')");
?>