<?php
$page_link = pathinfo(curPageURL(),PATHINFO_FILENAME);
function curPageURL() {
 $pageURL = 'http';
 if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>
<div class="span3" id="sidebar">
					<img id="avatar" class="img-polaroid" src="<?php echo $row['location']; ?>">
					<?php include('count.php'); ?>
		<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
			<li class="<?php if($page_link != '' && $page_link == 'dashboard_student'){echo 'active';}?>"><a href="dashboard_student"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;My Class</a></li>
			<li class="<?php if($page_link != '' && $page_link == 'student_notification'){echo 'active';}?>">
				<a href="student_notification"><i class="icon-chevron-right"></i><i class="icon-info-sign"></i>&nbsp;Notification
				<?php if($not_read == '0'){
				}else{ ?>
					<span class="badge badge-important"><?php echo $not_read; ?></span>
				<?php } ?>
				</a>
			</li>
			<?php
			$message_query = $conn->query("select * from message where reciever_id = '$session_id' and message_status != 'read' ")or die(mysql_error());
			$count_message = mysqli_num_rows($message_query);
			?>
			<li class="<?php if($page_link != '' && $page_link == 'student_message' || $page_link == 'sent_message_student' || $page_link == 'student_message_student'){echo 'active';}?>">
			<a href="student_message"><i class="icon-chevron-right"></i><i class="icon-envelope-alt"></i>&nbsp;Message
				<?php if($count_message == '0'){
				}else{ ?>
					<span class="badge badge-important"><?php echo $count_message; ?></span>
				<?php } ?>
			</a>
			</li>
            <!--
			 <li class="<?php if($page_link != '' && $page_link == 'course_registration'){echo 'active';}?>"><a href="course_registration"><i class="icon-chevron-right"></i><i class="icon-suitcase"></i>&nbsp;Course Registration</a></li>
        -->
        </ul>
					<?php /* include('search_other_class.php');  */?>	
</div>

