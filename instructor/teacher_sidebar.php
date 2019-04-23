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
	<img id="avatar" class="img-polaroid" src="../admin/<?php echo $row['location']; ?>">
	<?php include('teacher_count.php'); ?>
	<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
		<li class="<?php if($page_link != '' && $page_link == 'dashboard'){echo 'active';}?>"><a href="dashboard"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;My Class</a></li>
		<li class="<?php if($page_link != '' && $page_link == 'notification_teacher'){echo 'active';}?>"><a href="notification_teacher"><i class="icon-chevron-right"></i><i class="icon-info-sign"></i>&nbsp;Notification
			<?php if($not_read == '0'){
				}
                else{ ?>
					<span class="badge badge-important"><?php echo $not_read; ?></span>
				<?php
                }
                ?>
		</a></li>
		<li class="<?php if($page_link != '' && $page_link == 'teacher_message'){echo 'active';}?>"><a href="teacher_message"><i class="icon-chevron-right"></i><i class="icon-envelope-alt"></i>&nbsp;Message</a></li>
		<li class="<?php if($page_link != '' && $page_link == 'add_downloadable'){echo 'active';}?>"><a href="add_downloadable"><i class="icon-chevron-right"></i><i class="icon-plus-sign"></i>&nbsp;Add Downloadables</a></li>
		<li class="<?php if($page_link != '' && $page_link == 'add_announcement'){echo 'active';}?>"><a href="add_announcement"><i class="icon-chevron-right"></i><i class="icon-plus-sign"></i>&nbsp;Add Announcement</a></li>
		<li class="<?php if($page_link != '' && $page_link == 'add_assignment'){echo 'active';}?>"><a href="add_assignment"><i class="icon-chevron-right"></i><i class="icon-plus-sign"></i>&nbsp;Add Assignment</a></li>
		<li class="<?php if($page_link != '' && $page_link == 'teacher_quiz'){echo 'active';}?>"><a href="teacher_quiz"><i class="icon-chevron-right"></i><i class="icon-list"></i>&nbsp;Quiz</a></li>
		<li class="<?php if($page_link != '' && $page_link == 'teacher_share'){echo 'active';}?>"><a href="teacher_share"><i class="icon-chevron-right"></i><i class="icon-file"></i>&nbsp;Shared Files</a></li>
	</ul>
	<?php include('search_other_class.php'); ?>	
</div>

