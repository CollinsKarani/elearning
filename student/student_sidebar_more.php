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
	<img id="avatar" src="<?php echo $row['location']; ?>" class="img-polaroid">
		<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
				<li class="<?php if($page_link != '' && $page_link == 'dashboard_student'){echo 'active';}?>"><a href="dashboard_student"><i class="icon-chevron-right"></i><i class="icon-chevron-left"></i>&nbsp;Back</a></li>
				<li class="<?php if($page_link != '' && $page_link == 'my_classmates'){echo 'active';}?>"><a href="my_classmates.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;My Classmates</a></li>
				<li class="<?php if($page_link != '' && $page_link == 'progress'){echo 'active';}?>"><a href="progress.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-bar-chart"></i>&nbsp;My Progress</a></li>
				<li class="<?php if($page_link != '' && $page_link == 'subject_overview_student'){echo 'active';}?>"><a href="subject_overview_student.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-file"></i>&nbsp;Subject Overview</a></li>
				<li class="<?php if($page_link != '' && $page_link == 'downloadable_student'){echo 'active';}?>"><a href="downloadable_student.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-download"></i>&nbsp;Downloadable Materials</a></li>
				<li class="<?php if($page_link != '' && $page_link == 'assignment_student'){echo 'active';}?>"><a href="assignment_student.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Assignments</a></li>
				<li class="<?php if($page_link != '' && $page_link == 'announcements_student'){echo 'active';}?>"><a href="announcements_student.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-info-sign"></i>&nbsp;Announcements</a></li>
				<li class="<?php if($page_link != '' && $page_link == 'class_calendar_student'){echo 'active';}?>"><a href="class_calendar_student.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-calendar"></i>&nbsp;Class Calendar</a></li>
				<li class="<?php if($page_link != '' && $page_link == 'student_quiz_list'){echo 'active';}?>"><a href="student_quiz_list.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-reorder"></i>&nbsp;Quiz</a></li>
                <li class="<?php if($page_link != '' && $page_link == 'my_attendance'){echo 'active';}?>"><a href="my_attendance.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-suitcase"></i>&nbsp;Attendance</a></li>
		</ul>
	<?php /* include('search_other_class.php'); */ ?>
</div>