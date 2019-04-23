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
	<img id="avatar" src="../public/uploads/<?php echo $row['location']; ?>" class="img-polaroid">
			<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
				<li class=""><a href="dashboard"><i class="icon-chevron-right"></i><i class="icon-chevron-left"></i>&nbsp;Back</a></li>
				<li class="<?php if($page_link != '' && $page_link == 'my_students'){echo 'active';}?>"><a href="my_students.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;My Students</a></li>
				<li class="<?php if($page_link != '' && $page_link == 'subject_overview'){echo 'active';}?>"><a href="subject_overview.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-file"></i>&nbsp;Subject Overview</a></li>
				<li class="<?php if($page_link != '' && $page_link == 'downloadable'){echo 'active';}?>"><a href="downloadable.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-download"></i>&nbsp;Downloadable Materials</a></li>
				<li class="<?php if($page_link != '' && $page_link == 'assignment'){echo 'active';}?>"><a href="assignment.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Assignments</a></li>
				<li class="<?php if($page_link != '' && $page_link == 'announcements'){echo 'active';}?>"><a href="announcements.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-info-sign"></i>&nbsp;Announcements</a></li>
				<li class="<?php if($page_link != '' && $page_link == 'class_calendar'){echo 'active';}?>"><a href="class_calendar.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-calendar"></i>&nbsp;Class Calendar</a></li>
				<li class="<?php if($page_link != '' && $page_link == 'class_quiz'){echo 'active';}?>"><a href="class_quiz.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-list"></i>&nbsp;Quiz</a></li>
			</ul>
			<?php include('search_other_class.php'); ?>		
</div>

