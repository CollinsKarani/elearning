<?php
require_once('../inc/student_session.php');
if (isset($_POST['read'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = $conn->query("update message set message_status = 'read' where message_id='$id[$i]'");
}
header("location: student_message.php");
}
?>

<?php
if (isset($_POST['reply'])){
$sender_id = $_POST['sender_id'];
$sender_name = $_POST['name_of_sender'];
$my_name = $_POST['my_name'];
$my_message = $_POST['my_message'];

$conn->query("insert into message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$sender_id','$my_message',NOW(),'$session_id','$sender_name','$my_name')")or die(mysql_error());
$conn->query("insert into message_sent (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$sender_id','$my_message',NOW(),'$session_id','$sender_name','$my_name')")or die(mysql_error());
?>
<script>
alert('Message Sent');
window.location ="student_message.php";
</script>
<?php

}
?>
